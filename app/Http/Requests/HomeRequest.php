<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HomeRequest extends FormRequest
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
        if ($request->action == 'upload_video_banner')
        {
            return [
                'video_banner' => 'required|mimes:mp4,mov,ogg,qt|max:60000', // max 60000kb
            ];
        }
        elseif ($request->action == 'upload_left_side_image')
        {
            return [
                'upload_left_side_image' => 'required|mimes:jpeg,jpg,png|max:2048', // max 2048kb
            ];
        }
        elseif ($request->action == 'upload_left_side_image_subscribe')
        {
            return [
                'upload_left_side_image_subscribe' => 'required|mimes:jpeg,jpg,png|max:2048', // max 2048kb
            ];
        }
        elseif ($request->action == 'home_about_text')
        {
            return [
                'title_az' => 'required|max:255', // max 255
                'title_en' => 'required|max:255', // max 255
                'title_ru' => 'required|max:255', // max 255
                'about_us_az' => 'required|max:65535', // max 65535
                'about_us_en' => 'required|max:65535', // max 65535
                'about_us_ru' => 'required|max:65535', // max 65535
            ];
        }
    }

    public function attributes()
    {
        return [
          'title_az' => __('static.title_az'),
          'title_en' => __('static.title_en'),
          'title_ru' => __('static.title_ru'),
          'about_us_az' => __('static.about_us_az'),
          'about_us_en' => __('static.about_us_en'),
          'about_us_ru' => __('static.about_us_ru')
        ];
    }
}
