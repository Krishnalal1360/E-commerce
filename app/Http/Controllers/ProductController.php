<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        //
        return view('admin.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        //
        //dd($request->all());
        //
        // Store Product Details into products table
        $product = new Product();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('uploads', 'public');
            $product->image = $path;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tag = $request->tag;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();
        //
        // Store Product Colors into product_colors table
        if($request->has('colors') && $request->filled('colors') && is_array($request->colors)){
            $colors = $request->colors;
            foreach($colors as $color){
                ProductColor::create([
                    'product_id' => $product->id,
                    'name' => $color,   
                ]);
            }
        }
        //
        // Store Product Images into product_images table
        if($request->hasFile('images') && is_array($request->file('images'))){
            $images = $request->file('images');
            foreach($images as $image){
                $path = $image->store('uploads', 'public');
                //$fileName = 'uploads/' . basename($path);
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }
        //
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::with(['colors', 'images'])->findOrFail($id);
        //
        $colors = $product->colors->pluck('name')->toArray();
        //
        $images = $product->images->pluck('path')->toArray();
        //
        return view('admin.product.edit', compact('product', 'colors', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update Product Details into products table
        $product = Product::with(['images', 'colors'])->findOrFail($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $oldImage = $product->image;
            //File::delete(storage_path('uploads/' . $oldImage));
            if(Storage::disk('public')->exists($oldImage)){
                Storage::disk('public')->delete($oldImage);
            }
            $path = $image->store('uploads', 'public');
            $product->image = $path;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tag = $request->tag;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();
        //
        // Store Product Colors into product_colors table
        if($request->has('colors') && $request->filled('colors') && is_array($request->colors)){
            $colors = $request->colors;
            $oldColors = $product->colors;
            foreach($oldColors as $color){
                $color->delete();
            }
            foreach($colors as $color){
                ProductColor::create([
                    'product_id' => $product->id,
                    'name' => $color,   
                ]);
            }
        }
        //
        // Store Product Images into product_images table
        if($request->hasFile('images') && is_array($request->file('images'))){
            $images = $request->file('images');
            $oldImages = $product->images->pluck('path')->toArray();
            foreach($oldImages as $oldImage){
                if(Storage::disk('public')->exists($oldImage)){
                    Storage::disk('public')->delete($oldImage);
                }
            }
            ProductImage::where('product_id', $id)->delete();
            foreach($images as $image){
                $path = $image->store('uploads', 'public');
                //$fileName = 'uploads/' . basename($path);
                ProductImage::Create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }
        //
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::with(['images', 'colors'])->findOrFail($id);
        //
        $oldImages = $product->images->pluck('path')->toArray();
        //
        foreach($oldImages as $image){
            if(Storage::disk('public')->exists($image)){
                Storage::disk('public')->delete($image);
            }
        }
        //
        $product->delete();
        //
        return redirect()->back();
    }
}
