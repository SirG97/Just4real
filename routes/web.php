<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/gym', [WelcomeController::class, 'gym'])->name('gym');
Route::get('/sports', [WelcomeController::class, 'sports'])->name('sports');
Route::get('/spare-parts', [WelcomeController::class, 'spareParts'])->name('spare-parts');
Route::get('/wines', [WelcomeController::class, 'wines'])->name('wines');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');

Route::get('/login', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/show', [ProductController::class, 'show'])->name('products.show');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/on-shelf', [ProductController::class, 'onShelf'])->name('products.shelf');
    Route::get('/products/low-stock', [ProductController::class, 'lowStock'])->name('products.low');
    Route::get('/products/out-of-stock', [ProductController::class, 'outOfStock'])->name('products.out');
    Route::get('/product/stock', [ProductController::class, 'stock'])->name('products.stock');
    Route::post('/product/stock', [ProductController::class, 'storeStock'])->name('products.stock.store');


    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse');
//    Route::post('/warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('/warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::post('/warehouse/change', [WarehouseController::class, 'change'])->name('warehouse.change');

    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases');
    Route::get('/purchases/create', [PurchaseController::class, 'index'])->name('purchases.create');
    Route::post('/purchases/store', [PurchaseController::class, 'index'])->name('purchases.store');

    Route::get('/sales', [SalesController::class, 'index'])->name('transactions');
    Route::post('/sales', [SalesController::class, 'store'])->name('transactions.create');

    Route::resource('roles', RoleController::class);

    Route::get('users', [UserController::class, 'index'])->name('users');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');

    Route::post('users', [UserController::class, 'store'])->name('users.store');

    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('roles', [RoleController::class, 'index'])->name('roles');

    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');

    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');

    Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');

    Route::put('role/{id}', [RoleController::class, 'update'])->name('role.update');

    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    /*
     *
     * Permission routes
     *
     */

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');

    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');

    Route::post('permission', [PermissionController::class, 'store'])->name('permissions.store');

    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');

    Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permission.update');

    Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


    Route::get('report/daily', [ReportController::class, 'daily'])->name('report.daily');
    Route::get('report/weekly', [ReportController::class, 'weekly'])->name('report.weekly');
    Route::get('report/monthly', [ReportController::class, 'monthly'])->name('report.monthly');
    Route::get('report/yearly', [ReportController::class, 'yearly'])->name('report.yearly');
    Route::get('report/all', [ReportController::class, 'all'])->name('report.all');
    Route::get('report/sales/{id}', [ReportController::class, 'showReport'])->name('report.show');
    Route::get('report/financial', [ReportController::class, 'financialReport'])->name('report.financial');

});

