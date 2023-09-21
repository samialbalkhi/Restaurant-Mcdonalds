<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategorieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});



Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategorieController::class, 'index']);
        Route::post('/store', [CategorieController::class, 'store']);
        Route::get('/edit/{id}', [CategorieController::class, 'edit']);
        Route::post('/update/{id}', [CategorieController::class, 'update']);
        Route::delete('/destroy/{id}', [CategorieController::class, 'destroy']);
    });
});



Route::group(['prefix' => 'Auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
