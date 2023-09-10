<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

// Auth API Route

Route::post('/user-registration', [UserController::class, 'userregistration']);
Route::post('/user-login', [UserController::class, 'userlogin']);
Route::post('/send-otp-code', [UserController::class, 'sendotpcode']);
Route::post('/Otp-verify', [UserController::class, 'Otpverify']);
Route::post('/Set-Password', [UserController::class, 'SetPassword'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user-profile', [UserController::class, 'userprofile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/profile-update', [UserController::class, 'profileupdate'])->middleware([TokenVerificationMiddleware::class]);


//logout
Route::get('/logout', [UserController::class, 'userlogout']);


// Auth Page Route

Route::get('/User-Registration', [UserController::class, 'RegistrationPage']);
Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/send-otp', [UserController::class, 'EmailOTPpage']);
Route::get('/Verify-OTP', [UserController::class, 'VerifyOTPpage']);
Route::get('/Reset-Password', [UserController::class, 'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/dashboard', [DashboardController::class, 'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user/user-profile', [UserController::class, 'ProfilePage']);

// category API

Route::get('/category-list', [CategoryController::class, 'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-category', [CategoryController::class, 'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-update', [CategoryController::class, 'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-delete', [CategoryController::class, 'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-By-Id', [CategoryController::class, 'CategoryUpdateById'])->middleware([TokenVerificationMiddleware::class]);

// Category page route

Route::get('/category-page', [CategoryController::class, 'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);


// Customer API

Route::get('/customer-list', [CustomerController::class, 'customerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-customer', [CustomerController::class, 'customerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-customer', [CustomerController::class, 'customerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-update', [CustomerController::class, 'customerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-by-id', [CustomerController::class, 'customerById'])->middleware([TokenVerificationMiddleware::class]);


// Customer page route

Route::get('/customer-page', [CustomerController::class, 'customerPage'])->middleware([TokenVerificationMiddleware::class]);


// product API

Route::post('create-product', [ProductController::class, 'productCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('product-by-id', [ProductController::class, 'productById'])->middleware([TokenVerificationMiddleware::class]);
Route::get('product-list', [ProductController::class, 'productList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('product-delete', [ProductController::class, 'productDelete'])->middleware([TokenVerificationMiddleware::class]);
