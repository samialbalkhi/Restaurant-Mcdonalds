<?php
namespace App\Service\Backend;

use App\Http\Requests\Backend\DetailRequest;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailsService
{
    public function edit(Detail $details)
    {
        return 
        Detail::where('joboffer_id', $details->id)->get();
    }

    public function update(DetailRequest $request, Detail $details)
    {
        
        $details->update([
            'details' => $request->details,
            'joboffer_id' => $details->joboffer_id,
        ]);


    }

    public function destroy(Detail $details)
    {
        $details->delete();

    }
}
