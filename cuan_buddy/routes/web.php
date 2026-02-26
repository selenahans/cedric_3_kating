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
Route::get(uri: 'notfound', action: function () {
    return view('not-found');
});


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
    Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.process');
    Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.process');
});

Route::get('/forgotpass', function () {
        return view('forgot-password');
    })->name('forgot-password');

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->name('password.update');

    use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Test email', function ($message) {
        $message->to('aileenjoycedavid@gmail.com')
                ->subject('Test Mail');
    });

    return 'Email sent';
});
