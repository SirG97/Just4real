<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $onShelf = Product::where('stock', '>', 5)->count();
        $lowStock = Product::where([['stock', '<', 5], ['stock', '>', 0]])->count();
        $outOfStock = Product::where('stock', '<=', 0)->count();
        $orders = Order::with('details')->get();
        $purchases = Purchase::with('product')->get();

        return Inertia::render('Dashboard', compact('totalProducts', 'lowStock', 'outOfStock',
                                                                        'onShelf', 'purchases', 'orders'));
    }
}
