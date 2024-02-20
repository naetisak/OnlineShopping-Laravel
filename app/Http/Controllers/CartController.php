<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use App\Models\Variant;
use Illuminate\Http\Request;

class CartController extends Controller

{
    public function index(){
        $addresses = [];

        if(auth()->check()){
            $addresses = UserAddress::where('user_id', auth()->user()->id)->get();
        }

        return view('cart', compact('addresses'));
    }

    public function apiCartProducts(Request $request){

        $ids = explode(',', $request->ids);

        $data = Variant::with('color:id,code','size:id,code', 'product:id,title','product.oldestImage')->whereIn('id', $ids)->get();

        return response()->json($data);
    }


}
