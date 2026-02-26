<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('landing', function () {
    return view('landing');
});
Route::get('notfound', function () {
    return view('not-found');
});
Route::get('register', function () {
    return view('register');
});
Route::get('dashboard', function () {
    return view('dashboard');
});