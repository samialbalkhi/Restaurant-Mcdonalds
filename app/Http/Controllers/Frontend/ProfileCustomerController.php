<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ProfileCustomerService;
use App\Http\Requests\Backend\UpdateProfileRequest;

class ProfileCustomerController extends Controller
{
    public function __construct(private ProfileCustomerService $ProfileCustomerService)
    {
    }
    public function getProfileCustomer()
    {
        return response()->json($this->ProfileCustomerService->getProfileCustomer());
    }
    public function profileCustomer(Request $request)
    {
       return $this->ProfileCustomerService->profileCustomer($request);

    }
}
