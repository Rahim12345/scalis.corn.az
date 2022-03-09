<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Http\Requests\HomeRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
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
        $upload_left_side_image = '';
        $upload_left_side_image_subscribe = '';
        $title_az               = '';
        $title_en               = '';
        $title_ru               = '';
        $about_us_az            = '';
        $about_us_en            = '';
        $about_us_ru            = '';
        $keys = [
          'upload_left_side_image',
          'upload_left_side_image_subscribe',
          'title_az',
          'title_en',
          'title_ru',
          'about_us_az',
          'about_us_en',
          'about_us_ru',
        ];

        foreach ($keys as $key) {
            if (Options::getOption($key))
            {
                $$key = Options::getOption($key);
            }
        }
        return view('back.pages.home.create', compact('upload_left_side_image','upload_left_side_image_subscribe','title_az', 'title_en', 'title_ru', 'about_us_az', 'about_us_en', 'about_us_ru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeRequest $request)
    {
        if ($request->action == 'upload_video_banner')
        {
            $video_banner = Options::getOption('video_banner');
            if ($video_banner == '')
            {
                $new_name = $this->videoUploader($request,public_path('files/video-banner'));
            }
            else
            {
                if (File::exists('files/video-banner/' . $video_banner))
                {
                    File::delete('files/video-banner/' . $video_banner);
                }

                $new_name = $this->videoUploader($request,public_path('files/video-banner'));
            }

            Option::updateOrCreate(
                ['key'   => 'video_banner'],
                [
                    'value' => $new_name
                ]
            );

            return response()->json(['message' => __('static.data_ugurla_elave_etildi'),'src'=>asset('files/video-banner/'.Option::where('key','video_banner')->first()->value)], Response::HTTP_CREATED);
        }
        elseif ($request->action == 'upload_left_side_image')
        {
            $upload_left_side_image = Options::getOption('upload_left_side_image');
            if ($upload_left_side_image === null)
            {
                $new_name = $this->imageUploader($request,'files/about/',1780,null,'upload_left_side_image');
            }
            else
            {
                if (File::exists(public_path('files/about/'.$upload_left_side_image)))
                {
                    File::delete(public_path('files/about/'.$upload_left_side_image));
                }

                $new_name = $this->imageUploader($request,'files/about/',1780,null,'upload_left_side_image');
            }

            Option::updateOrCreate(
                ['key'   => 'upload_left_side_image'],
                [
                    'value' => $new_name
                ]
            );

            return response()->json(['message'=> __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
        }
        elseif ($request->action == 'upload_left_side_image_subscribe')
        {
            $upload_left_side_image_subscribe = Options::getOption('upload_left_side_image_subscribe');
            if ($upload_left_side_image_subscribe === null)
            {
                $new_name = $this->imageUploader($request,'files/about/',1780,null,'upload_left_side_image_subscribe');
            }
            else
            {
                if (File::exists(public_path('files/about/'.$upload_left_side_image_subscribe)))
                {
                    File::delete(public_path('files/about/'.$upload_left_side_image_subscribe));
                }

                $new_name = $this->imageUploader($request,'files/about/',1780,null,'upload_left_side_image_subscribe');
            }

            Option::updateOrCreate(
                ['key'   => 'upload_left_side_image_subscribe'],
                [
                    'value' => $new_name
                ]
            );

            return response()->json(['message'=> __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
        }
        elseif ($request->action == 'home_about_text')
        {
            Option::updateOrCreate(
                ['key'   => 'title_az'],
                [
                    'value' => $request->title_az
                ]
            );

            Option::updateOrCreate(
                ['key'   => 'title_en'],
                [
                    'value' => $request->title_en
                ]
            );

            Option::updateOrCreate(
                ['key'   => 'title_ru'],
                [
                    'value' => $request->title_en
                ]
            );

            Option::updateOrCreate(
                ['key'   => 'about_us_az'],
                [
                    'value' => $request->about_us_az
                ]
            );

            Option::updateOrCreate(
                ['key'   => 'about_us_en'],
                [
                    'value' => $request->about_us_en
                ]
            );

            Option::updateOrCreate(
                ['key'   => 'about_us_ru'],
                [
                    'value' => $request->about_us_ru
                ]
            );

            return response()->json(['message'=> __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
        }

    }

    public function videoUploader($request, $directory = '/')
    {
        $file           = $request->video_banner;
        $filename       = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
        $extention      = $file->getClientOriginalExtension();
        $new_name       = $filename . '-' . time() . '.' . $extention;
        $file->move($directory, $new_name);

        return $new_name;
    }

    public function imageUploader($request, $directory = '/',$width = null, $height = null,$name)
    {
        $file           = $request->{$name};
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
