<?php

namespace App\Services;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherService
{

    private TeacherRepository $repository;

    public function __construct(TeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTeachers()
    {
        try {
            return Teacher::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getTeacher(Teacher $teacher)
    {
        try {
            return $teacher;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createTeacherByRegister(array $request)
    {
        try {
            $teacher = Teacher::create(
                [
                    'user_id' => $request['user_id']
                ]
            );
            return $teacher;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createTeacher(array $request)
    {
        try {
            $teacher = Teacher::create(
                [
                    'user_id' => $request['user_id'],
                    'title' => $request['title'],
                    'about_me' => $request['about_me'],
                    'about_class' => $request['about_class'],
                    'job_title' => $request['job_title'],
                    'years_experience' => $request['years_experience'],
                    'price_one_class' => $request['price_one_class'],
                    'price_two_classes' => $request['price_two_classes'],
                    'price_four_classes' => $request['price_four_classes'],
                    'certificate_file' => $request['certificate_file'],
                    'average' => $request['average'],
                    'sample_class' => $request['sample_class'],
                ]
            );
            return $teacher;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateTeacher(array $request, Teacher $teacher)
    {
        try {
            $teacher->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteTeacher(Teacher $teacher)
    {
        try {
            $teacher->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function searchTeacherBy(Request $request)
    {
        try {
            $filters = [];
            if($request->subject){
                $filters['s.name'] = $request->subject;
            }
            if($request->city){
                $filters['c.id'] = $request->city;
            }
            if($request->province){
                $filters['p.id'] = $request->province;
            }

            $search_array = array_map('strtolower', $request->availability);
            $availability = [];
            if(in_array('mañana', $search_array)){
                $availability[] = ['start_morning', 'end_morning'];
            }
            if(in_array('tarde', $search_array)){
                $availability[] = ['start_afternoon', 'end_afternoon'];
            }
            if(in_array('noche', $search_array)){
                $availability[] = ['start_night', 'end_night'];
            }

            switch ($request->order) {
                case 'Mayor calificación':
                    $order = ['average', 'desc'];
                    break;
                case 'Menor calificación':
                    $order = ['average', 'asc'];
                    break;
                case 'Mayor precio':
                    $order = ['price_one_class', 'desc'];
                    break;
                case 'Menor precio':
                    $order = ['price_one_class', 'asc'];
                    break;
                case 'Más recientes':
                    $order = ['updated_at', 'desc'];
                    break;
                    
                default:
                    $order = ['id', 'desc'];
                    break;
            }

            if(count($filters) != 0 || count($request->availability) != 0 || count($request->price) != 0){
                $teachers = $this->repository->searchTeacherBy($request, $filters, $availability, $order);
            }
            else{
                $teachers = Teacher::all();
            }
            
            return $teachers;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateTeacherAverage(int $teacher_id, float $totalAverage)
    {
        try {
            $teacher = Teacher::find($teacher_id);
            $teacher->update(['average' => $totalAverage]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getTeacherByUser(int $user_id)
    {
        try {
            return Teacher::where('user_id', $user_id)->firstOrFail();
        } catch (\Exception $e) {
            throw $e;
        }
    }

}