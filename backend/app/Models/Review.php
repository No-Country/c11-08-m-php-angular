<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['comment','qualification', 'teacher_id', 'student_id'];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    
}
