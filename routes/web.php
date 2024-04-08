<?php

use App\Http\Controllers\User\PassengerController as UserPassengerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\FlightController as AdminFlightController;
use App\Http\Controllers\AirlineManager\DashboardController as AirlineManagerDashboardController;
use App\Http\Controllers\AirlineManager\FlightController as AirlineManagerFlightController;
use App\Http\Controllers\User\FlightController as UserFlightController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\AirlineController as AdminAirlineController;
use App\Http\Controllers\Admin\AirportController as AdminAirportController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\NationalityController as AdminNationalityController;
use App\Http\Controllers\Admin\FlightTypeController as AdminFlightTypeController;

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

// Welcome Page
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');

// Authentication Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', AdminUserController::class);
    Route::get('/flights', [AdminFlightController::class, 'flights'])->name('admin.flights.index');
    Route::post('/flights-insert', [AdminFlightController::class, 'flights_insert'])->name('admin.flights.insert');
    Route::get('/flights-list', [AdminFlightController::class, 'list'])->name('admin.flights.list');
    Route::get('/flights-edit/{flight}', [AdminFlightController::class, 'edit'])->name('admin.flights.edit');
    Route::post('/flights-edit-update/{flight}', [AdminFlightController::class, 'edit_update'])->name('admin.flights.update');
    Route::get('/flights/{flight}/approve', [AdminFlightController::class, 'approve'])->name('admin.flights.approve');
    Route::get('/flights/{flight}/reject', [AdminFlightController::class, 'reject'])->name('admin.flights.reject');
    Route::get('/flight/delete/{flight_id}', [AdminFlightController::class, 'delete'])->name('flight.delete');

    //user list
    Route::get('/user', [HomeController::class, 'users'])->name('admin.users');
    Route::post('/manager-insert', [HomeController::class, 'manager_insert'])->name('admin.manager_insert');
    Route::post('/user-insert', [HomeController::class, 'users_insert'])->name('admin.users_insert');
    Route::get('/user/delete/{user_id}', [HomeController::class, 'delete'])->name('user.delete');

    //reviews
    Route::resource('review', AdminReviewController::class)
        ->names('admin.review');

    // Resource routes for Airline
    Route::resource('airline', AdminAirlineController::class)
        ->names('admin.airline');

    // Resource routes for Airport
    Route::resource('airport', AdminAirportController::class)
        ->names('admin.airport');
    
    // Flight Type
    Route::resource('flighttype', AdminFlightTypeController::class)
        ->names('admin.flighttype');
    
    // Nationality
    Route::resource('nationality', AdminNationalityController::class)
        ->names('admin.nationality');

    //coupon code
    Route::resource('coupon', AdminCouponController::class)
        ->names('admin.coupon');

    //faq
    Route::resource('faq', AdminFaqController::class)
        ->names('admin.faq');

});

// Airline Manager Routes
Route::prefix('airlinemanager')->group(function () {
    Route::get('/', [AirlineManagerDashboardController::class, 'index'])->name('airlinemanager.dashboard');
    Route::resource('/flights', AirlineManagerFlightController::class);

});




// User Routes
Route::prefix('user')->group(function () {
    Route::post('/passengers/store', [UserPassengerController::class, 'store'])->name('user.passengers.store');
    Route::post('/booking/apply-coupon', [UserBookingController::class, 'applyCoupon'])->name('booking.applyCoupon');
    Route::post('/flights/search', [UserFlightController::class, 'search'])->name('user.flights.search');
    Route::get('/flights', [UserFlightController::class, 'index'])->name('user.flights.index');
    Route::post('/flights/show', [UserFlightController::class, 'show'])->name('user.flights.show');
    Route::get('/bookings/create/{flightId}', [UserBookingController::class, 'create'])->name('user.bookings.create');
    Route::post('/bookings/store/{flightId}', [UserBookingController::class, 'store'])->name('user.bookings.store');
    Route::get('/bookings', [UserBookingController::class, 'index'])->name('user.bookings.index');
    Route::get('/profile', [ProfileController::class, 'my_profile'])->name('user.profile');
    Route::get('/wish-list', [ProfileController::class, 'wish_list'])->name('user.wish.list');
    Route::POST('/profile-update/{id}', [ProfileController::class, 'profile_update'])->name('user.profile.update');
    Route::POST('/email-update/{id}', [ProfileController::class, 'email_update'])->name('user.email.update');
    Route::POST('/password-update/{id}', [ProfileController::class, 'password_update'])->name('user.password.update');
});