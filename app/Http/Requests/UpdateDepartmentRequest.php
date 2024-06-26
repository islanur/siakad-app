<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'code' => 'required|max:10|min:2|unique:departments,code,' . $this->department->id,
            'name' => 'required|max:100|min:3|unique:departments,name,' . $this->department->id,
            'head' => 'required|exists:users,id',
            'description' => 'nullable|string',
        ];
    }
}
