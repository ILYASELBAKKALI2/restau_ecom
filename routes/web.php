<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'ActivateAccount'])->name('user.activate');

Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class, 'ResendCode'])->name('code.resend');

Route::resource('/products', 'App\Http\Controllers\ProductController');

Route::get('/products/Category/{category}','App\Http\Controllers\ProductController@getProduct_By_Category')
        ->name("Category.Products");

Route::get('/contact',[App\Http\Controllers\SendEmailController::class,'Create'])->name('show.contact');

Route::post('/contact',[App\Http\Controllers\SendEmailController::class,'Store'])->name('store.message');

Route::get('/test',[App\Http\Controllers\Homecontroller::class,'test']);

Route::get('/cart',[App\Http\Controllers\CartController::class,'index'])->name('cart.index');

Route::post('/add/cart/{product}',[App\Http\Controllers\CartController::class,'addProductToCart'])->name('add.cart');

Route::put('/update/{product}/cart',[App\Http\Controllers\CartController::class,'updateProductOnCart'])->name('update.cart');

Route::delete('/remove/{rowId}/cart',[App\Http\Controllers\CartController::class,'removeProductFromCart'])->name('remove.cart');

Route::get('/Apropos',[App\Http\Controllers\HomeController::class, 'About']);

Route::get('/search',[App\Http\Controllers\HomeController::class, 'Search'])->name('search');

Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/login',[App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])->name('admin.login');

Route::post('/admin/login',[App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');

Route::post('/admin/logout',[App\Http\Controllers\AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin/products',[App\Http\Controllers\AdminController::class, 'getProducts'])->name('admin.products');

Route::get('/admin/categories',[App\Http\Controllers\AdminController::class, 'getCategories'])->name('admin.categories');

Route::get('/admin/orders',[App\Http\Controllers\AdminController::class, 'getOrders'])->name('admin.orders');

Route::resource('categories', 'App\Http\Controllers\CategoryController');

Route::get('/product/price',[App\Http\Controllers\ProductController::class, 'Search_By_Price'])->name('price.filter');

Route::resource('orders', 'App\Http\Controllers\OrderController');

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');

Route::get('/admin/orders/search', 'App\Http\Controllers\AdminController@searchOrders')->name('orders.search');

Route::get('/admin/products/search', 'App\Http\Controllers\AdminController@searchProducts')->name('products.search');

Route::get('/admin/categories/search', 'App\Http\Controllers\AdminController@searchCategories')->name('categories.search');

Route::get('/livreur/orders/search', 'App\Http\Controllers\LivreurController@searchOrders_Liv')->name('orders.search.livreur');

Route::put('/admin/orders/{order}',[App\Http\Controllers\AdminController::class, 'updateOrderInTable'])->name('update.orders');

Route::delete('/orders/{order}',[App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.delete');

Route::delete('/admin/orders/{order}',[App\Http\Controllers\AdminController::class, 'deleteOrderFromTable'])->name('admin.orders.delete');

Route::get('/livreur',[App\Http\Controllers\LivreurController::class, 'index'])->name('livreur.index');

Route::get('/livreur/login',[App\Http\Controllers\LivreurController::class, 'showLivreurLoginForm'])->name('livreur.login');

Route::post('/livreur/login',[App\Http\Controllers\LivreurController::class, 'LivreurLogin'])->name('livreur.login');

Route::post('/livreur/logout',[App\Http\Controllers\LivreurController::class, 'LivreurLogout'])->name('livreur.logout');

Route::put('/livreur/orders/paid/{order}',[App\Http\Controllers\LivreurController::class, 'updatePaidOrder'])->name('update.paid.orders');

Route::put('/livreur/orders/delivered/{order}',[App\Http\Controllers\LivreurController::class, 'updateDeliveredOrder'])->name('update.delivered.orders');

Route::put('/livreur/state/{livreur}',[App\Http\Controllers\LivreurController::class, 'LivreurState'])->name('update.state');

Route::post('/livreur',[App\Http\Controllers\LivreurController::class, 'Store_Message'])->name('livreur.store.message');

Route::put('/admin/orders/{order}',[App\Http\Controllers\AdminController::class, 'Add_Order_To_Livreur'])->name('livreur_order');

Route::get('/admin/livreurs/create',[App\Http\Controllers\AdminController::class, 'Create_Livreur'])->name('livreur.create');

Route::post('/admin/orders',[App\Http\Controllers\AdminController::class, 'Add_Livreur'])->name('livreurs.store');

Route::get('/admin/orders/{livreur}',[App\Http\Controllers\AdminController::class, 'Delete_Livreur'])->name('livreur.delete');









