<?php

use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
