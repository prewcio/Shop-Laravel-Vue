<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cartCount(Request $request){
        $token = $request->input('sessionID');
        $customer = Customer::where('sessionID', $token)->first();
        $accStatus = 0;
        $carts = Cart::all();
        $items = array();
        $itQua = array();
        foreach($carts as $cart) {
            if ($cart->sessionID == $token) {
                $items[] = Product::where('id', $cart->itemID)->first();
                $itQua[] = $cart->itemQuantity;
            } else {
                $cart = 0;
            }
        }
        if($customer){
            $accStatus = 1;
        }
        return ['itemsQuantity'=>array_sum($itQua),'accStatus'=>$accStatus];
    }

    public function getCart(Request $request){
        $token = $request->input('csrf');
        $carts = Cart::all();
        $items = array();
        $carty = array();
        $loop = 0;
        foreach ($carts as $cart){
            if($cart->sessionID == $token){
                $qua = $cart->itemQuantity;
                $item = Product::where('id', $cart->itemID)->first();
                $item->setAttribute('itemQuantity',$qua);
                $item->setAttribute('old_price',$item->productPrice);
                $items[] = $item;

            }
        }
        return CartResource::collection($items);
    }
}
