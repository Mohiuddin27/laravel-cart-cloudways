<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function cart(){
        
        return view('cart.cart');
    }
    public function addToCart($id){
        $product=Product::find($id);
        $cartItems=session()->get('cartItems',[]);
        if(isset($cartItems[$id])){
            $cartItems[$id]['quantity']++;
        }else{
            $cartItems[$id]=[
                "image_path"=>$product->image_path,
                "name"=>$product->name,
                "details"=>$product->details,
                "price"=>$product->price,
                "quantity"=>1
            ];
        }
        session()->put('cartItems',$cartItems);
        return redirect()->back()->with('success','Product added to cart!');

    }
    public function delete(Request $req){
        if($req->id){
            $cartItems=session()->get('cartItems');
            if(isset($cartItems[$req->id])){
                unset($cartItems[$req->id]);
                session()->put('cartItems',$cartItems);
            }
            return redirect()->back()->with('success','Product deleted successfully');
        }
    }
}
