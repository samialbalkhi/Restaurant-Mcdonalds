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
use App\Http\Controllers\Backend\WorkTimeController;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Backend\EmailsSentController;
use App\Http\Controllers\Backend\AuthCustomerController;
use App\Http\Controllers\Backend\OurRestaurantController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\WorkTimeOfferController;
use App\Http\Controllers\Frontend\Home\GetSectionController;
use App\Http\Controllers\Backend\OurResponsibilityController;
use App\Http\Controllers\Backend\EmploymentOpportunityController;
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
Route::resource('/category',CategoryController::class);

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    
        Route::resource('/section',SectionController::class);

    Route::group(['prefix' => 'product'], function () {
        Route::get('index', [ProductController::class, 'index']);
        Route::post('store', [ProductController::class, 'store']);
        Route::get('edit/{product}', [ProductController::class, 'edit']);
        Route::post('update/{product}', [ProductController::class, 'update']);
        Route::delete('destroy/{product}', [ProductController::class, 'destroy']);
    });

    Route::group(['prefix' => 'mycafe'], function () {
        Route::get('index', [MycafeController::class, 'index']);
        Route::post('store', [MycafeController::class, 'store']);
        Route::get('edit/{mycafe}', [MycafeController::class, 'edit']);
        Route::post('update/{mycafe}', [MycafeController::class, 'update'])->name('updateMycafe');
        Route::delete('destroy/{mycafe}', [MycafeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'family'], function () {
        Route::get('index', [FamilyController::class, 'index']);
        Route::post('store', [FamilyController::class, 'store']);
        Route::get('edit/{family}', [FamilyController::class, 'edit']);
        Route::post('update/{family}', [FamilyController::class, 'update'])->name('updateFamily');
        Route::delete('destroy/{family}', [FamilyController::class, 'destroy']);
    });

    Route::group(['prefix' => 'ourResponsibility'], function () {
        Route::get('index', [OurResponsibilityController::class, 'index']);
        Route::post('store', [OurResponsibilityController::class, 'store']);
        Route::get('edit/{ourResponsibility}', [OurResponsibilityController::class, 'edit']);
        Route::post('update/{ourResponsibility}', [OurResponsibilityController::class, 'update'])->name('updateOurResponsibility');
        Route::delete('destroy/{ourResponsibility}', [OurResponsibilityController::class, 'destroy']);
    });

    Route::group(['prefix' => 'ourRestaurant'], function () {
        Route::get('index', [OurRestaurantController::class, 'index']);
        Route::post('store', [OurRestaurantController::class, 'store']);
        Route::get('edit/{ourRestaurant}', [OurRestaurantController::class, 'edit']);
        Route::post('update/{ourRestaurant}', [OurRestaurantController::class, 'update'])->name('updateOurRestaurant');
        Route::delete('destroy/{ourRestaurant}', [OurRestaurantController::class, 'destroy']);
    });

    Route::group(['prefix' => 'career'], function () {
        Route::get('index', [CareerController::class, 'index']);
        Route::post('store', [CareerController::class, 'store']);
        Route::get('edit/{career}', [CareerController::class, 'edit']);
        Route::post('update/{career}', [CareerController::class, 'update'])->name('updateCareer');
        Route::delete('destroy/{career}', [CareerController::class, 'destroy']);
    });

    Route::group(['prefix' => 'EmploymentOpportunity'], function () {
        Route::get('index', [EmploymentOpportunityController::class, 'index']);
        Route::post('store', [EmploymentOpportunityController::class, 'store']);
        Route::get('edit/{employmentOpportunities}', [EmploymentOpportunityController::class, 'edit']);
        Route::post('update/{employmentOpportunities}', [EmploymentOpportunityController::class, 'update'])->name('updateEmploymentOpportunities');
        Route::delete('destroy/{employmentOpportunities}', [EmploymentOpportunityController::class, 'destroy']);
    });

    Route::group(['prefix' => 'WorkTime'], function () {
        Route::get('index', [WorkTimeController::class, 'index']);
        Route::post('store', [WorkTimeController::class, 'store']);
        Route::get('edit/{WorkTime}', [WorkTimeController::class, 'edit']);
        Route::post('update/{WorkTime}', [WorkTimeController::class, 'update'])->name('updateCareer');
        Route::delete('destroy/{WorkTime}', [WorkTimeController::class, 'destroy']);
    });

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

