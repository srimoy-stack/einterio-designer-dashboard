<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Designer\DashboardController;
use App\Http\Controllers\Designer\RoomPackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Handles public access, auth protection, and role-based routing for
| designer-specific features. Breeze handles auth separately.
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth', 'role:designer'])
    ->prefix('designer')
    ->name('designer.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(RoomPackController::class)->prefix('room-packs')->name('room-packs.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });
    });

require __DIR__ . '/auth.php';
