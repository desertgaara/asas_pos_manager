<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigRegiController;
use App\Http\Controllers\EntryExitTargetController;
use App\Http\Controllers\ConfigTaxController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ExitStockController;
use App\Http\Controllers\EntryStockController;
use App\Http\Controllers\ReceiptConfigController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShopConfigController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupplierTargetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'shop' => ShopController::class,
        'supplier_target' => SupplierTargetController::class,
        'category' => CategoryController::class,
        'genre' => GenreController::class,
        'maker' => MakerController::class,
        'customer' => CustomerController::class,
        'user' => UserController::class,
        'entry_exit_target' => EntryExitTargetController::class,
        'config_tax' => ConfigTaxController::class,
        'plan' => PlanController::class,
        'type' => TypeController::class,
        'config_regi' => ConfigRegiController::class,
        'staff' => StaffController::class,
        'room' => RoomController::class,
        'receipt_config' => ReceiptConfigController::class,
        'shop_config' => ShopConfigController::class
    ]);
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::match(['PUT', 'PATCH'], '/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/code_search', [ProductController::class, 'code_search'])->name('product.code_search');
    Route::post('/product/name_search', [ProductController::class, 'name_search'])->name('product.name_search');
    Route::get('/product/code_create', [ProductController::class, 'code_create'])->name('product.code_create');

    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/{slip}/edit', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::match(['PUT', 'PATCH'], '/purchase/{slip}', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::delete('/purchase/{slip}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
    Route::post('/purchase/search', [PurchaseController::class, 'search'])->name('purchase.search');

    Route::get('/sale', [SaleController::class, 'index'])->name('sale.index');
    Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
    Route::post('/sale', [SaleController::class, 'store'])->name('sale.store');
    Route::get('/sale/{slip}/edit', [SaleController::class, 'edit'])->name('sale.edit');
    Route::match(['PUT', 'PATCH'], '/sale/{slip}', [SaleController::class, 'update'])->name('sale.update');
    Route::delete('/sale/{slip}', [SaleController::class, 'destroy'])->name('sale.destroy');
    Route::post('/sale/search', [SaleController::class, 'search'])->name('sale.search');

    Route::get('/exit_stock', [ExitStockController::class, 'index'])->name('exit_stock.index');
    Route::get('/exit_stock/create', [ExitStockController::class, 'create'])->name('exit_stock.create');
    Route::post('/exit_stock', [ExitStockController::class, 'store'])->name('exit_stock.store');
    Route::get('/exit_stock/{slip}/edit', [ExitStockController::class, 'edit'])->name('exit_stock.edit');
    Route::match(['PUT', 'PATCH'], '/exit_stock/{slip}', [ExitStockController::class, 'update'])->name('exit_stock.update');
    Route::delete('/exit_stock/{slip}', [ExitStockController::class, 'destroy'])->name('exit_stock.destroy');
    Route::post('/exit_stock/search', [ExitStockController::class, 'search'])->name('exit_stock.search');

    Route::get('/entry_stock', [EntryStockController::class, 'index'])->name('entry_stock.index');
    Route::get('/entry_stock/create', [EntryStockController::class, 'create'])->name('entry_stock.create');
    Route::post('/entry_stock', [EntryStockController::class, 'store'])->name('entry_stock.store');
    Route::get('/entry_stock/{slip}/edit', [EntryStockController::class, 'edit'])->name('entry_stock.edit');
    Route::match(['PUT', 'PATCH'], '/entry_stock/{slip}', [EntryStockController::class, 'update'])->name('entry_stock.update');
    Route::delete('/entry_stock/{slip}', [EntryStockController::class, 'destroy'])->name('entry_stock.destroy');
    Route::post('/entry_stock/search', [EntryStockController::class, 'search'])->name('entry_stock.search');
});
require __DIR__ . '/auth.php';
