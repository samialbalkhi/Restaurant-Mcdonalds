<?php
namespace App\Service\Frontend\VerifyCity;

use App\Models\City;
use App\Http\Requests\Backend\VerifyCityRequest;

class VerifyCityService
{
    public function VerifyCity(VerifyCityRequest $request)
    {
        $city = City::where('code', $request->code)
            ->Active()
            ->first();

        if (!$city == $request->code) {
            return 'Sorry, there is no delivery to this city !!';
        }

        return $city;
    }
}
