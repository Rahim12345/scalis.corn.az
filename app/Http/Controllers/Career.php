<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Http\Requests\CareerRequest;
use App\Models\Cv;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class Career extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.career.index', [
            'cvs'=>Cv::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career_banner  = Options::getOption('career_banner');
        $career_az      = Options::getOption('career_az');
        $career_en      = Options::getOption('career_en');
        $career_ru      = Options::getOption('career_ru');

        return view('back.pages.career.create', compact('career_banner','career_az', 'career_en', 'career_ru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerRequest $request)
    {
        $career_banner = Options::getOption('career_banner');
        if ($request->action == 'career_banner')
        {
            if ($career_banner == null)
            {
                $new_name = $this->imageUploader($request,'files/career/',1780,null,'image');
            }
            else
            {
                if (File::exists('files/career/'.$career_banner))
                {
                    File::delete('files/career/'.$career_banner);
                }

                $new_name = $this->imageUploader($request,'files/career/',1780,null,'image');
            }

            Option::updateOrCreate(
                ['key'   => 'career_banner'],
                [
                    'value' => $new_name // in same raw with column_n_value
                ]
            );

            return response()->json(['message' => __('static.data_ugurla_elave_etildi')]);
        }

        Option::updateOrCreate(
            ['key'   => 'career_az'],
            [
                'value' => $request->career_az
            ]
        );

        Option::updateOrCreate(
            ['key'   => 'career_en'],
            [
                'value' => $request->career_en
            ]
        );

        Option::updateOrCreate(
            ['key'   => 'career_ru'],
            [
                'value' => $request->career_ru
            ]
        );

        return response()->json(['message' => __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
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
        $cv = Cv::findOrFail($id);
        if (File::exists('back/cvs/'.$cv->cv))
        {
            File::delete('back/cvs/'.$cv->cv);
        }

        if (File::exists('back/cvs/'.$cv->characteristics))
        {
            File::delete('back/cvs/'.$cv->characteristics);
        }
        $cv->delete();

        toastSuccess(__('static.data_ugurla_silindi')); // success
        return redirect()->back(); // redirect back
    }
}
