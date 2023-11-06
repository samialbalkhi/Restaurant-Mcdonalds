<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Backend\VerifyPasswordRequest;
use Illuminate\Auth\Events\Validated;

class ProfileAdminService
{
    public function edit()
    {
        return auth()->user();
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $user->update($request->Validated());
    }
}
