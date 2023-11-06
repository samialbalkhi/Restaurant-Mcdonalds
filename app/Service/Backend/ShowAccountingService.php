<?php
namespace App\Service\Backend;

use App\Models\Accounting;

class ShowAccountingService
{
    public function index()
    {
        return Accounting::with('order:id,total_amount')->paginate();
    }
}
