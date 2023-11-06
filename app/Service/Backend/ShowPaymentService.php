<?php
namespace App\Service\Backend;

use App\Models\Payment;

class ShowPaymentService
{
    public function showPayment()
    {
        return Payment::paginate();
    }
}
