<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return Inertia::render('Products/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return Inertia::render('Products/Create',['categories' => $categories, 'warehouses' => $warehouses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'warehouse_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'name' => 'required|max:100',
            'cost_price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'nullable',
            'weight' => 'nullable|numeric',
            'photo' => 'nullable'
        ]);

        Product::create([
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'stock' => $request->quantity,
//            'barcode' => $request->barcode,
            'cost_price' => $request->cost_price,
            'sales_price' => $request->sales_price,
            'tax' => $request->tax,
            'description' => $request->description,
            'weight' => $request->weight,
            'photo' => $request->photo ? $request->photo->store('users', 'public') : null,
        ]);

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return Inertia::render('Products/Edit',['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
//            'warehouse_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'name' => 'required|max:100',
            'cost_price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'tax' => 'required|numeric',
//            'quantity' => 'required|numeric',
            'description' => 'nullable',
            'weight' => 'nullable|numeric',
            'photo' => 'nullable'
        ]);
       $product->update($request->only( 'category_id', 'name', 'cost_price', 'sales_price', 'tax',  'description'));

        return redirect()->route('products')->with('success', 'Product edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function onShelf(){
        $products = Product::where('stock', '>=', 5)->with('category')->get();

        return Inertia::render('Inventory/OnShelf', ['products' => $products]);
    }

    public function lowStock(){
        $products = Product::where([['stock', '<', 5], ['stock', '>', 0]])->with('category')->get();

        return Inertia::render('Inventory/LowStock', ['products' => $products]);
    }

    public function outOfStock(){
        $products = Product::where('stock', '<=', 0)->with('category')->get();

        return Inertia::render('Inventory/OutOfStock', ['products' => $products]);
    }

    public function stock(){
        $products = Product::all();

        return Inertia::render('Inventory/AddStock', ['products' => $products]);
    }

    public function storeStock(Request $request){

        $request->validate([
            'warehouse_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $product = Product::findOrFail($request->product_id);
        Purchase::create([
            'warehouse_id' => auth()->user()->warehouse_id,
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'qty_before' => $product->stock,
            'qty' => $request->quantity,
            'qty_after' => $product->stock + $request->quantity,
        ]);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('products')->with('success', 'Product stocked successfully');
    }
}
