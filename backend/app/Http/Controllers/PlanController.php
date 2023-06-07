<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private PlanService $service;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $plans = $this->service->getPlans();
            return PlanResource::collection($plans);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Plan $plan)
    {
        try {
            $plan = $this->service->getPlan($plan);
            return new PlanResource($plan);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
