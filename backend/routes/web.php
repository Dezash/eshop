<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', \App\Http\Livewire\ProductList::class)->middleware('auth');
Route::get('/products/{id}', \App\Http\Livewire\ProductView::class)->name('product_view');

Route::get('/userProducts', \App\Http\Livewire\UserProductList::class)->name('user_product_list');
Route::get('/userProducts/{id}', \App\Http\Livewire\UserProductView::class)->name('user_product_view');
Route::get('/createProduct', \App\Http\Livewire\CreateProduct::class)->name('create_product_view');
Route::get('/editProduct/{id}', \App\Http\Livewire\EditProduct::class)->name('edit_product_view');
Route::get('/orders/{id}', \App\Http\Livewire\OrderView::class)->name('order_view');

Route::middleware([\App\Http\Middleware\CORS::class])->group(function () {
    Route::resources([
        'users' => UserController::class,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('userlist', App\Http\Livewire\UserList::class)->name('userlist')->middleware('auth');
Route::get('cartlist', App\Http\Livewire\CartList::class)->name('cartlist');
Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('apply', App\Http\Livewire\PostApplication::class)->name('apply')->middleware('auth');
Route::get('applications', App\Http\Livewire\ApplicationList::class)->name('applications')->middleware('auth');
Route::get('application/{id}', App\Http\Livewire\ApplicationView::class)->name('applicationview')->middleware('auth');
