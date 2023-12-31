<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\ShowCatagoryController;
use App\Http\Controllers\ShowUserController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\StaffAnalyticsController;
use App\Http\Controllers\VehiclesController;
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

Route::get('/', [VehiclesController::class, 'indexView']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirects', 'App\Http\Controllers\HomeController@index');

//VIEW WHEN ADMIN HOME/DASHBOARD CLICKED
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');

//VIEW WHEN ADMIN USERS CLICKED
// Route::get('/admin/users', function () {
//     return view('admin.users');
// })->name('users');

//VIEW WHEN ADMIN VEHICLES CLICKED
Route::get('/admin/vehicles', [VehiclesController::class, 'adminVehicles'])->name('adminVehiclesDashboard');

//VIEW WHEN ADMIN BOOKINGS CLICKED
Route::get('/admin/booking', [BookingController::class, 'index'])->name('adminBookingDashboard');

//VIEW WHEN ADMIN SELL VEHICLE IS CLICKED
Route::get('/admin/sell/vehicle', [SellingController::class, 'adminSellVehicle'])->name('adminSellVehicle');

//VIEW WHEN ADMIN STAFF ANALYTICS IS CLICKED
Route::get('admin/staffAnalytics', [StaffAnalyticsController::class, 'index'])->name('staffAnalyticsDashboard');





//CRUD FOR USERS MANAGEMENT ADMIN
Route::get('/admin/users', [ShowUserController::class, 'show'])->name('users');

Route::post('/admin/users', [ShowUserController::class, 'store'])->name('newuser');

Route::delete('/admin/users/{id}', [ShowUserController::class, 'destroy'])->name('deleteuser');

Route::put('/admin/users/{id}', [ShowUserController::class, 'update'])->name('updateuser');

Route::get('/admin/users/{id}/edit', [ShowUserController::class, 'edit'])->name('edituser');

//activate a user
Route::get('/admin/users/{id}/activate', [ShowUserController::class, 'activate'])->name('activateuser');

//deactivate a user
Route::get('/admin/users/{id}/deactivate', [ShowUserController::class, 'deactivate'])->name('deactivateuser');

//search user by name or email
Route::get('/admin/users/search', [ShowUserController::class, 'search'])->name('searchuser');

// Route::get('/admin/users/{id}/edit', [ShowUserController::class, 'edit'])->name('edituser');





//CRUD FOR VEHICLE MANAGEMENT ADMIN
Route::post('/admin/vehicles', [VehiclesController::class, 'store'])->name('addVehicle');

//Search Vehicle
Route::get('/admin/vehicles/search', [VehiclesController::class, 'search'])->name('searchVehicle');

Route::delete('/admin/vehicles/{id}', [VehiclesController::class, 'destroy'])->name('deletevehicle');

Route::put('/admin/vehicles/{id}', [VehiclesController::class, 'update'])->name('updatevehicle');

Route::get('/admin/vehicle/{id}/edit', [VehiclesController::class, 'edit'])->name('editvehicle');

//Vehicle Info
Route::get('/admin/vehicle/{id}/view', [VehiclesController::class, 'showVehicle'])->name('viewvehicle');






//CRUD FOR BOOKING MANAGEMENT ADMIN
Route::get('/admin/purchasebookings', [BookingController::class, 'adminPurchaseBookingDetails'])->name('adminPurchaseBooking');

Route::get('/admin/testdrivebookings', [BookingController::class, 'adminTestdriveBookingDetails'])->name('adminTestdriveBooking');

Route::get('/admin/pastbookings', [BookingController::class, 'adminPastBookingDetails'])->name('adminPastBooking');

//admin accept booking
Route::get('/admin/purchasebookings/{id}/accept', [BookingController::class, 'adminBookingAccept'])->name('acceptPurchaseBooking');

//reject booking
Route::get('/admin/purchasebookings/{id}/reject', [BookingController::class, 'adminBookingReject'])->name('rejectPurchaseBooking');

//admin restore booking
Route::get('/admin/pastbookings/{id}/restore', [BookingController::class, 'adminBookingRestore'])->name('restorePastBooking');





//CURD FOR SELLING VEHICLES
Route::get('/admin/sell/vehicle/{id}/preview', [SellingController::class, 'sellingpreview'])->name('previewVehicleDetails');

Route::post('/admin/sell/vehicle/{id}/sell', [SellingController::class, 'sellvehicle'])->name('sellVehicle');






//  --------------------------CRUD FOR USERS--------------------------------

//When user home is clicked
// Route::get('/shop', function () {
//     return view('shop.logged-index');
// })->name('userhome');

Route::get('/shop', [HomeController::class, 'custommer'])->name('userhome');

//When user booking is clicked
Route::get('/user/booking', [BookingController::class, 'userBooking'])->name('userBooking');



//User Category View
Route::get('/category/luxury', [ShowCatagoryController::class, 'luxury'])->name('luxury');

Route::get('/category/sedan', [ShowCatagoryController::class, 'sedan'])->name('sedan');

Route::get('/category/convertible', [ShowCatagoryController::class, 'convertible'])->name('convertible');

Route::get('/category/jdm', [ShowCatagoryController::class, 'jdm'])->name('jdm');

Route::get('/category/sports', [ShowCatagoryController::class, 'sports'])->name('sports');

Route::get('/category/hyper', [ShowCatagoryController::class, 'hyper'])->name('hyper');


//View individual Product
Route::get('/vehicle/{id}/view', [ViewProductController::class, 'view'])->name('viewproduct');

//Purchase Booking
Route::get('/vehicle/{id}/purchase', [BookingController::class, 'userPurchaseBooking'])->name('purchasebooking');

//Test Drive Booking
Route::get('/vehicle/{id}/testdrive', [BookingController::class, 'userTestdriveBooking'])->name('testdrivebooking');

//Process Purchase
Route::post('/vehicle/{id}/purchase/success', [BookingController::class, 'purchaseProcess'])->name('purchaseprocess');

//Process Test Drive
Route::post('/vehicle/{id}/testdrive/success', [BookingController::class, 'testdriveProcess'])->name('testdriveprocess');

//Purchase Booking Details
Route::get('/user/booking/purchase-bookings', [BookingController::class, 'userPurchaseBookingDetails'])->name('purchasebookingdetails');

//Test Drive Booking Details
Route::get('/user/booking/testdrive-bookings', [BookingController::class, 'userTestdriveBookingDetails'])->name('testdrivebookingdetails');

//Past Bookings
Route::get('/user/booking/past-bookings', [BookingController::class, 'userPastBookingDetails'])->name('pastbookingdetails');
