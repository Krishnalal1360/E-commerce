<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    //
    public function index(){
        //
        $products = Product::all();
        return view('pages.home', compact('products'));
    }
    //
    public function show($id){
        //
        //Session::flush();
        $product = Product::findOrFail($id);
        return view('pages.product_details', compact('product'));
    }
}
