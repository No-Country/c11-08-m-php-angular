<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'type','price','free_months'
    ];

    public function payments(): HasMany{
        return $this->hasMany(Payment::class);
    }
}
