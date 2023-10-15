<?php

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
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
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\OurResponsibilityController;
use App\Http\Controllers\Backend\EmploymentOpportunityController;
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
        Route::get('/edit/{section}', [SectionController::class, 'edit']);
        Route::patch('/update/{section}', [SectionController::class, 'update'])->name('updateSection');
        Route::delete('/destroy/{section}', [SectionController::class, 'destroy']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategorieController::class, 'index']);
        Route::post('/store', [CategorieController::class, 'store']);
        Route::get('/edit/{category}', [CategorieController::class, 'edit']);
        Route::post('/update/{category}', [CategorieController::class, 'update'])->name('update_category');
        Route::delete('/destroy/{category}', [CategorieController::class, 'destroy']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/edit/{product}', [ProductController::class, 'edit']);
        Route::post('/update/{product}', [ProductController::class, 'update']);
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy']);
    });

    Route::group(['prefix' => 'mycafe'], function () {
        Route::get('/index', [MycafeController::class, 'index']);
        Route::post('/store', [MycafeController::class, 'store']);
        Route::get('/edit/{mycafe}', [MycafeController::class, 'edit']);
        Route::post('/update/{mycafe}', [MycafeController::class, 'update'])->name('update_mycafe');
        Route::delete('/destroy/{mycafe}', [MycafeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'family'], function () {
        Route::get('/index', [FamilyController::class, 'index']);
        Route::post('/store', [FamilyController::class, 'store']);
        Route::get('/edit/{family}', [FamilyController::class, 'edit']);
        Route::post('/update/{family}', [FamilyController::class, 'update'])->name('update_family');
        Route::delete('/destroy/{family}', [FamilyController::class, 'destroy']);
    });

    Route::group(['prefix' => 'ourresponsibility'], function () {
        Route::get('/index', [OurResponsibilityController::class, 'index']);
        Route::post('/store', [OurResponsibilityController::class, 'store']);
        Route::get('/edit/{ourresponsibility}', [OurResponsibilityController::class, 'edit']);
        Route::post('/update/{ourresponsibility}', [OurResponsibilityController::class, 'update'])->name('update_ourresponsibility');
        Route::delete('/destroy/{ourresponsibility}', [OurResponsibilityController::class, 'destroy']);
    });

    Route::group(['prefix' => 'OurRestaurant'], function () {
        Route::get('/index', [OurRestaurantController::class, 'index']);
        Route::post('/store', [OurRestaurantController::class, 'store']);
        Route::get('/edit/{ourRestaurant}', [OurRestaurantController::class, 'edit']);
        Route::post('/update/{ourRestaurant}', [OurRestaurantController::class, 'update'])->name('update_ourRestaurant');
        Route::delete('/destroy/{ourRestaurant}', [OurRestaurantController::class, 'destroy']);
    });

    Route::group(['prefix' => 'career'], function () {
        Route::get('/index', [CareerController::class, 'index']);
        Route::post('/store', [CareerController::class, 'store']);
        Route::get('/edit/{career}', [CareerController::class, 'edit']);
        Route::post('/update/{career}', [CareerController::class, 'update'])->name('update_career');
        Route::delete('/destroy/{career}', [CareerController::class, 'destroy']);
    });

    Route::group(['prefix' => 'job'], function () {
        Route::get('/index', [EmploymentOpportunityController::class, 'index']);
        Route::post('/store', [EmploymentOpportunityController::class, 'store']);
        Route::get('/edit/{employment_opportunities}', [EmploymentOpportunityController::class, 'edit']);
        Route::post('/update/{employment_opportunities}', [EmploymentOpportunityController::class, 'update'])->name('update_employment_opportunities');
        Route::delete('/destroy/{employment_opportunities}', [EmploymentOpportunityController::class, 'destroy']);
    });

    Route::group(['prefix' => 'JobOffer'], function () {
        Route::get('/index', [JobOfferController::class, 'index']);
        Route::post('/store', [JobOfferController::class, 'store']);
        Route::get('/edit/{job_offer}', [JobOfferController::class, 'edit']);
        Route::post('/update/{job_offer}', [JobOfferController::class, 'update'])->name('update_jobOffer');
        Route::delete('/destroy/{job_offer}', [JobOfferController::class, 'destroy']);
    });

    Route::group(['prefix' => 'Detail'], function () {
        Route::get('/edit/{details}', [DetailsController::class, 'edit']);
        Route::post('/update/{details}', [DetailsController::class, 'update']);
        Route::delete('/destroy/{details}', [DetailsController::class, 'destroy']);
    });

    Route::group(['prefix' => 'AnsweringJobApplications'], function () {
        Route::get('index', [AnsweringJobApplicationsController::class, 'index']);
        Route::post('sendmail/{id}', [AnsweringJobApplicationsController::class, 'sendmail']);
        Route::get('getAnswering/{id}', [AnsweringJobApplicationsController::class, 'getAnswering']);
    });

    Route::group(['prefix' => 'ProductReview'], function () {
        Route::get('/index', [ProductReviewController::class, 'index']);
        Route::delete('destroy/{id}', [ProductReviewController::class, 'destroy']);
    });
});
