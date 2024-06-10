<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Course;
use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('department_id', 1)->get();
        $student = Student::findOrFail(1);
        return view('dashboard.enroll.index', compact('courses', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $request->validated();
        $student_id = $request->input('student_id');
        $courses = $request->input('courses');

        foreach ($courses as $course_id) {
            Enrollment::create([
                'student_id' => $student_id,
                'course_id' => $course_id,
                'semester' => 1,
                'year' => 2010
            ]);
        }

        return redirect()
            ->back()
            ->with('status', 'Transaksi matakuliah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
