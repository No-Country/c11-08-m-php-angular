<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['day','name','start_morning','end_morning','start_afternoon','end_afternoon','start_night',
    'end_night'];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
