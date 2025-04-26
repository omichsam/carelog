<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function index(Request $request): View
    {
        try {
            // fetch every program
            $allPrograms = Program::select('id', 'name')->get();

            // eager-load patients + their enrollments → (program, doctor)
            $patientsQuery = Patient::select(
                'id',
                'patient_number',
                'first_name',
                'last_name',
                'gender',
                'dob',
                'phone',
                'id_number'
            )
                ->with([
                    // eager load nested relations with ONLY the columns needed
                    'enrollments.program:id,name',
                    'enrollments.doctor:id,name,email',
                ]);

            // filter patients by search term
            $this->applyGenderFilter($patientsQuery, $request->gender);
            $this->applyAgeGroupFilter($patientsQuery, $request->age_group);
            $this->applyEnrollmentStatusFilter($patientsQuery, $request->enrolled);
            $this->applyProgramFilter($patientsQuery, $request->program_id);

            $patients = $patientsQuery->get()
                ->map(fn(Patient $p) => $this->attachUnenrolledPrograms($p, $allPrograms));

            return view('patient.index', [
                'patients' => $patients,
                'programs' => $allPrograms,
                'title' => 'Patients',
            ]);
        } catch (\Throwable $e) {
            Log::error('Patient index error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            abort(500, 'Unable to load patients.');
        }
    }

    private function applyGenderFilter($query, ?string $gender): void
    {
        if ($gender) {
            $query->where('gender', $gender);
        }
    }

    private function applyAgeGroupFilter($query, ?string $ageGroup): void
    {
        if (!$ageGroup) {
            return;
        }

        [$min, $max] = array_pad(explode('-', $ageGroup), 2, null);
        $max = $max ?? 200;
        $today = Carbon::today();

        $query->whereBetween('dob', [
            $today->copy()->subYears($max)->startOfDay(),
            $today->copy()->subYears($min)->endOfDay(),
        ]);
    }

    private function applyEnrollmentStatusFilter($query, ?string $flag): void
    {
        match ($flag) {
            'yes' => $query->whereHas('enrollments'),
            'no' => $query->whereDoesntHave('enrollments'),
            default => null,
        };
    }

    private function applyProgramFilter($query, ?string $programId): void
    {
        if ($programId) {
            $query->whereHas(
                'enrollments',
                fn($q) => $q->where('program_id', $programId)
            );
        }
    }

    private function attachUnenrolledPrograms(Patient $patient, $allPrograms): Patient
    {
        $enrolledIds = $patient->enrollments->pluck('program_id')->unique();

        $patient->setRelation(
            'unenrolled_programs',
            $allPrograms->whereNotIn('id', $enrolledIds)->values()
        );

        return $patient;
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'dob' => 'required|date',
                'phone' => 'required|string|max:255',
                'id_number' => 'required|string|max:255',
            ]);
            Patient::create($validated);
            return redirect()->back()->with('success', 'Patient created successfully.');
        } catch (\Throwable $e) {
            Log::error('Patient store error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Unable to create patient check your inputs and try again.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'dob' => 'required|date',
                'phone' => 'required|string|max:255',
                'id_number' => 'required|string|max:255',
            ]);
            $patient = Patient::findOrFail($id);
            $patient->update($validated);
            return redirect()->back()->with('success', 'Patient updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Patient update error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Unable to update patient check your inputs and try again.');
        }
    }

    public function enroll(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'program_id' => 'required|exists:programs,id',
                'notes' => 'nullable|string|max:255',
            ]);
            Patient::enroll($validated['program_id'], Auth::id(), $validated['notes'] ?? null);
            return redirect()->back()->with('success', 'Patient enrolled successfully.');
        } catch (\Throwable $e) {
            Log::error('Patient enroll error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Unable to enroll patient check your inputs and try again.');
        }
    }
}