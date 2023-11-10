<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\loginRequest;
use App\Service\Backend\AuthCustomerService;
use App\Http\Requests\Backend\RegisterRequest;

class AuthCustomerController extends Controller
{
    public function __construct(private AuthCustomerService $AuthCustomerService)
    {
    }
    public function login(loginRequest $request)
    {
        return response()->json(
            $this->AuthCustomerService->login($request));
    }

  

  
}
