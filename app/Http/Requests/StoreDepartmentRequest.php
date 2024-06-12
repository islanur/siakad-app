<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|max:10|min:2|unique:departments,code',
            'name' => 'required|max:100|min:3|unique:departments,name',
            'head' => 'required|exists:users,id',
            'description' => 'nullable|string',
        ];
    }
}
