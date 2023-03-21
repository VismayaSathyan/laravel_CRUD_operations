<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

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

Route::group(['middleware' => 'revalidate'],function(){
    

Route::get('/products/archive', [ProductController::class, 'archive'] )->name('products.archive')->middleware('auth');
Route::get('/products/fileDownload/{product}', [ProductController::class, 'fileDownload'] )->name('products.fileDownload');
Route::get('/products/{product}/restore', [ProductController::class, 'restore'] )->name('products.restore')->withTrashed()->middleware('auth');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');
Route::delete('/products/{product}/delete', [ProductController::class, 'deleteForce'])->name('products.delete')->withTrashed()->middleware('auth');
// manage my products
Route::get('/products/myProductsList', [ProductController::class, 'myProducts'])->name('products.myProducts')->middleware('auth');
Route::get('/products/myArchivedProducts', [ProductController::class, 'myProductsArchive'])->name('products.myArchivedProducts')->middleware('auth');
Route::resource('products', ProductController::class);



// Route::get('products/{$product->id}', ['ProductController@restore'])->name('products.restore');
//Route::get('products/restore/{product}', [App\Http\Controllers\ProductController::class, 'restore'])->name('products.restore');
// Route::get('products/restore_all', [ProductController::class, 'restore_all'])->name('products.restore_all');
//Route::get('products/restore-all', [ProductController::class, 'restoreAll'])->name('products.restoreAll');

//Show Register or create form

Route::get('/home', [UserController::class, 'home'])->name('users.home');
Route::get('/register', [UserController::class, 'create'])->name('users.register')->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', ['before' => 'auth', UserController::class, 'logout']);
//show login form

Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

});


