<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
//        return "Test";
    }

    public function cartCount(Request $request){
        $token = $request->input('csrf');
        $customer = Customer::where('sessionID', $token)->first();
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
        return ['itemsQuantity'=>array_sum($itQua)];
    }

    public function getItems(){
        return ProductResource::collection(Product::all());
    }
}
