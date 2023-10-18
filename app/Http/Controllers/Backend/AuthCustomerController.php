<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\loginRequest;
use App\Service\Backend\AuthCustomerService;
use App\Http\Requests\Backend\RegisterRequest;

class AuthCustomerController extends Controller
{
    private $AuthCustomerService;
    public function __construct(AuthCustomerService $AuthCustomerService)
    {
        $this->AuthCustomerService = $AuthCustomerService;
    }
    public function login(loginRequest $request)
    {
        return response()->json(
            $this->AuthCustomerService->login($request));
    }

    public function register(RegisterRequest $request)
    {
          $uesr = $this->AuthCustomerService->register($request);
        return response()->json([$uesr],201);
    }

    public function logout()
    {
            $this->AuthCustomerService->logout();
            return response()->json(
                [
                    'message' => 'logout success',
                ],
                200,
            );
    }
}
