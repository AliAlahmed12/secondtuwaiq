<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;




Route::group(['prefix'=>'/dashboard', 'middleware'=>'auth'], function(){


    Route::get('/',[Dashboard::class, 'index'])->name('index');
    Route::get('/products',[Dashboard::class, 'getProducts'])->name('product');
    Route::get('/products/del/{id}',[Dashboard::class, 'del'])->name('del');
    Route::get('/products/edit/{id}',[Dashboard::class, 'edit'])->name('edit');
    Route::post('/products/filter', [Dashboard::class, 'filter'])->name('filter');

    Route::post('/products/create', [Dashboard::class, 'createProduct'])->name('createProduct');
    Route::post('/products/edit/update', [Dashboard::class, 'update'])->name('update');
   
}


);

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Home routes @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Product routes @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Product Details routes @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

Route::get('/dashboard/productdetails',[Dashboard::class, 'getProductDetails'])->name('getProductDetails');
Route::get('/dashboard/productdetails/del/{id}',[Dashboard::class, 'delProductDetails'])->name('delProductDetails');
Route::get('/dashboard/productdetails/edit/{id}',[Dashboard::class, 'editProductDetails'])->name('editProductDetails');

Route::post('/dashboard/createproductdetail', [Dashboard::class, 'createProductDetails'])->name('createProductDetails');
Route::post('/dashboard/productdetails/search', [Dashboard::class, 'searchProductDetails'])->name('searchProductDetails');
Route::post('/dashboard/products/edit/updatedetails', [Dashboard::class, 'updateDetails'])->name('updateDetails');

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


Route::get('/', function () {
    return view('welcome');
})->name('homePage');


Route::get('/store/cart', [ShoppingController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('/store/cart/delete/{id}', [ShoppingController::class, 'delItem'])->name('delItem');

Route::get('/store/list-items', [ShoppingController::class, 'showListItems'])->name('listItems');
Route::get('/store/list-items/showdetails/{id}', [ShoppingController::class, 'showDetails'])->name('showDetails');
Route::get('/store/list-items/showdetails/add_to_cart/{id}', [ShoppingController::class, 'add_to_cart'])->name('add_to_cart')->middleware('auth');



Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


Route::get('/get/coffe',[ShoppingController::class, 'getCoffe'])->name('getGames');
Route::get('/get/users',[ShoppingController::class, 'users'])->name('users');
Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
