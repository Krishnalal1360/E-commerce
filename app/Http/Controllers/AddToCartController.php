<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    //
    public $cart = [];
    //
    public function __construct(){
        //
        $this->cart = Session::get('cart', []);
    }
    //
    public function store(Request $request, $id){
        //
        //dd($request->all());
        $product = Product::findOrFail($id);
        //dd($product);
        $this->cart[$product->id] = [
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->price,
            'color' => $request->color,
            'quantity' => $request->quantity
        ];
        //
        /*$this->cart[] = [
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->price,
            'color' => $request->color,
            'quantity' => $request->quantity
        ];*/
        //
        Session::put('cart', $this->cart);
        //
        notyf()->success('Product added to cart successfully!');
        //
        return response([
            'status' => 'ok',
            'message' => 'Product added to cart',
            'cart_count' => 0
        ]);
    }
    //
    public function destroy($id){
        //
        $cartItems = $this->cart;
        //dd($cartItems);
        unset($cartItems[$id]);
        //
        Session::put('cart', $cartItems);
        //
        notyf()->success('Product from cart deleted successfully!');
        //
        return redirect()->back();
    }
    //
    public function update(Request $request){
        //
        $cartItems = $this->cart;
        //
        $cartItems[$request->id]['quantity'] = $request->quantity;
        //
        Session::put('cart', $cartItems);
        //
        notyf()->success('Product quantity updated in cart successfully!');
        //
        return response([
            'status' => 'ok',
            'message' => 'Item quantity changed'
        ]);
    }
}
