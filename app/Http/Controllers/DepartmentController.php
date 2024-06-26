<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Student;
use App\Models\User;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('students', 'courses', 'lecturers')
            ->with('headOfDepartment')
            ->get();

        return view('dashboard.department.index', [
            'title' => 'Program Studi',
            'departments' => $departments
        ]);
    }

    public function create()
    {
        return view('dashboard.department.forms', [
            'title' => 'Program Studi | Tambah Data',
            'headOfDepartment' => User::whereHas('roles', function ($q) {
                $q->where('name', 'kaprodi');
            })->get()
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->validated());
        return redirect()
            ->route('department.show', ['department' => $department])
            ->with('status', 'Data berhasil disimpan.');
    }

    public function show(Department $department)
    {
        $students_count = Student::with('department')
            ->where('department_id', $department->id)
            ->count();
        return view('dashboard.department.show', [
            'title' => 'Program Studi | ' . $department->name,
            'department' => $department,
            'students_count' => $students_count
        ]);
    }

    public function edit(Department $department)
    {
        return view('dashboard.department.forms', [
            'title' => 'Edit Program Studi | ' . $department->name,
            'department' => $department,
            'headOfDepartment' => User::whereHas('roles', function ($q) {
                $q->where('name', 'kaprodi');
            })->get()
        ]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return redirect()
            ->route('department.show', ['department' => $department])
            ->with('status', 'Data berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()
            ->route('department.index')
            ->with('status', 'Data berhasil dihapus.');
    }
}
