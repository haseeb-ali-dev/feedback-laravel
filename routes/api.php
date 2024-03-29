<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->as('api.v1.')->group(function () {
    require __DIR__ . '/api/v1/auth.php';

    Route::middleware('auth:sanctum')->group(function () {
        require __DIR__ . '/api/v1/category.php';
        require __DIR__ . '/api/v1/feedback.php';
        require __DIR__ . '/api/v1/comment.php';
    });
});
