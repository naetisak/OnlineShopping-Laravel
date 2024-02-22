<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $data = Order::query()
                ->with('coupon:id,code')
                // ->with('items:order_id,variant_id')
                ->latest()
                ->paginate(10);

        // return $data;
        return view('dpanel.orders', compact('data'));
    }

    public function updataStatus($id, $status){
        Order::find($id)->update(['status'=>$status]);

        return back()->withSuccess('Status change successfully');
    }
}
