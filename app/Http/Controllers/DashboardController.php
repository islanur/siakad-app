<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = User::role('mahasiswa')->count();
        $lecturersCount = User::role('dosen')->count();
        $coursesCount = Course::count();
        $enrollmentsCount = Enrollment::count();

        $recentActivities = Enrollment::with('student.user', 'course')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $studentsChartLabels = [];
        $studentsChartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $studentsChartLabels[] = Carbon::create()->month($i)->format('F');
            $studentsChartData[] = User::role('mahasiswa')
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', $i)
                ->count();
        }

        $enrollmentsChartLabels = [];
        $enrollmentsChartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $enrollmentsChartLabels[] = Carbon::create()->month($i)->format('F');
            $enrollmentsChartData[] = Enrollment::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $i)
                ->count();
        }

        return view('dashboard', [
            'studentsCount' => $studentsCount,
            'lecturersCount' => $lecturersCount,
            'coursesCount' => $coursesCount,
            'enrollmentsCount' => $enrollmentsCount,
            'recentActivities' => $recentActivities,
            'studentsChartLabels' => $studentsChartLabels,
            'studentsChartData' => $studentsChartData,
            'enrollmentsChartLabels' => $enrollmentsChartLabels,
            'enrollmentsChartData' => $enrollmentsChartData,
        ]);
    }
}
