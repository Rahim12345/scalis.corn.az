<?php

namespace App\Http\Requests;

use App\Models\SubOneMenu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateSubOneMenuRequest extends FormRequest
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
        $check_sub_one_menu = SubOneMenu::where('main_menu_id', $request->main_menu_id)
            ->where('sub_one_menu_id', $request->sub_one_menu_id)
            ->first();
        return [
            'sub_one_menu_id' => $check_sub_one_menu === null ? 'required' : '',
            'name_az' => ['required','max:200',Rule::unique('sub_one_menus','name_az')->where(function ($query) use ($request) {
                return $query->where('main_menu_id','=',$request->main_menu_id)
                    ->where('sub_one_menu_id','!=',$request->sub_one_menu_id);
            })],
            'name_en' => ['required','max:200',Rule::unique('sub_one_menus','name_en')->where(function ($query) use ($request) {
                return $query->where('main_menu_id','=',$request->main_menu_id)
                    ->where('sub_one_menu_id','!=',$request->sub_one_menu_id);
            })],
            'name_ru' => ['required','max:200',Rule::unique('sub_one_menus','name_ru')->where(function ($query) use ($request) {
                return $query->where('main_menu_id','=',$request->main_menu_id)
                    ->where('sub_one_menu_id','!=',$request->sub_one_menu_id);
            })],
        ];
    }
}
