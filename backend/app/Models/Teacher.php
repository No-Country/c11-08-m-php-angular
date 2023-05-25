<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'about_me',
        'about_class',
        'job_title',
        'years_experience',
        'price_one_class',
        'price_two_classes',
        'price_four_classes',
        'certificate_file',
        'average',
        'sample_class'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects')->withPivot('years_experience', 'level', 'certificate_file');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Clase::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'classes')->withPivot('subject_id', 'scheduled_date', 'start_time', 'end_time', 'description', 'state');
    }
}
