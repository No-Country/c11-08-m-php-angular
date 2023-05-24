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

    public function getAll()
    {
        try {
            return Teacher::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getTeacher(int $id)
    {
        try {
            return Teacher::find($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteTeacher(Teacher $product)
    {
        try {
            $product->delete();
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

            if(count($filters) != 0 || !$request->availability || count($request->price) != 0){
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
}