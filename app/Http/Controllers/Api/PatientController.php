<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class PatientController extends Controller
{

    public function show(string $patientId)
    {
        try {
            // eager-load everything we need in a single query tree
            $patient = Patient::with([
                'enrollments.program:id,name,description',
                'enrollments.doctor:id,name,email',
            ])
                ->findOrFail($patientId);

            $response = [
                'profile' => $patient->only([
                    'id',
                    'patient_number',
                    'first_name',
                    'last_name',
                    'dob',
                    'gender',
                    'phone',
                    'id_number',
                ]),
                'enrollments' => $patient->enrollments->map(function ($enr) {
                    return [
                        'program' => [
                            'id' => $enr->program->id,
                            'name' => $enr->program->name,
                            'description' => $enr->program->description,
                        ],
                        'doctor' => [
                            'id' => $enr->doctor->id,
                            'name' => $enr->doctor->name,
                            'email' => $enr->doctor->email,
                        ],
                        'enrolled_at' => $enr->enrolled_at,
                        'exited_at' => $enr->exited_at,
                        'notes' => $enr->notes,
                    ];
                }),
            ];

            return response()->json(['code' => 200, 'data' => $response], 200);
        }

        // patient UUID not found
        catch (ModelNotFoundException $e) {
            return response()->json(['code' => 404, 'error' => 'Patient not found'], 404);
        }

        // any unexpected failure
        catch (Throwable $e) {
            Log::error($e->getMessage(), ['trace' => $e->getTrace()]);
            return response()->json(['code' => 500, 'error' => 'Internal server error'], 500);
        }
    }
}