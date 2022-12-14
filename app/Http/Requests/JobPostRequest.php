<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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

            'title' => 'required | min:3 | max:40 | alpha',
            'roles' => 'required | min:3 | max:40 | alpha ',
            'description' => 'required | min:3 | max:1000 | string',
            'position' => 'required | min:3 | max:40 | alpha',
            'last_date' => 'required | date ',
            'address' => 'required | min:3 | max:40 | string',
            'vacancy' => 'required | integer | max:1000',
            'salary' => 'required | string | max:10',
            'responsibility' => 'required | min:3 | max:1000 | string',
            'qualification' => 'required | min:3 | max:1000 | string',

        ];
    }
}
