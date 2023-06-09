<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;

class PaymentController extends Controller
{

    private PaymentService $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $payments = $this->service->getPayments();
            return PaymentResource::collection($payments);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(PaymentRequest $request)
    {
        try {
            $data = $this->service->createPayment($request->all());
            return new PaymentResource($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function show(Payment $payment)
    {
        try {
            $payment = $this->service->getPayment($payment);
            return new PaymentResource($payment);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        try {
            $this->service->updatePayment($request->all(), $payment);
            return new PaymentResource($payment);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function destroy(Payment $payment)
    {
        try {
            $this->service->deletePayment($payment);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getSubscriptionLink(SubscriptionRequest $request)
    {
        try {
            $subscription = $this->service->createSubscription($request->all());
            return response()->json($subscription);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
