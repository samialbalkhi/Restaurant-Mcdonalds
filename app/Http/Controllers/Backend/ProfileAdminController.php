<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Service\Backend\ProfileAdminService;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Backend\VerifyPasswordRequest;

class ProfileAdminController extends Controller
{
    private $ProfileAdminService;
    public function __construct(ProfileAdminService $ProfileAdminService)
    {
        $this->ProfileAdminService = $ProfileAdminService;
    }

    public function edit()
    {
        return response()->json(
            $this->ProfileAdminService->edit());
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $this->ProfileAdminService->update($request, $user);
        return response()->json(['message' => 'Updateed  successfully']);
    }
}
