<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Exception;

class SubjectService
{

    public function storeSubjectByUser(array $array)
    {
        try {
            $result = $this->getByUser($array['user_id']);
            if(!$result['role']->subjects()->where('subject_id', $array['subject_id'])->first()){
                if($result['user']->role == 'Profesor'){
                    $result['role']->subjects()->attach($array['subject_id'], [
                        'years_experience' => isset($array['years_experience']) ? $array['years_experience'] : null,
                        'level' => isset($array['level']) ? $array['level'] : null,
                        'certificate_file' => isset($array['certificate_file']) ? $array['certificate_file'] : null,
                    ]);
                }
                if($result['user']->role == 'Estudiante'){
                    $result['role']->subjects()->attach($array['subject_id']);
                }
                $subject = $result['role']->subjects()->where('subject_id', $array['subject_id'])->first();
                return ['subject' => $subject];
            }
            return ['message' => 'Materia ya existe'];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteSubjectByUser(int $user_id, int $subject_id)
    {
        try {
            $role = $this->getByUser($user_id)['role'];
            $role->subjects()->detach($subject_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getSubjectsByUser(int $user_id)
    {
        try {
            $role = $this->getByUser($user_id)['role'];
            return ['subjects' => $role->subjects];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function storeSubjectsByUser(array $array)
    {
        try {
            $role = $this->getByUser($array['user_id'])['role'];
            $role->subjects()->sync($array['subjects']);
            return ['subjects' => $role->subjects];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function getByUser(int $user_id)
    {
        try {
            $role = null;
            $user = User::find($user_id);
            if (!$user) {
                throw new Exception('No se encontró usuario');
            }
            if ($user->role == 'Profesor') {
                $role = Teacher::where('user_id', $user->id)->firstOrFail();
            }
            if ($user->role == 'Estudiante') {
                $role = Student::where('user_id', $user->id)->firstOrFail();
            }
            if ($user->role == 'Admin') {
                throw new Exception('Es un usuario Admin');
            }
            return ['user' => $user, 'role' => $role];
        } catch (\Exception $e) {
            throw $e;
        }
    }

}