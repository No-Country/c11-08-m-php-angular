<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Services\ReviewService;

class ReviewController extends Controller
{

    private ReviewService $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        try {
            $reviews = $this->service->getReviews();
            return ReviewResource::collection($reviews);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(ReviewRequest $request)
    {
        try {
            $review = $this->service->createReview($request->all());
            if(is_array($review)){
                return $review;
            }
            return new ReviewResource($review);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function show(Review $review)
    {
        try {
            $review = $this->service->getReview($review);
            return new ReviewResource($review);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(ReviewRequest $request, Review $review)
    {
        try {
            $this->service->updateReview($request->all(), $review);
            return new ReviewResource($review);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function destroy(Review $review)
    {
        try {
            $this->service->deleteReview($review);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getReviewsByTeacher(int $teacher_id)
    {
        try {
            $reviews = $this->service->getReviewsByTeacher($teacher_id);
            return ReviewResource::collection($reviews);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

}
