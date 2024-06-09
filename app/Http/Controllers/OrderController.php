<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    private $breadcrumbs;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'History', 'url' => route('user.order.history')],
        ];
    }
    public function orderHistory(){
        $orders = Order::with('veterinarian')
        ->where('user_id' , Auth::guard('user')->user()->id)
        ->orderBy('order_date', 'desc')
        ->get();

        return view('pages.user.order-history.index', compact('orders'))->with('breadcrumbs', $this->breadcrumbs);

    }

    public function orderHistoryDetail(string $id){
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => 'Detail Order History', 'url' => route('user.order.details' , ['id' => $id])]));

        $order = Order::with('veterinarian')->findOrFail($id);
        
        return view('pages.user.order-history.detail', compact('order'))->with('breadcrumbs', $this->breadcrumbs);
    }
}