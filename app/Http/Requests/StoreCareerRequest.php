<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
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
            'getFileCv' => 'required|mimes:pdf|max:10000', // max 10000kb
            'getFileCharacteristics' => 'nullable|mimes:pdf|max:10000', // max 10000kb
        ];
    }

    public function attributes()
    {
        return [
            'getFileCv' => __('static.cv'),
            'getFileCharacteristics' => __('static.xasiyyetname'),
        ];
    }
}
