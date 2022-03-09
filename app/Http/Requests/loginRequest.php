<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email'=>'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'email' => __('login.email'),
            'password' => __('login.password'),
        ];
    }
}
