<?php

namespace App\Http\Controllers\Shop;

use App\Events\OrderConfirmation;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceOrderRequest;
use App\Jobs\SendEmailJob;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\ValidationException;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function show()
    {
        return view('shop.checkout-show');
    }

    public function placeOrder(PlaceOrderRequest $request)
    {

        $items = Cart::content();
        foreach ($items as $item) {
            if ($item->qty > $item->model->stock) {
                throw ValidationException::withMessages(['stock_error' => '  Product Quantity Is More Than Product Stock. Please Go Back And Edit Your Shopping Cart  ']);
            }
        }


        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => auth()->id(),
            'status' => Order::PENDING,
            'grand_total' => (int)Cart::total(0, 0, ''),
            'item_count' => Cart::count(),
            'payment_status' => 0,
            'payment_method' => null,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'notes' => $request->notes
        ]);
        $items = Cart::Content();
        foreach ($items as $item) {
            $orderItem = new OrderItem([
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price
            ]);
            $order->items()->save($orderItem);
        }
        return Payment::purchase((new Invoice)->amount((int)Cart::total(0, 0, '')),
            function ($driver, $transactionId) use ($order) {
                $transaction = new Transaction([
                    'transaction_id' => $transactionId,
                    'user_id' => auth()->id(),
                    'status' => 0
                ]);
                $order->transaction()->save($transaction);
            }
        )->pay()->render();
    }


    public function verify(Request $request)
    {
        $transactionId = $request->Authority;
        $transaction = Transaction::query()->where('transaction_id', $transactionId)->first();
        $order = $transaction->order;

        try {
            $receipt = Payment::amount($order->grand_total)->transactionId($transactionId)->verify();
            $reference_id = $receipt->getReferenceId();
            $transaction->update([
                'reference_id' => $reference_id,
                'status' => 1,
            ]);

            $order->update([
                'payment_status' => 1
            ]);
            foreach ($order->items as $item) {
                Product::query()->where('id', $item->product_id)->decrement('stock', $item->quantity);
                Product::query()->where('id', $item->product_id)->increment('sell_count', $item->quantity);
            }

            Cart::destroy();

            OrderConfirmation::dispatch($order);

            return view('shop.order-verify', ['reference_id' => $reference_id, 'status' => 1]);

        } catch (InvalidPaymentException $exception) {
            return view('shop.order-verify', ['error_message' => $exception->getMessage(), 'status' => 0]);
        }
    }
}
