<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
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
            'unvan'=>'required|max:200',
            'tel'=>'required|max:50',
            'email'=>'required|email',
            'facebook'=>'required|url|max:150',
            'instagram'=>'required|url|max:150',
            'youtube'=>'required|url|max:150'
        ];
    }

    public function attributes()
    {
        return [
            'unvan'=>__('static.unvan'),
            'tel'=>'Telefon',
            'email'=>'E-mail',
            'facebook'=>'Facebook',
            'instagram'=>'İnstagram',
            'youtube'=>'Youtube'
        ];
    }
}
