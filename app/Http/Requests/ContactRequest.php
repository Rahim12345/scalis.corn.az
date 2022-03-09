<?php

namespace App\Http\Requests;

use GuzzleHttp\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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
//        dd($request->token);
        $client  = new Client();
        $arrResponse = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'secret' => env('RECAPTCHAV3_SECRET'),
                'response' => $request->token,
            ],
        ]);

        $arrResponse = json_decode($arrResponse->getBody(), true);
        if($arrResponse["success"] == '1' && $arrResponse["action"] == 'contact' && $arrResponse["score"] >= 0.5)
        {
            return [
                'name' => 'required|max:30',
                'email' => 'required|email',
                'telno' => 'required|max:30',
                'message' => 'required|max:10000'
            ];
        }
        else
        {
            return response()->json(['errors' => [
                'bot' => __('static.bot')
            ]], 422);
        }

    }

    public function attributes()
    {
        return [
          'name' => __('static.ad_soyad'),
          'email' => __('login.email'),
          'telno' => __('static.nomre'),
          'message' => __('static.mesaj')
        ];
    }
}
