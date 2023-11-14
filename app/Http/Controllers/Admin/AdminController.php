<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if (!Auth::user()->can('View Admin')){
            abort(403);
        }

        $totalOrders = Order::count();
        $pendingOrders = Order::query()->where('status',0)->count();
        $processingOrders = Order::query()->where('status',1)->count();
        $completedOrders = Order::query()->where('status',2)->count();
        $declinedOrders = Order::query()->where('status',3)->count();

        $totalRevenue = Order::query()->where('status',2)->sum('grand_total');
        $todayRevenue = Order::query()->where('status',2)->whereDate('created_at',Carbon::today())->sum('grand_total');
        $weekRevenue = Order::query()->where('status',2)->whereBetween('created_at',[now()->startOfWeek(), now()])->sum('grand_total');
        $monthRevenue = Order::query()->where('status',2)->whereBetween('created_at',[now()->startOfMonth(), now()])->sum('grand_total');
        $yearRevenue = Order::query()->where('status',2)->whereBetween('created_at',[now()->startOfYear(), now()])->sum('grand_total');

        return view('admin.index', compact(
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'declinedOrders',
            'totalRevenue',
            'todayRevenue',
            'weekRevenue',
            'monthRevenue',
            'yearRevenue'
        ));
    }
}
