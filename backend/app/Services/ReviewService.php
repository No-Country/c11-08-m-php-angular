<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\TeacherRepository;
use Illuminate\Support\Facades\DB;

class ReviewService
{

    public function getReviews()
    {
        try {
            return Review::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getReview(Review $review)
    {
        try {
            return $review;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getReviewsByTeacher(int $teacher_id)
    {
        try {
            return Review::where('teacher_id', $teacher_id)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createReview(array $request)
    {
        DB::beginTransaction();
        try {
            $review = Review::where('teacher_id', $request['teacher_id'])->where('student_id', $request['student_id'])->first();
            if($review){
                return [
                    'message' => 'Sólo puede calificar una vez a un profesor'
                ];
            }
            $review = Review::create(
                [
                    'teacher_id' => $request['teacher_id'],
                    'student_id' => $request['student_id'],
                    'comment' => $request['comment'],
                    'qualification' => $request['qualification'],
                ]
            );
            //Calcular promedio del profesor luego de cada calificación
            $this->calculateTeacherAverage($review->teacher_id);
            DB::commit();
            return $review;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateReview(array $request, Review $review)
    {
        DB::beginTransaction();
        try {
            $review->update($request);
            $this->calculateTeacherAverage($review->teacher_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteReview(Review $review)
    {
        try {
            $review->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function calculateTeacherAverage(int $teacher_id)
    {
        try {
            $teacherReviews = $this->getReviewsByTeacher($teacher_id);
            $totalReviews = count($teacherReviews);
            $teacherAverage = 0;
            foreach($teacherReviews as $teacherReview){
                $teacherAverage += $teacherReview->qualification;
            }
            $totalAverage = $teacherAverage/$totalReviews;
            $teacherService = new TeacherService(new TeacherRepository);
            $teacherService->updateTeacherAverage($teacher_id, $totalAverage);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}