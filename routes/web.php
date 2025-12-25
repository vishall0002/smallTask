<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\AuthViewController;
use App\Http\Controllers\ContactController;

Route::get('/auth-page', [AuthViewController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('admin.contacts.index');

Route::prefix('contacts')->name('admin.contacts.')->group(function () {
    // Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/create', [ContactController::class, 'create'])->name('create');
    Route::get('/custom-fields', [ContactController::class, 'customFields'])->name('custom-fields');
});