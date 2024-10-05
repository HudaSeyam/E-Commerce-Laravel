<?php

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
    return redirect("/home");
});

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/web', 'Auth\LoginController@showWebLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@webLogin');

Route::group(array('prefix' => 'admin','middleware' => 'auth:admin'), function()//
{  
    Route::get("/","Admin\AdminHome@index");
    Route::get("category/{id}/restore", "Admin\CategoryController@restore")->name("category.restore");
    Route::get("category/trash", "Admin\CategoryController@trash")->name("category.trash");
    Route::get("category/{id}/delete", "Admin\CategoryController@destroy")->name("category.delete");
    Route::resource("category","Admin\CategoryController");

    Route::get("product/{id}/delete", "Admin\ProductController@destroy")->name("product.delete");
    Route::resource("product","Admin\ProductController");

    Route::get("users/{id}/delete", "Admin\UsersController@destroy")->name("users.delete");
    Route::resource("users","Admin\UsersController");
});

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userRegister', 'HomeController@userRegister')->name('user-register');
Route::get('/home/allCategories/', 'HomeController@all')->name('home.all');
Route::get('/home/category/{id}', 'HomeController@category')->name('home.category');
Route::get('/home/categories', 'HomeController@categories')->name('categories');
Route::post('/home/registration', 'HomeController@userStore')->name('user.store');
Route::get('/product/details/{id}', 'HomeController@detail')->name('home.detail');


Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart/rapid-add/{id}', 'ShoppingController@rapid_add')->name('cart.rapid.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');
Route::get('/cart/update/{id}/{qty}', 'ShoppingController@cart_update')->name('cart.update');
Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');


Route::post('/registration', 'HomeController@userStore')->name('user.store');

Route::group(array('middleware' => 'auth:web'), function()
{
Route::post('/review', 'HomeController@Review');
});