<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return Inertia::render('Sales', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'cart' => 'required'
        ]);

        $cart = json_decode($request->cart);
//    dd($cart[0]->warehouse_id);
        try{

            DB::transaction(function() use ($request, $cart){
                // Create a new order instance and populate order with Name, phone, total,
                $order = Order::create([
                    'name' => $request->name,
                    'warehouse_id'=> $cart[0]->warehouse_id,
                    'user_id' => auth()->user()->id,
                    'phone' => $request->phone,
                    'address' => 'No 12 Awka Road, Onitsha',
                    'total' => $request->total,
                    'paid_amount' => $request->total,
                    'balance' => 0,
                    'payment_method' => $request->payment_method,
                    'txn_date' => Carbon::now(),
                    'txn_amount' => $request->total,
                ]);
                // Run a forloop, create order details and decrement stock

                for($i = 0; $i < count($cart); $i++){
                    $detail = OrderDetail::create([
                        'order_id' => $order->id,
                        'warehouse_id' => $cart[$i]->warehouse_id,
                        'product_id' => $cart[$i]->id,
                        'quantity' => $cart[$i]->quantity,
                        'cost_price' => $cart[$i]->cost_price,
                        'unit_price' => $cart[$i]->sales_price,
                        'amount' => $cart[$i]->subTotal,
                        'discount' => 0,
                    ]);

                    // Update remaining stock
                    $product = Product::where('id', $detail->product_id)->first();
                    $product->stock = $product->stock - $cart[$i]->quantity;
                    $product->save();
                }

//                Transaction::create([
//                    'warehouse_id' => $cart[0]->warehouse_id,
//                    'order_id' => $order->id,
//                    'user_id' => auth()->user()->id,
//                    'paid_amount' => $order->total,
//                    'balance' => 0,
//                    'payment_method' => $request->payment_method,
//                    'txn_date' => Carbon::now(),
//                    'txn_amount' => $order->amount,
//                ]);
            });

        }catch(\Exception $e){
            return back()->with('error', 'Order could not be created. Please try again');
        }

        return back()->with(['success' => 'Order created successfully'], ['receipt' => $cart]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
