<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBrendRequest extends FormRequest
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
        if ($request->action == 'brend_banner')
        {
            return [
                'brend_banner' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
            ];
        }
        elseif ($request->action == 'brend_image')
        {
            return [
                'brend_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
            ];
        }
    }
}
