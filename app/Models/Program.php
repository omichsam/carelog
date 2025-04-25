<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'created_by',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'enrollments')
            ->withPivot(['enrolled_at', 'exited_at', 'notes', 'enrolled_by'])
            ->withTimestamps();
    }
}