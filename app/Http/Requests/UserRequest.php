<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required',
            'mobile_number' => 'required',
            'address' => 'nullable' ,
            'long' => 'nullable',
            'lat' => 'nullable',
            'work_time_start' => 'nullable',
            'work_time_end' => 'nullable',
        ]; 
    }
}
