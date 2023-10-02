<?php

namespace App\Http\Controllers\Backend;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function edit($id)
    {
        $Job_offer = Detail::where('job_offer_id', $id)->get();

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response($respones, 201);
    }

    public function update(Request $request, $id)
    {
        $details = Detail::find($id);
        $Job_offer = $details->update([
            'details' => $request->details,
            'job_offer_id' => $id,
        ]);

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response($respones, 201);
    }

    public function destroy($id)
    {
        Detail::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
