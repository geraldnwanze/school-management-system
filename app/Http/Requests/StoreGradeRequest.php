<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return authorized();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'grade' => 'required',
            'min' => 'required|integer',
            'max' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'min' => 'minimum score',
            'max' => 'maximum score'
        ];
    }

    public function messages()
    {
        return [
            'min.required' => 'minimum score for grade is required',
            'max.required' => 'maximum score for grade is required'
        ];
    }
}
