<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('landing');
});
// Route::get('landing', function () {
//     return view('landing');
// });


// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/onboarding/pet-selection', function () {
        return view('onboarding.pet-selection');
    })->name('onboarding.pet-selection');

    Route::get('/onboarding/financial-setup', function () {
        return view('onboarding.financial-setup');
    })->name('onboarding.financial-setup');
    Route::get('/transaksi/index', function () {
        return view('transaksi.index');
    })->name('transaksi.index');
    Route::get('/laporan/index', function () {
        return view('laporan.index');
    })->name('laporan.index');
    Route::get('/pet/index', function () {
        return view('pet.index');
    })->name('pet.index');
    Route::get('/pengaturan/index', function () {
        return view('pengaturan.index');
    })->name('pengaturan.index');
    Route::get('/notifikasi', function () {
        return view('notifikasi.index');
    })->name('notifikasi.index');
    Route::get('/success', function () {
        return view('success');
    })->name('success');
    Route::post('/logout', Logout::class)->name('Logout');
    Route::get('login', function () {
        return view('dashboard');
    })->name('login');
    Route::get('register', function () {
        return view('dashboard');
    })->name('register');
    Route::post('/profile/update', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');
});


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::get('register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/forgotpass', function () {
        return view('forgot-password');
    })->name('forgot-password');
});