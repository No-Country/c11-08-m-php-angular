<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id','student_id','subject_id','scheduled_date', 'start_time', 'end_time', 'description', 'state'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
