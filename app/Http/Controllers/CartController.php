<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function index(){
        $products = Session::get('cart', []);
        return view('pages.cart', compact('products'));
    }
}
