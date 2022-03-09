<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Models\Brend;
use App\Http\Requests\StoreBrendRequest;
use App\Http\Requests\UpdateBrendRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class BrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brend_banner = '';
        if (Options::getOption('brend_banner'))
        {
            $brend_banner = Options::getOption('brend_banner');
        }
        return view('back.pages.brends.index', [
            'brends' => Brend::all(),
            'brend_banner'=>$brend_banner
        ]);
    }

    public function loader()
    {
        $brends = Brend::orderBy('id','desc')->get();
        return \response()->json($brends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrendRequest $request)
    {
        $brend_banner = Options::getOption('brend_banner');
        if ($request->action == 'brend_banner')
        {
            if (!$brend_banner)
            {
                $new_name = $this->imageUploader($request, 'files/brends/',1780, null,'brend_banner');
            }
            else
            {
                if (File::exists(public_path('files/brends/'.$brend_banner)))
                {
                    File::delete(public_path('files/brends/'.$brend_banner));
                }
                $new_name = $this->imageUploader($request, 'files/brends/',1780, null,'brend_banner');
            }

            Option::updateOrCreate(
                ['key' => 'brend_banner'],
                ['value' => $new_name]
            );

            return response()->json(['message' => __('static.data_ugurla_elave_etildi'),'brend_image'=>'false'],Response::HTTP_CREATED);
        }
        elseif ($request->action == 'brend_image')
        {
            $new_name = $this->imageUploader($request, 'files/brends/',100, null,'brend_image');
            Brend::create([
                'src' => $new_name
            ]);

            return response()->json(['message' => __('static.data_ugurla_elave_etildi'),'brend_image'=>'true'],Response::HTTP_CREATED);
        }
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
     * @param  \App\Models\Brend  $brend
     * @return \Illuminate\Http\Response
     */
    public function show(Brend $brend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brend  $brend
     * @return \Illuminate\Http\Response
     */
    public function edit(Brend $brend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrendRequest  $request
     * @param  \App\Models\Brend  $brend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrendRequest $request, Brend $brend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brend  $brend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brend $brend)
    {
        if (File::exists(public_path('files/brends/'.$brend->src)))
        {
            File::delete(public_path('files/brends/'.$brend->src));
        }
        $brend->delete();

        return response()->json(['message' => __('static.data_ugurla_silindi')],Response::HTTP_OK);
    }
}
