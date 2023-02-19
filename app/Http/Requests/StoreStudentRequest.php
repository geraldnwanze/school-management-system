<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'class_room_id' => 'required',
            'year_of_entry' => 'required',
            'surname' => 'required',
            'firstname' => 'required',
            'othername' => 'required',
            'reg_no' => 'required',
            'gender' => 'required',
            'dob' => '',
            'nationality' => 'required',
            'state_id' => 'required',
            'lga_id' => 'required'
        ];
    }
}
