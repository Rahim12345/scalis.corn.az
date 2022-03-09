<?php

namespace App\Http\Requests;

use App\Models\SubTwoMenu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
    }
}
