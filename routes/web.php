<?php

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
use App\Http\Controllers\HomeController;

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
Route::get('/', function () {
    return view('welcome');
});

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
    //flight delete
    Route::get('/flight/delete/{flight_id}', [AdminFlightController::class, 'delete'])->name('flight.delete');

    //user list
    Route::get('/user', [HomeController::class, 'users'])->name('admin.users');
    Route::post('/manager-insert', [HomeController::class, 'manager_insert'])->name('admin.manager_insert');
    Route::post('/user-insert', [HomeController::class, 'users_insert'])->name('admin.users_insert');
    Route::get('/user/delete/{user_id}', [HomeController::class, 'delete'])->name('user.delete');

    //reviews
    Route::get('/reviews', [HomeController::class, 'reviews'])->name('admin.reviews');
    Route::get('/review/insert', [HomeController::class, 'review_insert'])->name('admin.review.insert');
    Route::get('/review/delete/{review_id}', [HomeController::class, 'review_delete'])->name('review.delete');
});

// Airline Manager Routes
Route::prefix('airlinemanager')->group(function () {
    Route::get('/', [AirlineManagerDashboardController::class, 'index'])->name('airlinemanager.dashboard');
    Route::resource('/flights', AirlineManagerFlightController::class);
});

// User Routes
Route::prefix('user')->group(function () {
    Route::get('/flights', [UserFlightController::class, 'index'])->name('user.flights.index');
    Route::get('/flights/{flight}', [UserFlightController::class, 'show'])->name('user.flights.show');
    Route::get('/bookings/create/{flightId}', [UserBookingController::class, 'create'])->name('user.bookings.create');
    Route::post('/bookings/store/{flightId}', [UserBookingController::class, 'store'])->name('user.bookings.store');
    Route::get('/bookings', [UserBookingController::class, 'index'])->name('user.bookings.index');
});