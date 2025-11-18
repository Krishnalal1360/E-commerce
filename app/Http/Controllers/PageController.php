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
        //Session::flush();
        $products = Product::all();
        return view('pages.home', compact('products'));
    }
    //
    public function show($id){
        //
        $product = Product::findOrFail($id);
        return view('pages.product_details', compact('product'));
    }
}
