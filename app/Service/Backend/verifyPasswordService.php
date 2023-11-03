<?php
namespace App\Service\Backend;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\VerifyPasswordRequest;

class verifyPasswordService{

    public function verifyPassword(VerifyPasswordRequest $request)
    {
        $user = auth()->user()->password;
        
        if (!Hash::check($request->password, $user)) {
            return 'password is correct';
        }
        
        return 'success';
    }
}