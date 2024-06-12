<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|max:20|min:2|unique:courses,code,' . $this->course->id,
            'name' => 'required|max:100|min:3|unique:courses,name,' . $this->course->id,
            'semester' => 'required|integer|min:1|max:8',
            'credits' => 'required|integer|min:1|max:6',
            'is_must' => 'required|boolean',
            'type' => 'required|in:Teori,Praktikum,Praktek Lapangan',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}
