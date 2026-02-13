<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('landing', function () {
    return view('landing');
});
Route::get('login', function () {
    return view('login');
});
Route::get('register', function () {
    return view('register');
});

// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

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
    return view('finance.index');
})->name('finance.index');  