<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PublicController::class, 'getHomepage'])->name('homepage');

// Customer Routes
Route::middleware('role:customer')->group(function () {
    // Get Profile
    Route::get('/profile', [CustomerController::class, 'getProfile'])->name('customer.profile');
    // Post Campaign
    Route::post('/campaign/post', [CustomerController::class, 'postCampaign'])->name('post.campaign');
    Route::post('/category/add', [CustomerController::class, 'addCategory'])->name('add.category');
});
// Admin Routes
Route::prefix('admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'getUsers'])->name('user.list');
        // Get All Posts
        Route::get('/posts', [AdminController::class, 'getPosts'])->name('post.list');
        // Approve and Disapprove Post
        Route::post('/change/post-status/{id}', [AdminController::class, 'changePostStatus'])->name('change.post');
    });
});

// Super Admin Routes
Route::middleware('role:superadmin')->group(function () {
    Route::get('/manage-user', [SuperUserController::class, 'getUser'])->name('manage.user');
    Route::get('/manage-user/add', [SuperUserController::class, 'getAddUser'])->name('add.user');
    Route::post('/manage-user/add', [SuperUserController::class, 'postAddUser'])->name('add.user');
    Route::delete('/manage-user/delete/{id}', [SuperUserController::class, 'postDeleteUser'])->name('delete.user');
    Route::post('/manage-user/role/{id}', [SuperUserController::class, 'postManageRole'])->name('manage.role');
    Route::post('/manage-user/disable/{id}', [SuperUserController::class, 'postDisableAccount'])->name('disable.account');
});
