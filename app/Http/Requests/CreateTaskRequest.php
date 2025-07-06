<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {

        return [
            'title.required' => 'Title required',
            'title.integer' => 'Title should be string',
            'title.min' => 'Title is too short',
            'title.max' => 'Title is too long',

            'description.string' => 'Description should be string',
        ];
    }
}
