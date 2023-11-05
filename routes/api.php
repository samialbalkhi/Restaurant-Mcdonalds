<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\FamilyController;
use App\Http\Controllers\Backend\MycafeController;
use App\Http\Controllers\Backend\DetailsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\jobOfferController;
use App\Http\Controllers\Backend\workTimeController;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Backend\ViewOrderController;
use App\Http\Controllers\Backend\EmailsSentController;
use App\Http\Controllers\Backend\AuthCustomerController;
use App\Http\Controllers\Backend\ProfileAdminController;
use App\Http\Controllers\Backend\ourRestaurantController;
use App\Http\Controllers\Backend\workTimeOfferController;
use App\Http\Controllers\Backend\VerifyPasswordController;
use App\Http\Controllers\Backend\RestaurantReviewController;
use App\Http\Controllers\Backend\ourResponsibilityController;
use App\Http\Controllers\Backend\RestaurantBrancheController;
use App\Http\Controllers\Backend\ViewJobApplicationController;
use App\Http\Controllers\Backend\employmentOpportunityController;
use App\Http\Controllers\Backend\AnsweringJobApplicationsController;
use App\Http\Controllers\Backend\RestaurantOwnerController;

include 'frontendapi.php';
include 'restaurantOwner.php';

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
    Route::get('logout', [AuthCustomerController::class, 'logout']);
    Route::post('/verifyPassword', [VerifyPasswordController::class, 'verifyPassword']);
});

Route::group(['prefix' => 'customer'], function () {
    Route::post('login', [AuthCustomerController::class, 'login']);
    Route::post('register', [AuthCustomerController::class, 'register']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('login', [AuthAdminController::class, 'login']);
});

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    Route::resource('/sections', SectionController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/mycafes', MycafeController::class);
    Route::resource('/familys', FamilyController::class);
    Route::resource('/ourResponsibilitys', ourResponsibilityController::class);
    Route::resource('/ourRestaurants', ourRestaurantController::class);
    Route::resource('/careers', CareerController::class);
    Route::resource('/employmentOpportunity', employmentOpportunityController::class);
    Route::resource('/workTimes', workTimeController::class);
    Route::resource('/workTimeOffers', workTimeOfferController::class);
    Route::resource('/jobOffers', jobOfferController::class);

    Route::group(['prefix' => 'Detail'], function () {
        Route::controller(DetailsController::class)->group(function () {
            Route::get('edit/{details}', 'edit');
            Route::post('update/{details}', 'update');
            Route::delete('destroy/{details}', 'destroy');
        });
    });

    Route::group(['prefix' => 'AnsweringJobApplications'], function () {
        Route::post('sendmail/{employmentApplication}', [AnsweringJobApplicationsController::class, 'sendmail']);
    });

    Route::group(['prefix' => 'EmailsSentController'], function () {
        Route::get('index', [EmailsSentController::class], 'index');
        Route::get('getAnswering/{Answering_job_application}', [EmailsSentController::class], 'getAnswering');
    });

    Route::group(['prefix' => 'RestaurantReview'], function () {
        Route::get('index', [RestaurantReviewController::class, 'index']);
        Route::delete('destroy/{restaurantReview}', [RestaurantReviewController::class, 'destroy']);
    });

    Route::resource('/cities', CityController::class);

    Route::controller(ViewJobApplicationController::class)->group(function () {
        Route::get('index', 'index');
        Route::get('show/{employmentApplication}', 'show');
        Route::get('downloadCv/{employmentApplication}', 'downloadCv');
    });

    Route::resource('/restaurantBranche', RestaurantBrancheController::class);
    Route::resource('/drivers', DriverController::class);

    Route::get('/editProfileAdmin', [ProfileAdminController::class, 'edit']);
    Route::post('/updateProfileAdmin/{user}', [ProfileAdminController::class, 'update']);

    Route::group(['prefix' => 'order'], function () {
        Route::controller(ViewOrderController::class)->group(function () {
            Route::get('/index', 'index');
            Route::get('/numberOfOrder', 'numberOfOrder');
            Route::get('/paidOrder', 'paidOrder');
        });
    });

    Route::resource('/restaurantOwner', RestaurantOwnerController::class);
    
});
