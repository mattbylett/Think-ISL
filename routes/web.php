<?php

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

Route::get('/', 'WelcomeController@showWelcomePage')->name('welcome');

Route::post('callback', 'Auth\CallbackController@callback')->name('callback');

Route::get('authorization', 'Auth\LoginController@authorization')->name('authorization');

Route::get('categories/{title}-{id}', 'CategoryController@showCategoryProducts')->name('woocommerce.categories.show');

Route::get('products/{title}-{id}', 'ProductController@showProduct')->name('woocommerce.products.show');

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('products','ProductController');
//
// Route::get('/dashboard',function(){
//   return view('dashboard');
// })->name('dashboard');

// Route::get('/products',
//   'ProductController@index')->name('products.index');
//
// Route::get('/products/create',
//     'ProductController@create')->name('products.create');
//
// Route::get('/products/{product}',
//     'ProductController@show')->name('products.show');
//
// Route::post('/products',
//     'ProductController@store')->name('products.store');
//
// Route::get('/products/{product}/edit',
//     'ProductController@edit')->name('products.edit');
//
// Route::put('/products/{product}',
//     'ProductController@update')->name('products.update');



// Route::get('woocommerce/connect',
//     'WoocommerceController@connect')->name('woocommerce.connect');
