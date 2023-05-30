<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['day','name','start_morning','end_morning','start_afternoon','end_afternoon','start_night',
    'end_night','teacher_id'];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}