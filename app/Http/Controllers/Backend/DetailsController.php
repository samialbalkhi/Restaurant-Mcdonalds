<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function edit(Detail $details)
    {
        return response()->json(Detail::where('job_offer_id', $details->id)->get());
    }

    public function update(Request $request, Detail $details)
    {
        $details->update([
            'details' => $request->details,
            'job_offer_id' => $details->job_offer_id,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Detail $details)
    {
        $details->delete();

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
