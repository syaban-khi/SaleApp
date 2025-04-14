<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ReportDetailUserController;
use App\Http\Controllers\ReportDetailController;
use App\Http\Controllers\CustomerUserController;
use App\Http\Controllers\ReportSaleController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\SaleUserController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

//Auth::routes();

// Authentification
Route::prefix('/')->group(function () {
    Route::get('/login', [AuthentificationController::class, 'showFormLogin'])->name('login'); 
    Route::post('/login', [AuthentificationController::class, 'postLogin'])->name('login.post'); 
    Route::get('/register', [AuthentificationController::class, 'showFormRegister'])->name('register'); 
    Route::post('/register-post', [AuthentificationController::class, 'postRegister'])->name('register.post'); 
    Route::get('/logout', [AuthentificationController::class, 'logout'])->name('logout');
});

// Admin
Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Shop
    Route::resource('shops', ShopController::class)->except(['create', 'destroy', 'show']);

    // Suppliers
    Route::resource('suppliers', SupplierController::class)->except(['show']);
    Route::get('/suppliers/print', 'SupplierController@printData')->name('suppliers.print');

    // Categories
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('/categories/print', 'CategoryController@printData')->name('categories.print');

    // Customers
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::get('/customers/print', 'CustomerController@printData')->name('customers.print');

    // Products
    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('/products/print', 'ProductController@printData')->name('products.print');
    
    Route::get('/sales/print', [SaleController::class, 'printData'])->name('sales.print');

    // Sales
    Route::resource('sales', SaleController::class)->except(['edit', 'update']);
    Route::get('/sales/print', 'SaleController@printData')->name('sales.print');

    // Report Sales
    Route::get('/reportSale', [ReportSaleController::class, 'reportView'])->name('reportSale');
    Route::get('/download-pdf', [ReportSaleController::class, 'downloadPDF'])->name('sale.download-pdf');

    // Report Detail
    Route::get('/reportDetail', [ReportDetailController::class, 'reportView'])->name('reportDetail');
    Route::get('/report-detail/download-pdf', [ReportDetailController::class, 'downloadPDF'])->name('detail.download-pdf');
});

// User
Route::middleware(['auth', 'ceklevel:user'])->group(function () {
    Route::get('/homeUser', [HomeUserController::class, 'index'])->name('homeUser');

    // Customer User
    Route::get('customerUser', [CustomerUserController::class, 'customerIndex'])->name('customerUser.index');
    Route::get('customerUser/create', [CustomerUserController::class, 'customerCreate'])->name('customerUser.create');
    Route::post('customerUser', [CustomerUserController::class, 'customerStore'])->name('customerUser.store');

    // Sale User
    Route::get('/saleUser', [SaleUserController::class, 'saleIndex'])->name('saleUser.index');
    Route::get('/saleUser/create', [SaleUserController::class, 'saleCreate'])->name('saleUser.create');
    Route::post('/saleUser', [SaleUserController::class, 'saleStore'])->name('saleUser.store');
    Route::get('/saleUser/{id}', [SaleUserController::class, 'saleShow'])->name('saleUser.show');

    // Report Detail User
    Route::get('/reportDetailUser', [ReportDetailUserController::class, 'reportView'])->name('reportDetailUser');
    Route::get('/report-detail-user/download-pdf', [ReportDetailUserController::class, 'downloadPDF'])->name('reportDetailUser.download-pdf');
});
