<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\tsetController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\FamilyController;
use App\Http\Controllers\Backend\MycafeController;
use App\Http\Controllers\Backend\DetailsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\JobOfferController;
use App\Http\Controllers\Backend\workTimeController;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Backend\EmailsSentController;
use App\Http\Controllers\Backend\AuthCustomerController;
use App\Http\Controllers\Backend\ourRestaurantController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\WorkTimeOfferController;
use App\Http\Controllers\Frontend\Home\GetSectionController;
use App\Http\Controllers\Backend\ourResponsibilityController;
use App\Http\Controllers\Backend\employmentOpportunityController;
use App\Http\Controllers\Backend\AnsweringJobApplicationsController;
use App\Http\Controllers\Frontend\Home\ShowProductsAtHomeController;
use App\Http\Controllers\Frontend\ShowProduct\ShowProductController;
use App\Http\Controllers\Frontend\ShowCategory\ShowCategoryController;
use App\Http\Controllers\Frontend\ShowSectioMycafe\ShowSectioMycafeController;
use App\Http\Controllers\Frontend\ShowOurRestaurant\ShowOurRestaurantController;
use App\Http\Controllers\Frontend\ShowSectioFamily\ShowSectioMyFamilyController;
use App\Http\Controllers\Frontend\ShowSectionCareer\ShowSectionCareerController;
use App\Http\Controllers\Frontend\ShowOurResponsibiliy\ShowOurResponsibiliyController;
use App\Http\Controllers\Frontend\ShowSectionCareer\ShowEmploymentOpportunitiesController;

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
});

Route::group(['prefix' => 'customer'], function () {
    Route::post('login', [AuthCustomerController::class, 'login']);
    Route::post('register', [AuthCustomerController::class, 'register']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('login', [AuthAdminController::class, 'login']);
});

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    
    Route::resource('/sections',SectionController::class);
    Route::resource('/categories',CategoryController::class); 
    Route::resource('/products',ProductController::class); 
    Route::resource('/mycafes',MycafeController::class); 
    Route::resource('/familys',FamilyController::class);
    Route::resource('/ourResponsibilitys',ourResponsibilityController::class);
    Route::resource('/ourRestaurants',ourRestaurantController::class); 
    Route::resource('/careers',CareerController::class); 
    Route::resource('/employmentOpportunity',employmentOpportunityController::class); 
    Route::resource('/workTimes',workTimeController::class); 

    Route::group(['prefix' => 'WorkTimeOffer'], function () {
        Route::get('edit/{JobOfferTime}', [WorkTimeOfferController::class, 'edit']);
        Route::post('update/{JobOfferTime}', [WorkTimeOfferController::class, 'update']);
        Route::delete('destroy/{JobOfferTime}', [WorkTimeOfferController::class, 'destroy']);
    });

    Route::group(['prefix' => 'JobOffer'], function () {
        Route::get('index', [JobOfferController::class, 'index']);
        Route::post('store', [JobOfferController::class, 'store']);
        Route::get('edit/{jobOffer}', [JobOfferController::class, 'edit']);
        Route::post('update/{jobOffer}', [JobOfferController::class, 'update'])->name('updateJobOffer');
        Route::delete('destroy/{jobOffer}', [JobOfferController::class, 'destroy']);
    });

    Route::group(['prefix' => 'Detail'], function () {
        Route::get('edit/{details}', [DetailsController::class, 'edit']);
        Route::post('update/{details}', [DetailsController::class, 'update']);
        Route::delete('destroy/{details}', [DetailsController::class, 'destroy']);
    });

    Route::group(['prefix' => 'AnsweringJobApplications'], function () {
        Route::post('sendmail/{employmentApplication}', [AnsweringJobApplicationsController::class, 'sendmail']);
    });

    Route::group(['prefix' => 'EmailsSentController'], function () {
        Route::get('index', [EmailsSentController::class, 'index']);
        Route::get('getAnswering/{Answering_job_application}', [EmailsSentController::class, 'getAnswering']);
    });

    Route::group(['prefix' => 'ProductReview'], function () {
        Route::get('index', [ProductReviewController::class, 'index']);
        Route::delete('destroy/{productReview}', [ProductReviewController::class, 'destroy']);
    });
});

/////////////////    frontend         //////////////////////
Route::group(['prefix' => 'Home'], function () {
    Route::get('getSection', GetSectionController::class);
    //////////// Display the products on the home page, the last three products and the last four featured products     ////////////////////

    Route::get('Show_the_last_three_products', [ShowProductsAtHomeController::class, 'Show_the_last_three_products']);
    Route::get('FeaturedProduct', [ShowProductsAtHomeController::class, 'FeaturedProduct']);
});
//////////     View category information   ///////////////////////
Route::get('getCategory/{category}', ShowCategoryController::class);

/////        Display the products + display the product itself    /////
Route::get('ShowProduct/{product}', [ShowProductController::class, 'ShowProduct']);
Route::get('getOneProduct/{product}', [ShowProductController::class, 'getOneProduct']);

//// View the mycafy section + all its contents /////
Route::get('ShowSectioMycafe/{section}', ShowSectioMycafeController::class);

/////////////////////       Show information section Family            /////////////////////
Route::get('ShowSectioMyFamily/{section}', ShowSectioMyFamilyController::class);

//////////////       View our responsibility section information        /////////////////
Route::get('ShowOurResponsibiliy/{section}', ShowOurResponsibiliyController::class);

//////////   View information in our restaurant section //////////////////
Route::get('ShowOurRestaurant/{section}', ShowOurRestaurantController::class);

//////    View information in the Career section    ////////////////
Route::get('ShowSectionCareer/{section}', ShowSectionCareerController::class);
 ////////////      View job opportunities in the Career section           /////////////////////
Route::get('ShowEmploymentOpportunities', [ShowEmploymentOpportunitiesController::class,'ShowEmploymentOpportunities']);
////////////     View the job offer in the Professional Life section                ////////////////////////
Route::get('ShowJobOffer/{jobOffer}', [ShowEmploymentOpportunitiesController::class,'ShowJobOffer']);
Route::get('ViewOneJobOffer/{jobOffer}', [ShowEmploymentOpportunitiesController::class,'ViewOneJobOffer']);

