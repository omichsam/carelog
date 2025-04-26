<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $program) {
            if (empty($program->program_number)) {
                do {
                    $candidate = 'PROG-' . strtoupper(Str::random(6));
                } while (self::where('program_number', $candidate)->exists());

                $program->program_number = $candidate;
            }
        });
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'enrollments')
            ->withPivot(['enrolled_at', 'exited_at', 'notes', 'enrolled_by'])
            ->withTimestamps();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}