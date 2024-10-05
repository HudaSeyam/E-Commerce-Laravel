<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class ShoppingController extends Controller
{
    public function add_to_cart(){

        $product =Product::find(request()->product_id);
        $cartItem = Cart::add([
            'id' =>$product->id,
            'name' =>$product->title,
            'qty' =>request()->qty,
            'price' =>$product->price,
            'weight' => 550,
        ]);
        Cart::associate($cartItem->rowId, 'App\Models\Product');
        return redirect()->route('cart');
    }

    public function cart(){
        return view('home.cart');
    }

    public function cart_delete($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }

    public function cart_update($id , $qty){
        Cart::update($id,$qty);
        return view('home.cart');
    }

    public function rapid_add($id){
        $product =Product::find($id);
        $cartItem = Cart::add([
            'id' =>$product->id,
            'name' =>$product->title,
            'qty' =>1,
            'price' =>$product->price,
            'weight' => 550,
        ]);
        Cart::associate($cartItem->rowId, 'App\Models\Product');
        return redirect()->route('cart');
    }
}
