<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CareerRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->action == 'career_banner')
        {
            return [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // 2MB
            ];
        }

        return [
          'career_az' => 'required|max:65535', // 65,535
          'career_en' => 'required|max:65535', // 65,535
          'career_ru' => 'required|max:65535', // 65,535
        ];
    }

    public function attributes()
    {
        return [
          'career_az' => __('static.career_az'),
          'career_en' => __('static.career_en'),
          'career_ru' => __('static.career_ru')
        ];
    }
}
