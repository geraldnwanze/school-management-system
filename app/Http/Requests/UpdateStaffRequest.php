<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'surname' => 'required',
            'firstname' => 'required',
            'othername' => '',
            // 'email' => 'required|email|unique:staff,email',
            'gender' => 'required',
            'phone_number' => 'required',
            'nationality' => 'required',
            'state_id' => 'required',
            'lga_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }

    public function messages()
    {
        return [
            // 'email.unique' => 'user with email address already exists'
        ];
    }
}
