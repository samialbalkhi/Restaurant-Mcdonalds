<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderRequest;
use App\Service\Frontend\DeliverySection\OrederService;

class OrederController extends Controller
{
    public function store(OrderRequest $request,OrederService $OrederService )
    {
        return response()->json($OrederService->store($request));
    }
    public function success(Request $request,OrederService $OrederService )
    {
        return $OrederService->success($request);
    }
}
