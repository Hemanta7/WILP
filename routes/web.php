<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PublicController::class, 'getHomepage'])->name('homepage');

// Customer Routes
// Get Profile
Route::get('/profile', [CustomerController::class, 'getProfile'])->name('customer.profile');
// Post Campaign
Route::post('/campaign/post', [CustomerController::class, 'postCampaign'])->name('post.campaign');
Route::post('/category/add', [CustomerController::class, 'addCategory'])->name('add.category');

// Admin Routes
Route::get('/', [PublicController::class, 'getHomepage'])->name('homepage');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
