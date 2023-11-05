<?php
namespace App\Service\RestaurantOwner;

class ViewOrderRestaurantOwnerService
{
    public function showbranch()
    {
        $owner = auth()->user();

        $restaurantBranche = $owner->restaurantBranche;

        return $restaurantBranche;
    }
    public function viewdriver()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->drivers;
    }
    public function vieworder()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->orders;
    }
    public function viewReview()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->restaurantReviews;
    }

    public function numberoforder()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->orders->count();
    }

    public function paidorder()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->ordersWithStatusTrue;
    }
    public function viewTheOrdeaccounting($orderId)
    {
        $owner = auth()->user();
        $order = $owner->restaurantBranche->orders()->find($orderId);

        dd($order);
       
    }
}
