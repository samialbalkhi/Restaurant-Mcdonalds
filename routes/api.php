<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{CityController, CareerController, DriverController, FamilyController, MycafeController, DetailsController, ProductController, SectionController, CategoryController, jobOfferController, workTimeController, AuthAdminController, ViewOrderController, EmailsSentController, ShowPaymentController, AuthCustomerController, ProfileAdminController, ourRestaurantController, workTimeOfferController, ShowAccountingController, RestaurantOwnerController, RestaurantReviewController, ourResponsibilityController, RestaurantBrancheController, ViewJobApplicationController, employmentOpportunityController, AnsweringJobApplicationsController};

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

Route::group(['middleware' => ['auth:sanctum']], function () {});

Route::group(['prefix' => 'customer'], function () {
    Route::post('login', [AuthCustomerController::class, 'login']);
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
    //// /Branches section of the restaurant/// /////
    Route::resource('/restaurantBranche', RestaurantBrancheController::class);

    //// The drivers' section followed the restaurant ////////////////
    Route::resource('/drivers', DriverController::class);

    Route::group(['prefix' => 'profile'], function () {
        Route::controller(ProfileAdminController::class)->group(function () {
            Route::get('/getProfile', 'getProfile');
            Route::post('/profileAdmin', 'profileAdmin');
            Route::get('logout', 'logout');
        });
    });

    Route::group(['prefix' => 'order'], function () {
        Route::controller(ViewOrderController::class)->group(function () {
            Route::get('/index', 'index');
            Route::get('/numberOfOrder', 'numberOfOrder');
            Route::get('/paidOrder', 'paidOrder');
        });
    });
    ///////////   Building a restaurant owners section      /////////////
    Route::resource('/restaurantOwner', RestaurantOwnerController::class);

    /////////           View all invoices for orders    /////////////////////////////////
    Route::get('/ShowAccounting', ShowAccountingController::class);

    Route::get('/showPayment', ShowPaymentController::class);
});
