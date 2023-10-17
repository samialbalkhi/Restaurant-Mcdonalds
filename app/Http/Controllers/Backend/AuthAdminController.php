<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\AuthAdminService;
use App\Http\Requests\Backend\loginRequest;

class AuthAdminController extends Controller
{
    public function login(loginRequest $request,AuthAdminService $AuthAdminService)
    {
        return response()->json(
            $AuthAdminService->login($request));
    }
}
