<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'teacher_id','plan_id','fee','total_paid','start_date','end_date'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
