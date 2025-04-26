<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Patient;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Main dashboard endpoint.
     *
     * @return View
     */
    public function index(): View
    {
        try {

            $doctorCount = $this->getDoctorCount();
            $patientCount = Patient::count();
            $programCount = Program::count();

            $programPercents = $this->getProgramStatusPercentages($programCount);

            // top 3 programmes by total enrolments (any status)
            $topPrograms = $this->getTopPrograms(3);

            $topPatients = $this->getTopPatients(4);

            return view('dashboard.index', [
                'user' => Auth::user(),
                'doctorCount' => $doctorCount,
                'patientCount' => $patientCount,
                'programCount' => $programCount,
                'programPercents' => $programPercents,
                'topPrograms' => $topPrograms,
                'topPatients' => $topPatients,
                'title' => 'Dashboard',
            ]);
        } catch (\Throwable $e) {
            Log::error('Dashboard data error: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
            abort(500, 'Dashboard data unavailable.');
        }
    }

    /**
     * Count doctors, subtracting the system-to-system API user.
     */
    private function getDoctorCount(): int
    {
        $apiEmail = config('app.api_email');

        return User::query()
            ->where('email', '!=', $apiEmail)
            ->count();
    }

    /**
     * Percentage of programmes that have ≥1 enrolment per status.
     *
     * @return array{active: float, completed: float, dropped: float}
     */
    private function getProgramStatusPercentages(int $programTotal): array
    {
        if ($programTotal === 0) {
            return ['active' => 0, 'completed' => 0, 'dropped' => 0];
        }

        $statusCounts = Enrollment::query()
            ->selectRaw('status, COUNT(DISTINCT program_id) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return [
            'active' => round(($statusCounts['active'] ?? 0) * 100 / $programTotal, 1),
            'completed' => round(($statusCounts['completed'] ?? 0) * 100 / $programTotal, 1),
            'dropped' => round(($statusCounts['dropped'] ?? 0) * 100 / $programTotal, 1),
        ];
    }

    /**
     * Top N programmes ranked by total enrolments.
     */
    private function getTopPrograms(int $limit = 3)
    {
        return Program::query()
            ->withCount([
                'enrollments as active_count' => fn($q) => $q->where('status', Enrollment::STATUS_ACTIVE),
                'enrollments as completed_count' => fn($q) => $q->where('status', Enrollment::STATUS_COMPLETED),
                'enrollments as dropped_count' => fn($q) => $q->where('status', Enrollment::STATUS_DROPPED),
            ])
            ->addSelect([
                'total_enrollments' => Enrollment::selectRaw('COUNT(*)')
                    ->whereColumn('program_id', 'programs.id'),
            ])
            ->orderByDesc('total_enrollments')
            ->limit($limit)
            ->get(['id', 'name']);
    }

    /**
     * Top N patients ranked by (active + completed) enrolments.
     */
    private function getTopPatients(int $limit = 4)
    {
        return Patient::query()
            ->withCount([
                'enrollments as active_count' => fn($q) => $q->where('status', Enrollment::STATUS_ACTIVE),
                'enrollments as completed_count' => fn($q) => $q->where('status', Enrollment::STATUS_COMPLETED),
            ])
            ->addSelect([
                'total_enrollments' => Enrollment::selectRaw('COUNT(*)')
                    ->whereColumn('patient_id', 'patients.id')
                    ->whereIn('status', [Enrollment::STATUS_ACTIVE, Enrollment::STATUS_COMPLETED]),
            ])
            ->orderByDesc('total_enrollments')
            ->limit($limit)
            ->get(['id', 'first_name', 'last_name']);
    }
}