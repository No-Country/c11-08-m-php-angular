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
            return Teacher::paginate();
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
                $filters['c.name'] = $request->city;
            }
            if($request->province){
                $filters['p.name'] = $request->province;
            }

            $availability = [];
            switch ($request->availability) {
                
                case 'mañana':
                    $availability = ['start_morning', 'end_morning'];
                    break;
                case 'tarde':
                    $availability = ['start_afternoon', 'end_afternoon'];
                    break;
                case 'noche':
                    $availability = ['start_night', 'end_night'];
                    break;
                default:
                    
                    break;
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
                    $order = ['created_at', 'desc'];
                    break;
                    
                default:
                    $order = ['id', 'desc'];
                    break;
            }

            if(count($filters) != 0 || $request->availability || count($request->price) != 0){
                $teachers = $this->repository->searchTeacherBy($request, $filters, $availability, $order);
            }
            else{
                $teachers = Teacher::paginate();
            }
            
            return $teachers;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}