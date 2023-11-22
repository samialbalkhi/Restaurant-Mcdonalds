<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RegisterRequest;
use App\Service\Frontend\ProfileCustomerService;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Frontend\UpdateProfileCustomerRequest;

class ProfileCustomerController extends Controller
{
    public function __construct(private ProfileCustomerService $ProfileCustomerService)
    {
    }
    public function register(RegisterRequest $request)
    {
        $uesr = $this->ProfileCustomerService->register($request);
        return response()->json($uesr, 201);
    }
    public function getProfileCustomer()
    {
        return response()->json($this->ProfileCustomerService->getProfileCustomer());
    }
    public function profileCustomer(UpdateProfileCustomerRequest $request)
    {
        return $this->ProfileCustomerService->profileCustomer($request);
    }

    public function logout()
    {
        $this->ProfileCustomerService->logout();
        return response()->json(
            [
                'message' => 'logout success',
            ],
            200,
        );
    }
}
