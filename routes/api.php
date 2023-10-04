<?php

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\FamilyController;
use App\Http\Controllers\Backend\MycafeController;
use App\Http\Controllers\Backend\DetailsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\JobOfferController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\CategorieController;
use App\Http\Controllers\Backend\OurRestaurantController;
use App\Http\Controllers\Backend\OurResponsibilityController;
use App\Http\Controllers\Backend\AnsweringJobApplicationsController;

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
    
    Route::group(['prefix' => 'section'], function () {
        Route::get('/index', [SectionController::class, 'index']);
        Route::post('/store', [SectionController::class, 'store']);
        Route::get('/edit/{id}', [SectionController::class, 'edit']);
        Route::patch('/update/{id}', [SectionController::class, 'update'])->name('updateSection');
        Route::delete('/destroy/{id}', [SectionController::class, 'destroy']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategorieController::class, 'index']);
        Route::post('/store', [CategorieController::class, 'store']);
        Route::get('/edit/{id}', [CategorieController::class, 'edit']);
        Route::patch('/update/{id}', [CategorieController::class, 'update']);
        Route::delete('/destroy/{id}', [CategorieController::class, 'destroy']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
    });

    Route::group(['prefix' => 'mycafe'], function () {
        Route::get('/index', [MycafeController::class, 'index']);
        Route::post('/store/{id}', [MycafeController::class, 'store']);
    });

    Route::group(['prefix' => 'family'], function () {
        Route::get('/index', [FamilyController::class, 'index']);
        Route::post('/store/{id}', [FamilyController::class, 'store']);
    });

    Route::group(['prefix' => 'ourresponsibility'], function () {
        Route::get('/index', [OurResponsibilityController::class, 'index']);
        Route::post('/store', [OurResponsibilityController::class, 'store']);
        Route::get('/edit/{id}', [OurResponsibilityController::class, 'edit']);
        Route::post('/update/{id}', [OurResponsibilityController::class, 'update']);
        Route::delete('/destroy/{id}', [OurResponsibilityController::class, 'destroy']);
    });

    Route::group(['prefix' => 'OurRestaurant'], function () {
        Route::get('/index', [OurRestaurantController::class, 'index']);
        Route::post('/store/{id}', [OurRestaurantController::class, 'store']);
    });

    Route::group(['prefix' => 'career'], function () {
        Route::get('/index', [CareerController::class, 'index']);
        Route::post('/store/{id}', [CareerController::class, 'store']);
    });

    Route::group(['prefix' => 'job'], function () {
        Route::get('/index', [JobController::class, 'index']);
        Route::post('/store', [JobController::class, 'store']);
        Route::get('/edit/{id}', [JobController::class, 'edit']);
        Route::post('/update/{id}', [JobController::class, 'update']);
        Route::delete('/destroy/{id}', [JobController::class, 'destroy']);
    });

    Route::group(['prefix' => 'JobOffer'], function () {
        Route::get('/index', [JobOfferController::class, 'index']);
        Route::post('/store', [JobOfferController::class, 'store']);
        Route::get('/edit/{id}', [JobOfferController::class, 'edit']);
        Route::post('/update/{id}', [JobOfferController::class, 'update']);
        Route::delete('/destroy/{id}', [JobOfferController::class, 'destroy']);
    });

    Route::group(['prefix' => 'Detail'], function () {
        Route::get('/edit/{id}', [DetailsController::class, 'edit']);
        Route::post('/update/{id}', [DetailsController::class, 'update']);
        Route::delete('/destroy/{id}', [DetailsController::class, 'destroy']);
    });

    Route::group(['prefix' => 'AnsweringJobApplications'], function () {
        Route::get('index', [AnsweringJobApplicationsController::class, 'index']);
        Route::post('sendmail/{id}', [AnsweringJobApplicationsController::class, 'sendmail']);
        Route::get('getAnswering/{id}', [AnsweringJobApplicationsController::class, 'getAnswering']);
        // Route::delete('destroy/{id}', [AnsweringJobApplicationsController::class, 'destroy']);   

    });
});
