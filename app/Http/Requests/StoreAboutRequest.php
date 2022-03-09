<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreAboutRequest extends FormRequest
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
        if ($request->action == 'upload_image')
        {
            return [
                'image' => 'required|image|mimes:jpeg,png,jpg,|max:2048', // max 2MB
            ];
        }
        else
        {
            return [
                'about_us_az' => 'required|max:65535',  // max length 65535
                'about_us_en' => 'required|max:65535',  // max length 65535
                'about_us_ru' => 'required|max:65535',  // max length 65535
            ];
        }
    }

    public function attributes()
    {
        return [
            'about_us_az' => __('static.about_us_az'),
            'about_us_en' => __('static.about_us_en'),
            'about_us_ru' => __('static.about_us_ru')
        ];
    }
}
