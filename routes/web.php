<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
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

//Route::get('/', function () {
//    return view('master');
//});


//Home Page
Route::get('/', [ ViewController::class, 'index' ])->name('home');

//Insert Page | Add Product Page
Route::get('/add-product', [ ProductController::class, 'index' ])->name('add-product');

//Create a Product
Route::post('/new-product', [ ProductController::class, 'create' ])->name('new-product');

// Manage Page View | Show all Products
Route::get('/manage-product', [ ProductController::class, 'manage' ])->name('manage-product');

//Edit Product
Route::get('/edit-product/{id}', [ ProductController::class, 'edit' ])->name('edit-product');

//Update Product
Route::post('/update-product/{id}', [ ProductController::class, 'update' ])->name('update-product');

//Delete Product
Route::post('/delete-product/{id}', [ ProductController::class, 'delete' ])->name('delete-product');
