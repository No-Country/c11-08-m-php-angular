<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'subject_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
