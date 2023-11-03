<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\verifyPasswordService;
use App\Http\Requests\Backend\VerifyPasswordRequest;

class VerifyPasswordController extends Controller
{
    public function verifyPassword(VerifyPasswordRequest $request,verifyPasswordService $verifyPasswordService)
    {
        return response()->json(
            $verifyPasswordService->verifyPassword($request));
    }
}
