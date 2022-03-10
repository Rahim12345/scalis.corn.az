<?php

namespace App\Http\Requests;

use App\Models\SubTwoMenu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
        if ($request->action == '1')
        {
            return [
                'sub_menu_2'=>['required',Rule::in(SubTwoMenu::pluck('sub_two_menu_id')->toArray())],
                'capri'=>'required|max:191',
                'agt'=>'required|max:191',
                'brend'=>'required|max:191',
                'seth'=>'required|max:191',
                'reng'=>'required|max:191',
                'en'=>'required|max:191',
                'boy'=>'required|max:191',
                'qalinliq'=>'required|max:191',
                'palet'=>'required|max:191',
                'center_image'=>'required|max:191',
                'right_side_image_1'=>'required|max:191',
                'right_side_image_2'=>'required|max:191',
                'right_side_video'=>'required|max:191',
                'action'=>['required',Rule::in([0,1])]
            ];
        }
        elseif ($request->action == 'upload_image')
        {
            return [
                'center_image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'right_side_image_1'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'right_side_image_2'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'action'=>['required',Rule::in(['upload_image','upload_video'])]
            ];
        }
        elseif ($request->action == 'upload_video')
        {
            return [
                'right_side_video'=>'required|mimes:mp4,mov,ogg,qt|max:60000',
                'action'=>['required',Rule::in(['upload_image','upload_video'])]
            ];
        }
        elseif ($request->action == 'upload_sertifikat_image')
        {
            return [
                'name'=>'required|max:191',
                'year'=>'required',
                'sertifikat'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }
        elseif ($request->action == 'sertifikat_sil')
        {
            return [
                'silinen_sekil'=>'required',
                'action'=>'required'
            ];
        }
    }

    public function attributes()
    {
        return [
          'sub_menu_2'=>'Sub Menu 2',
            'name'=>__('static.name_'.app()->getLocale()),
            'sertifikat'=>'Sertifikat şəkili'
        ];
    }
}
