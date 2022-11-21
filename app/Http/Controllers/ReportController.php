<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
class ReportController extends Controller
{


    public function daily(){
        $orders = Order::where('created_at', '>', Carbon::today())->with('details')->get();
        $totalSales = Order::where('created_at', '>', Carbon::today())->count();
        $productsSold = OrderDetail::where('created_at', '>', Carbon::today())->sum('quantity');
        $amountSold = Order::where('created_at', '>', Carbon::today())->sum('total');
        $POS = Order::where([['payment_method', '=', 'POS'], ['created_at', '>', Carbon::today()]])->sum('total');
        $cash = Order::where([['payment_method', '=', 'cash'], ['created_at', '>', Carbon::today()]])->sum('total');
        $total_cost = OrderDetail::where('created_at', '>', Carbon::today())->get()->sum(function($t){
            return $t->quantity * $t->cost_price;
        });
        $total_sales = OrderDetail::where('created_at', '>', Carbon::today())->get()->sum(function($t){
            return $t->quantity * $t->unit_price;
        });

        $profit = $total_sales - $total_cost;
//        dd($totalSales, $productsSold);
        return Inertia::render('Reports/Daily', compact('orders', 'totalSales', 'productsSold', 'amountSold', 'POS', 'cash', 'profit'));
    }

    public function weekly(){
        $orders = Order::with('details')->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->startOfWeek(),
        ])->get();
        $totalSales = Order::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();
        $productsSold = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');
        $amountSold = Order::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $POS = Order::where('payment_method', '=', 'POS')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $cash = Order::where('payment_method', '=', 'cash')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $total_cost = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->cost_price;
        });
        $total_sales = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->unit_price;
        });


        $profit = $total_sales - $total_cost;
//        dd($totalSales, $productsSold);
        return Inertia::render('Reports/Weekly', compact('orders', 'totalSales', 'productsSold', 'amountSold', 'POS', 'cash', 'profit'));
    }

    public function monthly(){
        $orders = Order::with('details')->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $totalSales = Order::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        $productsSold = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');
        $amountSold = Order::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total');
        $POS = Order::where('payment_method', '=', 'POS')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $cash = Order::where('payment_method', '=', 'cash')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $total_cost = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->cost_price;
        });
        $total_sales = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->unit_price;
        });


        $profit = $total_sales - $total_cost;
//        dd($totalSales, $productsSold);
        return Inertia::render('Reports/Monthly', compact('orders', 'totalSales', 'productsSold', 'amountSold', 'POS', 'cash', 'profit'));
    }

    public function yearly(){
        $orders = Order::with('details')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get();
        $totalSales = Order::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();
        $productsSold = OrderDetail::sum('quantity');
        $amountSold = Order::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $POS = Order::where('payment_method', '=', 'POS')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $cash = Order::where('payment_method', '=', 'cash')->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('total');
        $total_cost = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->cost_price;
        });
        $total_sales = OrderDetail::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->get()->sum(function($t){
            return $t->quantity * $t->unit_price;
        });

        $profit = $total_sales - $total_cost;
//        dd($totalSales, $productsSold);
        return Inertia::render('Reports/Yearly', compact('orders', 'totalSales', 'productsSold', 'amountSold', 'POS', 'cash', 'profit'));
    }

    public function all(){
        $orders = Order::with('details')->get();
        $totalSales = Order::count();
        $productsSold = OrderDetail::sum('quantity');
        $amountSold = Order::sum('total');
        $POS = Order::where('payment_method', '=', 'POS')->sum('total');
        $cash = Order::where('payment_method', '=', 'cash')->sum('total');
        $total_cost = OrderDetail::all()->sum(function($t){
            return $t->quantity * $t->cost_price;
        });
        $total_sales = OrderDetail::all()->sum(function($t){
            return $t->quantity * $t->unit_price;
        });

        $profit = $total_sales - $total_cost;
//        dd($totalSales, $productsSold);
        return Inertia::render('Reports/All', compact('orders', 'totalSales', 'productsSold', 'amountSold', 'POS', 'cash', 'profit'));
    }

    public function showReport($id){
        $order = Order::where('id', $id)->with(['details','details.product'])->first();
//        dd($order);
        return Inertia::render('Reports/Show', compact('order'));
    }
}
