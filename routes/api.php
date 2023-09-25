<?php

use App\Http\Controllers\AuthAdminController;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategorieController;
use App\Http\Controllers\Backend\ProductController;

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


Route::group(['prefix' => 'customer'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AuthAdminController::class, 'login']);
});



Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    ///////          Section        //////////

    Route::group(['prefix' => 'section'], function () {
        Route::get('/index', [SectionController::class, 'index']);
        Route::post('/store', [SectionController::class, 'store']);
        Route::get('/edit/{id}', [SectionController::class, 'edit']);
        Route::post('/update/{id}', [SectionController::class, 'update']);
        Route::delete('/destroy/{id}', [SectionController::class, 'destroy']);
    });

    /////         category      ///////////
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategorieController::class, 'index']);
        Route::post('/store', [CategorieController::class, 'store']);
        Route::get('/edit/{id}', [CategorieController::class, 'edit']);
        Route::post('/update/{id}', [CategorieController::class, 'update']);
        Route::delete('/destroy/{id}', [CategorieController::class, 'destroy']);
    });

    ////  Products  /////////////////

    Route::group(['prefix' => 'product'], function () {
        Route::resource('/product',ProductController::class);

    });


});










