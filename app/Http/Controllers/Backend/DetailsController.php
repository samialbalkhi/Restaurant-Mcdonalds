<?php

namespace App\Http\Controllers\Backend;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\DetailsService;
use App\Http\Requests\Backend\DetailRequest;

class DetailsController extends Controller
{
    private $DetailsService ;
    public function __construct(DetailsService $DetailsService)
    {
        $this->DetailsService = $DetailsService;
    }

    public function edit(Detail $details)
    {
        return response()->json(
            $this->DetailsService->edit($details));
    }

    public function update(DetailRequest $request, Detail $details)
    {
        $this->DetailsService->update($request, $details);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Detail $details)
    {
        $this->DetailsService->destroy($details);

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
