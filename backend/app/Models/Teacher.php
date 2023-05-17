<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'about_me',
        'about_class',
        'job_title',
        'years_experience',
        'certificate_file',
        'price_hour',
        'sample_class',
        'photo'];
}
