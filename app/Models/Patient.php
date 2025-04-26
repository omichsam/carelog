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

    protected $casts = [
        'dob' => 'date'
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

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enroll($programId, $doctorId, ?string $notes = null): void
    {
        $this->enrollments()->create([
            'program_id' => $programId,
            'enrolled_by' => $doctorId,
            'notes' => $notes,
        ]);

    }
}