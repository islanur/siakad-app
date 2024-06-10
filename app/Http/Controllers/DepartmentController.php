<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('dashboard.department.index', [
            'title' => 'Program Studi',
            'departments' => Department::orderBy('name')->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreDepartmentRequest $request)
    {
        //
    }

    public function show(Department $department)
    {
        //
    }

    public function edit(Department $department)
    {
        //
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    public function destroy(Department $department)
    {
        //
    }
}
