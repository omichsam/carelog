<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'phone',
        'id_number',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $patient) {
            if (empty($patient->patient_number)) {
                do {
                    $candidate = 'P' . strtoupper(Str::random(6));
                } while (self::where('patient_number', $candidate)->exists());

                $patient->patient_number = $candidate;
            }
        });
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'enrollments')
            ->withPivot(['enrolled_at', 'exited_at', 'notes', 'enrolled_by'])
            ->withTimestamps();
    }

    public function enroll(Program $program, User $doctor, ?string $notes = null): void
    {
        $this->programs()->attach($program->id, [
            'enrolled_by' => $doctor->id,
            'notes' => $notes,
        ]);
    }
}