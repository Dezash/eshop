<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', \App\Http\Livewire\ProductList::class);
Route::get('/products/{id}', \App\Http\Livewire\ProductView::class)->name('product_view');
Route::get('/userProducts', \App\Http\Livewire\UserProductList::class)->name('user_product_list');
Route::get('/userProducts/{id}', \App\Http\Livewire\UserProductView::class)->name('user_product_view');
Route::get('/createProduct', \App\Http\Livewire\CreateProduct::class)->name('create_product_view');
Route::get('/editProduct/{id}', \App\Http\Livewire\EditProduct::class)->name('edit_product_view');

Route::middleware([\App\Http\Middleware\CORS::class])->group(function () {
    Route::resources([
        'users' => UserController::class,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('userlist', App\Http\Livewire\UserList::class)->name('userlist')->middleware('auth');
