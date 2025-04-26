<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|in:active,completed,dropped',
            'notes' => 'nullable|string|max:255',
        ]);

        // Find the enrollment by ID
        $enrollment = Enrollment::findOrFail($id);

        // Update the enrollment with the validated data
        $enrollment->update($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Enrollment updated successfully.');
    }

    public function enroll(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'program_id' => 'required|exists:programs,id',
                'notes' => 'nullable|string|max:255',
            ]);
            $patient = Patient::findOrFail($id);
            $patient->enroll($validated['program_id'], Auth::id(), $validated['notes'] ?? null);
            return redirect()->back()->with('success', 'Patient enrolled successfully.');
        } catch (\Throwable $e) {
            Log::error('Patient enroll error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Unable to enroll patient. ' . $e->getMessage());
        }
    }
}