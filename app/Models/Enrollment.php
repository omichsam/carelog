<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_DROPPED = 'dropped';

    protected $fillable = [
        'patient_id',
        'program_id',
        'enrolled_by',
        'enrolled_at',
        'exited_at',
        'notes',
        'status',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'exited_at' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'enrolled_by');
    }
}