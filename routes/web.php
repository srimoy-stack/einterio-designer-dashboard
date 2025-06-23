<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Designer\DashboardController;
use App\Http\Controllers\Designer\RoomPackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes handle public, auth-protected, and role-based access
| for Einterio 2.0. Designer functionality is scoped via route prefix
| and middleware.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// ✅ Designer Dashboard + Upload Routes (auth + role protected)
Route::middleware(['auth', 'role:designer'])
    ->prefix('designer')
    ->name('designer.') // This adds 'designer.' prefix to route names
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/upload', [RoomPackController::class, 'create'])->name('room-packs.create');
        Route::post('/upload', [RoomPackController::class, 'store'])->name('room-packs.store');
    });


// ✅ Profile Management (shared for all roles)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Breeze Auth (login, register, etc.)
require __DIR__.'/auth.php';
