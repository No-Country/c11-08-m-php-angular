<?php

namespace App\Services;

use App\Models\Teacher;

class SubjectService
{

    public function storeSubjectByTeacher(array $array)
    {
        try {
            $teacher = Teacher::find($array['teacher_id']);
            if(!$teacher->subjects()->where('subject_id', $array['subject_id'])->first()){
                $teacher->subjects()->attach($array['subject_id'], [
                    'years_experience' => isset($array['years_experience']) ? $array['years_experience'] : null,
                    'level' => isset($array['level']) ? $array['level'] : null,
                    'certificate_file' => isset($array['certificate_file']) ? $array['certificate_file'] : null,
                ]);
                $subject = $teacher->subjects()->where('subject_id', $array['subject_id'])->first();
                return ['subject' => $subject];
            }
            return ['message' => 'Materia ya existe'];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteSubjectByTeacher(int $teacher_id, int $subject_id)
    {
        try {
            $teacher = Teacher::find($teacher_id);
            $teacher->subjects()->detach($subject_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getSubjectsByTeacher(int $teacher_id)
    {
        try {
            $teacher = Teacher::find($teacher_id);
            return ['subjects' => $teacher->subjects];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function storeSubjectsByTeacher(array $array)
    {
        try {
            $teacher = Teacher::find($array['teacher_id']);
            $teacher->subjects()->sync($array['subjects']);
            return ['subjects' => $teacher->subjects];
        } catch (\Exception $e) {
            throw $e;
        }
    }

}