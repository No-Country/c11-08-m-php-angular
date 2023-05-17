<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->withPivot('years_experience', 'level', 'certificate_file');
    }
}
