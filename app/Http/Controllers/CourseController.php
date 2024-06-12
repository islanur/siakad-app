<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Department;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('department')->paginate(15);

        return view('dashboard.course.index', [
            'title' => 'Matakuliah',
            'courses' => $courses
        ]);
    }

    public function create()
    {
        return view('dashboard.course.forms', [
            'title' => 'Matakuliah | Tambah Data',
            'departments' => Department::all(),
            'courseTypes' => Course::$courseTypes
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());

        return redirect()
            ->route('course.show', ['course' => $course])
            ->with('status', 'Data matakuliah berhasil disimpan.');
    }

    public function show(Course $course)
    {
        return view('dashboard.course.show', [
            'title' => 'Matakuliah | ' . $course->name,
            'course' => $course,
            'courseTypes' => Course::$courseTypes
        ]);
    }

    public function edit(Course $course)
    {
        return view('dashboard.course.forms', [
            'title' => 'Matakuliah | Edit Data',
            'course' => $course,
            'departments' => Department::all(),
            'courseTypes' => Course::$courseTypes
        ]);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()
            ->route('course.show', ['course' => $course])
            ->with('status', 'Data berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('course.index')
            ->with('status', 'Data berhasil dihapus.');
    }
}
