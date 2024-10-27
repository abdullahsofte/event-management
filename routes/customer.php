<?php

use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/customer-login', [CustomerController::class, 'customer'])->name('customer.login');
Route::post('/customer-login-store', [CustomerController::class, 'AuthCheck'])->name('customer.login.store');
Route::get('/customer-register-form', [CustomerController::class, 'customerForm'])->name('customer.register.form');
Route::post('/customer-register', [CustomerController::class, 'customerStore'])->name('customer.register');

Route::group(['middleware' => 'customerCheck'], function () {
    Route::get('/customer-logout', [CustomerController::class, 'logout'])->name('customer.logout');
    Route::get('/customer-dashboard', [DashboardController::class, 'dashboard'])->name('customer.dashboard');
    Route::post('/customer-update', [DashboardController::class, 'customerUpdate'])->name('auth.customer.update');
    Route::post('/customer-address', [DashboardController::class, 'addressChange'])->name('auth.customer.address');
    Route::get('/order-delete/{id}', [DashboardController::class, 'orderDelete'])->name('auth.order.delete');
    Route::get('/customer-quote-details/{id}', [DashboardController::class, 'quoteDetails'])->name('quote-details.website');

    Route::get('/chekcout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/chekcout-store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
});
