<?php

namespace App\Services;

use App\Models\Plan;

class PlanService
{

    public function getPlans()
    {
        try {
            return Plan::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getPlan(Plan $plan)
    {
        try {
            return $plan;
        } catch (\Exception $e) {
            throw $e;
        }
    }

}