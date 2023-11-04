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
    public function edit()
    {
        return response()->json($this->ProfileCustomerService->edit());
    }
    public function update(UpdateProfileRequest $request, User $user)
    {
        $this->ProfileCustomerService->update($request, $user);
        return response()->json(['message' => 'Updateed  successfully']);

    }
}
