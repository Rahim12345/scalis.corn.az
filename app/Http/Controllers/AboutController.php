<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image       = '';
        $about_us_az = '';
        $about_us_en = '';
        $about_us_ru = '';
        $about = About::first();
        if ($about)
        {
            $image       = asset('files/about/' . $about->banner_image);
            $about_us_az = $about->about_us_az;
            $about_us_en = $about->about_us_en;
            $about_us_ru = $about->about_us_ru;
        }
        return view('back.pages.about.create', compact('image','about_us_az', 'about_us_en', 'about_us_ru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        $about = About::first();
        if ($request->action == 'upload_image')
        {
            if ($about === null)
            {
                $new_name = $this->imageUploader($request,'files/about/',1780,null);
                About::create([
                    'banner_image'=>$new_name,
                ]);

                return response()->json(['message'=> __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
            }
            else
            {
                if (File::exists(public_path('files/about/'.$about->banner_image)))
                {
                    File::delete(public_path('files/about/'.$about->banner_image));
                }

                $new_name = $this->imageUploader($request,'files/about/',1780,null);

                $about->update([
                    'banner_image'=>$new_name,
                ]);

                return response()->json(['message'=> __('static.data_ugurla_yenilendi')], Response::HTTP_CREATED);
            }
        }
        else
        {
            if ($about === null)
            {
                About::create([
                    'about_us_az'=>$request->about_us_az,
                    'about_us_en'=>$request->about_us_en,
                    'about_us_ru'=>$request->about_us_ru,
                ]);

                return response()->json(['message'=> __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
            }
            else
            {
                $about->update([
                    'about_us_az'=>$request->about_us_az,
                    'about_us_en'=>$request->about_us_en,
                    'about_us_ru'=>$request->about_us_ru,
                ]);

                return response()->json(['message'=> __('static.data_ugurla_yenilendi')], Response::HTTP_CREATED);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    public function imageUploader($request, $directory = '/',$width = null, $height = null)
    {
        $file           = $request->image;
        $filename       = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
        $extention      = $file->getClientOriginalExtension();
        $new_name       = $filename . '-' . time() . '.' . $extention;

        $image_resize   = Image::make($file->getRealPath());
        $image_resize   = $image_resize->orientate();
        $image_resize->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image_resize->save(public_path($directory.$new_name));

        return $new_name;
    }
}
