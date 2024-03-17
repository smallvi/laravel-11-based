<?php

use Illuminate\Support\Facades\Route;

Route::domain('admin.' . env('MAIN_DOMAIN', FALSE))->group(function () {
    Route::get('/', function () {
        // return redirect()->route('admin.login');
        return view('admin.auth.login');
    });

    Route::get('/login', function () {
        // return redirect()->route('admin.login');
        return view('admin.auth.login');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';