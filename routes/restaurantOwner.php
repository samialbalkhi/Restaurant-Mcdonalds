<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantOwner\AuthRestaurantOwnerController;
use App\Http\Controllers\RestaurantOwner\ViewOrderRestaurantOwnerController;

Route::group(['prefix' => 'AuthRestaurantOwner'], function () {
    Route::post('/login', [AuthRestaurantOwnerController::class, 'login']);
});
Route::group(['middleware' => ['auth:sanctum', 'abilities:restaurantowner']], function () {
    Route::group(['prefix' => 'ViewRestaurantOrder'], function () {
        Route::get('/showbranch', [ViewOrderRestaurantOwnerController::class, 'showbranch']);
        Route::get('/viewdriver', [ViewOrderRestaurantOwnerController::class, 'viewdriver']);
        Route::get('/vieworder', [ViewOrderRestaurantOwnerController::class, 'vieworder']);
        Route::get('/viewReview', [ViewOrderRestaurantOwnerController::class, 'viewReview']);
        Route::get('/numberoforder', [ViewOrderRestaurantOwnerController::class, 'numberoforder']);
        Route::get('/paidorder', [ViewOrderRestaurantOwnerController::class, 'paidorder']);
        Route::get('/viewTheOrderInvoice/{orderId}', [ViewOrderRestaurantOwnerController::class, 'viewTheOrderInvoice']);



    });
});
