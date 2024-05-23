<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
// use App\Http\Controllers\ForgotPasswordController;


// login,Register
Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'login_page');
    Route::get('login_page',[authcontroller::class,'login_page'])->name('auth#login');
    Route::get('register_page',[authcontroller::class,'register_page'])->name('auth#register');
    Route::get('forgot_password',[ForgotPasswordController::class,'forgot_password'])->name('auth#forgot_password');
    Route::post('forgot_password',[ForgotPasswordController::class,'password_forgot'])->name('forgot#password');
    Route::get('reset_password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset#password');
    Route::post('reset_password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password#reset');
});


Route::middleware(['auth','verified'])->group(function () {

    Route::get('auth',[authcontroller::class,'auth'])->name('auth');

    // Admin
    Route::middleware(['admin_auth'])->group(function () {
        Route::prefix('admin')->group(function () {

            // Account
            Route::prefix('profile')->group(function () {
                Route::get('detail/{id}',[admincontroller::class,'profile_detail'])->name('profile#detail');
                Route::get('edit',[admincontroller::class,'profile_edit'])->name('profile#edit');
                Route::post('edit/{id}',[admincontroller::class,'profile_update'])->name('profile#update');
                Route::get('password',[admincontroller::class,'update_password'])->name('profile#update_password');
                Route::post('password',[admincontroller::class,'password_update'])->name('update#password');
            });

            // manage accounts
            Route::prefix('account')->group(function () {
                Route::get('list',[admincontroller::class,'account_list'])->name('account#list');
            });

            // Category
            Route::prefix('category')->group(function () {
                Route::get('create',[CategoryController::class,'category_create'])->name('category#create');
                Route::post('create',[CategoryController::class,'create'])->name('create#category');
                Route::get('edit/{id}',[CAtegoryController::class,'category_edit'])->name('category#edit');
                Route::post('edit',[CategoryController::class,'edit'])->name('edit#category');
                Route::get('list',[CategoryController::class,'category_list'])->name('category#list');
                Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete#category');
            });

            // Product
            Route::prefix('product')->group(function () {
                Route::get('create',[ProductController::class,'product_create'])->name('product#create');
                Route::post('create',[ProductController::class,'create'])->name('create#product');
                Route::get('list',[ProductController::class,'product_list'])->name('product#list');
                Route::get('edit/{id}',[ProductController::class,'product_edit'])->name('product#edit');
                Route::post('edit',[ProductController::class,'edit'])->name('edit#product');
                Route::get('delete/{id}',[ProductController::class,'delete'])->name('delete#product');
            });


        });
    });



    // User
        Route::middleware(['user_auth'])->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('home',[usercontroller::class,'user_home'])->name('user#home');
            });
        });
});
