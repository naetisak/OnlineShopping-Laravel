<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = Product::with([
            'image',
            'variant' => function ($q){
                $q->with('color', 'size');
            }
        ])->latest()->limit(12)->get();

        // return $products;
        return view('welcome', compact('products'));
    }

    public function productDetail($slug){

        $product = Product::with([
            'brand',
            'image',
            'variant' => function ($q){
                $q->with('color', 'size');
            }
        ])->where('slug', $slug)->first();

        abort_if(!$product, 404);

        $products = Product::with([
            'image',
            'variant' => function ($q){
                $q->with('color', 'size');
            }
        ])->latest()->limit(12)->get();

        return view('product_detail', compact('products','product'));
    }
}
