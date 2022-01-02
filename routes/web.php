<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthHandlerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;

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

// Swith Page Handler

Route::get('login', function(){
    return view('loginpage');
})->name('login');

Route::get('addProduct', function(){
    return view('addProduct');
});

Route::get('addAdmin', function(){
    return view('addAdmin');
});


// User Auth Handler
Route::post('registerUser', [AuthHandlerController::class, 'registerUser'])->name('registerUser');
Route::post('registerAdmin', [AuthHandlerController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('loginHandler', [AuthHandlerController::class, 'loginHandler'])->name('loginHandler');
Route::get('logoutHandler', [AuthHandlerController::class, 'logoutHandler'])->name('logoutHandler');

// Custom Route Handler
// Route::post('filter', [ProductController::class, 'filter'])->name('product.filter');
// Route::get('filter', [ProductController::class, 'filter'])->name('product.filter');
Route::get('/', [ProductController::class, 'index'])->name('/');

// Resource Handler
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('user', UserController::class);
Route::resource('supplier', SupplierController::class);

// Group Handler MM
Route::middleware('auth')->group(function(){
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
});