<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantOwner\ShowOrderController;
use App\Http\Controllers\RestaurantOwner\ShowBranchController;
use App\Http\Controllers\RestaurantOwner\ShowDriverController;
use App\Http\Controllers\RestaurantOwner\ShowReviewController;
use App\Http\Controllers\RestaurantOwner\ShowItemsOrderController;
use App\Http\Controllers\RestaurantOwner\ShowNumberOfOrderController;
use App\Http\Controllers\RestaurantOwner\AuthRestaurantOwnerController;
use App\Http\Controllers\RestaurantOwner\ShowTheOrderAccountingController;

Route::group(['prefix' => 'AuthRestaurantOwner'], function () {
    Route::post('/login', [AuthRestaurantOwnerController::class, 'login']);
});
Route::group(['middleware' => ['auth:sanctum', 'abilities:restaurantowner']], function () {
    /////      View the branch followed by the restaurant owner////////
    Route::group(['prefix' => 'showBranchRestaurant'], function () {
        Route::get('/show', ShowBranchController::class);
    });

    ////        Display drivers belonging to the owner of the branch affiliated with the restaurant and to the owner of the restaurant/////////////
    Route::group(['prefix' => 'showDriverRestaurant'], function () {
        Route::get('/show', ShowDriverController::class);
    });

    ////////  Display all orders returned to the branch of the restaurant and display orders whose status is true    //////////////
    Route::group(['prefix' => 'showOrderRestaurant'], function () {
        Route::get('/allOrders', [ShowOrderController::class, 'allOrders']);
        Route::get('/orderStatusTrue', [ShowOrderController::class, 'orderStatusTrue']);
        Route::get('/showOneOrder/{id}', [ShowOrderController::class, 'showOneOrder']);
        Route::get('/total_amount_all_orders', [ShowOrderController::class, 'total_amount_all_orders']);
    });

    //////////////////   View the ratings and comments related to the restaurant belonging to the restaurant branch and to the restaurant owner/////////////////
    Route::group(['prefix' => 'showReviewRestaurant'], function () {
        Route::get('/show', ShowReviewController::class);
    });

    Route::group(['prefix' => 'numberOfOrder'], function () {
        Route::get('/totalNumberoOfOrder', [ShowNumberOfOrderController::class, 'totalNumberoOfOrder']);
        Route::get('/totalNumberoOfOrderStatusTrue', [ShowNumberOfOrderController::class, 'totalNumberoOfOrderStatusTrue']);
    });

    Route::group(['prefix' => 'showTheOrderAccounting'], function () {
        Route::get('/show/{orderId}', ShowTheOrderAccountingController::class);
    });

    ///          View order items    /////
    Route::group(['prefix' => 'showItemsOrder'], function () {
        Route::get('/showItemsOrder/{orderId}', [ShowItemsOrderController::class, 'showItemsOrder']);
        Route::get('/showOneItemOrder/{orderItem}', [ShowItemsOrderController::class, 'showOneItemOrder']);
    });
});
