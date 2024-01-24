<?php

use App\Http\Controllers\Api\v1\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
