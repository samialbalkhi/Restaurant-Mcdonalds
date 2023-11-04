<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderRequest;
use App\Http\Requests\Frontend\PaymentRequest;
use App\Service\Frontend\DeliverySection\OrederService;
use App\Service\Frontend\DeliverySection\PaymentService;

class OrederController extends Controller
{

    public function __construct(private PaymentService $PaymentService)
    {
    }

    public function store(OrderRequest $request, OrederService $OrederService)
    {
        response()->json($OrederService->store($request));
        return $this->PaymentService->payment();
    }

    public function success(Request $request)
    {
        return $this->PaymentService->success($request);
    }

    public function error()
    {
        return $this->PaymentService->error();
    }
}
