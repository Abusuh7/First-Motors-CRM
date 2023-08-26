<?php

use App\Http\Controllers\ShowCatagoryController;
use App\Http\Controllers\ShowUserController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\ViewProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('shop.index');
    // return redirect('dashboard');
    // return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirects','App\Http\Controllers\HomeController@index');

//VIEW WHEN ADMIN HOME/DASHBOARD CLICKED
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('adminhome');

//VIEW WHEN ADMIN USERS CLICKED
// Route::get('/admin/users', function () {
//     return view('admin.users');
// })->name('users');

//VIEW WHEN ADMIN PRODUCTS CLICKED
Route::get('/admin/products', function () {
    return view('admin.products');
})->name('productsview');



Route::get('/shop', function () {
    return view('shop.logged-index');
})->name('userhome');



//CRUD FOR USERS MANAGEMENT
Route::get('/admin/users', [ShowUserController::class, 'show'])->name('users');

Route::post('/admin/users', [ShowUserController::class, 'store'])->name('newuser');

Route::delete('/admin/users/{id}', [ShowUserController::class, 'destroy'])->name('deleteuser');

Route::put('/admin/users/{id}', [ShowUserController::class, 'update'])->name('updateuser');

Route::get('/admin/users/{id}/edit', [ShowUserController::class, 'edit'])->name('edituser');

// Route::get('/admin/users/{id}/edit', [ShowUserController::class, 'edit'])->name('edituser');


//CRUD FOR PRODUCTS MANAGEMENT
// Route::post('/admin/products', 'ShowProductController@store')->name('addproduct');
Route::get('/admin/products', [ShowProductController::class, 'show'])->name('products');

Route::post('/admin/products', [ShowProductController::class, 'store'])->name('addproduct');

Route::delete('/admin/products/{id}', [ShowProductController::class, 'destroy'])->name('deleteproduct');

Route::put('/admin/products/{id}', [ShowProductController::class, 'update'])->name('updateproduct');

Route::get('/admin/products/{id}/edit', [ShowProductController::class, 'edit'])->name('editproduct');

//route for search
// Route::get('/admin/products', [ShowProductController::class, 'search'])->name('search');


//Screen routes
// Route::get('/product', function () {
//     return view('shop.products.product1');
// })->name('product');



//Category View

Route::get('/category/luxury', [ShowCatagoryController::class, 'luxury'])->name('luxury');

Route::get('/category/sedan', [ShowCatagoryController::class, 'sedan'])->name('sedan');

Route::get('/category/convertible', [ShowCatagoryController::class, 'convertible'])->name('convertible');

Route::get('/category/jdm', [ShowCatagoryController::class, 'jdm'])->name('jdm');

Route::get('/category/sports', [ShowCatagoryController::class, 'sports'])->name('sports');

Route::get('/category/hyper', [ShowCatagoryController::class, 'hyper'])->name('hyper');


//View Product

Route::get('/products/{id}/view', [ViewProductController::class, 'view'])->name('viewproduct');
