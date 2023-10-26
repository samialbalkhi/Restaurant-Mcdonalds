<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\GetSectionController;
use App\Http\Controllers\Frontend\WishList\WishListController;
use App\Http\Controllers\Frontend\Home\ShowProductsAtHomeController;
use App\Http\Controllers\Frontend\ShowProduct\ShowProductController;
use App\Http\Controllers\Frontend\ShowCategory\ShowCategoryController;
use App\Http\Controllers\Frontend\ShowSectioMycafe\ShowSectioMycafeController;
use App\Http\Controllers\Frontend\ShowOurRestaurant\ShowOurRestaurantController;
use App\Http\Controllers\Frontend\ShowSectioFamily\ShowSectioMyFamilyController;
use App\Http\Controllers\Frontend\ShowSectionCareer\ShowSectionCareerController;
use App\Http\Controllers\Frontend\ShowSectionCareer\EmploymentApplicationController;
use App\Http\Controllers\Frontend\ShowOurResponsibiliy\ShowOurResponsibiliyController;
use App\Http\Controllers\Frontend\ShowSectionCareer\ShowEmploymentOpportunitiesController;

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
Route::get('ShowEmploymentOpportunities', [ShowEmploymentOpportunitiesController::class, 'ShowEmploymentOpportunities']);
////////////     View the job offer in the Professional Life section                ////////////////////////
Route::get('ShowJobOffer/{jobOffer}', [ShowEmploymentOpportunitiesController::class, 'ShowJobOffer']);
Route::get('ViewOneJobOffer/{jobOffer}', [ShowEmploymentOpportunitiesController::class, 'ViewOneJobOffer']);
////         Submit a job request by the user    ///////////////////////////// 
Route::post('/employmentApplication', EmploymentApplicationController::class);

