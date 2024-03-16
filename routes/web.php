<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

Route::domain('admin.' . env('MAIN_DOMAIN', FALSE))->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('/login', function () {
        return redirect()->route('admin.login');
    });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';
