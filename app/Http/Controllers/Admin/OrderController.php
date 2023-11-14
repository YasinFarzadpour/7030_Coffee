<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('View Orders')) {
            abort(403);
        }
        $statuses = Order::getAllStatuses();
        $orders = Order::query();
        if($request->status!==null){
            $orders->where('status',$request->status);
        }


        $orders =$orders->paginate(8);
        return view('admin.orders.orders-all', ['orders' => $orders ,'statuses'=>$statuses]);

    }

    public function show(Order $order)
    {
        if (!Auth::user()->can('View Orders')) {
            abort(403);
        }
        $statuses = Order::getAllStatuses();
        return view('admin.orders.order-single', ['order' => $order , 'statuses'=>$statuses]);
    }

    public function destroy(Order $order)
    {
        if (!Auth::user()->can('Delete Orders')) {
            abort(403);
        }
        $order->delete();
        Session::flash('destroy-message', 'Order Deleted Successfully.');
        return back();
    }

    public function updateStatus(Request $request, Order $order)
    {
        $status = $request->status;
        $order->update([
            'status'=> $status
        ]);
        return back();
    }
}
