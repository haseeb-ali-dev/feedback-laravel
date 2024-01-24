<?php

use App\Http\Controllers\Api\v1\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('comment/{feedback_id}', [CommentController::class, 'index'])->name('comment.index');
Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
