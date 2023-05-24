<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function students_subjects(){
        return $this->hasMany(Student_subject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'students_subjects');
    }

    public function classes(){
        return $this->hasMany(Clase::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
