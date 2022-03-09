<?php

namespace App\Http\Controllers;

use App\Events\ContactMessage;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreCareerRequest;
use App\Mail\ContactEmail;
use App\Models\About;
use App\Models\Contact;
use App\Models\Cv;
use App\Models\Subscriber;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.pages.home');
    }

    public function subscribe(Request $request)
    {
        $client  = new Client();
        $arrResponse = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'secret' => env('RECAPTCHAV3_SECRET'),
                'response' => $request->token,
            ],
        ]);

        $arrResponse = json_decode($arrResponse->getBody(), true);

        if($arrResponse["success"] == '1' && $arrResponse["action"] == 'subscribe' && $arrResponse["score"] >= 0.5)
        {
            $this->validate($request, [
                'email' => 'required|email|unique:subscribers,email',
            ],[],[
                'email' => __('login.email'),
            ]);

            Subscriber::create([
                'email' => $request->email,
            ]);

            return response()->json([
                'message' => __('static.subscribe_success'),
            ],Response::HTTP_OK);
        }
        else
        {
            return response()->json([
                'errors'=>[
                    'bot'=>__('static.bot')
                ]
            ], 422);
        }
    }

    public function about()
    {
        return view('front.pages.about',[
            'about' => About::first()
        ]);
    }

    public function brends()
    {
        return view('front.pages.brends',[
            'brends' => \App\Models\Brend::all()
        ]);
    }

    public function career()
    {
        return view('front.pages.career');
    }

    public function careerPost(StoreCareerRequest $request)
    {
        $cv                 = $this->fileUploader($request, 'getFileCv');
        $characteristics    = $this->fileUploader($request, 'getFileCharacteristics');

        Cv::create([
            'cv'=>$cv,
            'characteristics'=>$characteristics,
            'ip'=>$request->ip()
        ]);


        $message = __('static.career_success');
        if(!$request->hasFile('getFileCharacteristics'))
        {
            if (app()->getLocale() == 'az')
            {
                $message = 'CV uğurla göndərildi';
            }
            elseif (app()->getLocale() == 'en')
            {
                $message = 'CV was sent successfully';
            }
            elseif (app()->getLocale() == 'ru')
            {
                $message = 'Резюме успешно отправлено';
            }
        }

        return \response()->json([
            'message' => $message,
        ],Response::HTTP_OK);
    }

    public function fileUploader($request, $field)
    {
        if ($request->file($field))
        {
            $file               = $request->file($field);
            $filename           = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
            $newname           = str_slug($filename . time()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('back/cvs'), $newname);
            return $newname;
        }
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function contactPost(ContactRequest $request)
    {
        $contact = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'telno'=>$request->telno,
            'message'=>$request->message,
            'ip'=>$request->ip()
        ]);

        event(new ContactMessage($contact));
        return \response()->json([
            'message' => __('static.contact_success'),
        ],Response::HTTP_OK);
    }

    public function productsMain_menu($main_menu)
    {
        return view('front.pages.products',[
            'products' => \App\Models\Product::where('main_menu',$main_menu)->get()
        ]);
    }
}
