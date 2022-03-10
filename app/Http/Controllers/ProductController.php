<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Sertifikat;
use App\Models\SubTwoMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::latest()
                ->get();

            return DataTables::of($data)


                ->addColumn('action',function ($row){
                    return '

                <div class="btn-list flex-nowrap">
                <a href="'.route('back.product.files',['action'=>'sertifikat','id'=>$row->id]).'" class="btn btn-primary">S</a>
                <a href="'.route('back.product.files',['action'=>'file','id'=>$row->id]).'" class="btn btn-primary">F</a>
                <a href="'.route('product.edit',$row->id).'" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                    <a href="javascript:void(0)" class="btn btn-danger productDeleter" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#modal-danger">
                      <i class="fa fa-times"></i>
                    </a>
                </div>
                ';
                })

                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => Carbon::parse($row->created_at)->format('d/m/Y H:i'),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })

                ->editColumn('esas_menu', function ($row) {
                    return $row->getSubMenu2->subMenuOne->mainMenus->{'name_'.app()->getLocale()};
                })

                ->editColumn('sub_menu_1', function ($row) {
                    return $row->getSubMenu2->subMenuOne->{'name_'.app()->getLocale()};
                })

                ->editColumn('sub_menu_2', function ($row) {
                    return $row->getSubMenu2->{'name_'.app()->getLocale()};
                })

                ->rawColumns(['action','created_at'])

                ->make(true);
        }

        return view('back.pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_2_menus = SubTwoMenu::all();
        if ($sub_2_menus->count() == 0)
        {
            redirect()->route('sub-two-menu.create');
        }
        return view('back.pages.products.create',[
            'sub_2_menus'=>$sub_2_menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->action == '0' || $request->action == '1')
        {
            $newName = $this->saveTextPart($request);
        }
        elseif ($request->action == 'upload_image')
        {
            $newName = $this->saveImagePart($request);
        }
        elseif ($request->action == 'upload_video')
        {
            $newName = $this->saveVideoPart($request);
        }
        elseif ($request->action == 'upload_sertifikat_image')
        {
            $newName = $this->saveSertifikat($request);
        }
        elseif ($request->action == 'sertifikat_sil')
        {
            $newName = 'bad';
            if(File::exists(public_path('files/products/sertifikatlar/'.$request->silinen_sekil)))
            {
                File::delete(public_path('files/products/sertifikatlar/'.$request->silinen_sekil));
                $newName = 'ok';
            }

        }

        return $newName;
    }

    public function saveSertifikat($request)
    {
        $file       = $request->file('sertifikat');
        $filename   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension  = $file->getClientOriginalExtension();
        $newName    = $filename . '_' . time() . '.' . $extension;
        $file->move(public_path('files/products/sertifikatlar'), $newName);

        return $newName.'|||'.$request->name.'|||'.$request->year;
    }

    public function saveVideoPart($request)
    {
        $old_file = public_path($request->old_file);
        if ($old_file === null)
        {
            $newName = $this->uploadVideo($request);
        }
        else
        {
            if (File::exists($old_file))
            {
                File::delete($old_file);
            }

            $newName = $this->uploadVideo($request);
        }
        return $newName;
    }

    public function uploadVideo($request)
    {
        $file       = $request->file('right_side_video');
        $filename   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension  = $file->getClientOriginalExtension();
        $newName    = $filename . '_' . time() . '.' . $extension;
        $file->move(public_path('files/products/videos'), $newName);

        return $newName;
    }

    public function saveTextPart($request)
    {
        $product = Product::create([
            'sub_two_menu_id'=>$request->sub_menu_2,
            'capri'=>$request->capri,
            'agt'=>$request->agt,
            'brend'=>$request->brend,
            'seth'=>$request->seth,
            'reng'=>$request->reng,
            'en'=>$request->en,
            'boy'=>$request->boy,
            'qalinliq'=>$request->qalinliq,
            'palet'=>$request->palet,
            'center_image'=>$request->center_image,
            'right_side_image_1'=>$request->right_side_image_1,
            'right_side_image_2'=>$request->right_side_image_2,
            'right_side_video'=>$request->right_side_video,
            'draft'=>$request->action
        ]);

        return $product;
    }

    public function saveImagePart($request)
    {
        $old_file = public_path($request->old_file);
        if ($old_file === null)
        {
            if ($request->file('center_image'))
            {
                $name = 'center_image';
            }

            if ($request->file('right_side_image_1'))
            {
                $name = 'right_side_image_1';
            }

            if ($request->file('right_side_image_2'))
            {
                $name = 'right_side_image_2';
            }

            $new_name = $this->imageUploader($request, 'files/products/', 1079, null,$name);
        }
        else
        {
            if ($request->file('center_image'))
            {
                $name = 'center_image';

                if (File::exists($old_file))
                {
                    File::delete($old_file);
                }
            }

            if ($request->file('right_side_image_1'))
            {
                $name = 'right_side_image_1';
                if (File::exists($old_file))
                {
                    File::delete($old_file);
                }
            }

            if ($request->file('right_side_image_2'))
            {
                $name = 'right_side_image_2';
                if (File::exists($old_file))
                {
                    File::delete($old_file);
                }
            }

            if ($request->file('center_image'))
            {
                $name = 'center_image';
            }

            if ($request->file('right_side_image_1'))
            {
                $name = 'right_side_image_1';
            }

            if ($request->file('right_side_image_2'))
            {
                $name = 'right_side_image_2';
            }

            $new_name = $this->imageUploader($request, 'files/products/', 1079, null,$name);

        }

        return $new_name;
    }

    public function imageUploader($request, $directory = '/',$width = null, $height = null, $name)
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sub_2_menus = SubTwoMenu::all();
        if ($sub_2_menus->count() == 0)
        {
            redirect()->route('sub-two-menu.create');
        }

        return view('back.pages.products.edit',compact('product','sub_2_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'sub_two_menu_id'=>$request->sub_menu_2,
            'capri'=>$request->capri,
            'agt'=>$request->agt,
            'brend'=>$request->brend,
            'seth'=>$request->seth,
            'reng'=>$request->reng,
            'en'=>$request->en,
            'boy'=>$request->boy,
            'qalinliq'=>$request->qalinliq,
            'palet'=>$request->palet,
            'center_image'=>$request->center_image,
            'right_side_image_1'=>$request->right_side_image_1,
            'right_side_image_2'=>$request->right_side_image_2,
            'right_side_video'=>$request->right_side_video,
            'draft'=>$request->action
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $files = [
            'center_image',
            'right_side_image_1',
            'right_side_image_2',
            'right_side_video'
        ];

        foreach ($files as $file)
        {
            if (File::exists(public_path($product->{$file})))
            {
                File::delete(public_path($product->{$file}));
            }
        }

        $product->delete();
        return response()->json([
           'message'=>__('static.data_ugurla_silindi')
        ], Response::HTTP_OK);
    }

    public function productFiles($action, $id)
    {
        $product = Product::findOrFail($id);
        return view('back.pages.products.product-files', compact('product','action','id'));
    }

    public function productFilesPost(Request $request)
    {
        if ($request->action == 'sertifikat')
        {
            $this->validate($request,[
                'name'=>'required|max:191',
                'year'=>'required',
                'sertifikat'=>'required|image|mimes:jpg,png,jpeg|max:2048'
            ],[],[
                'name'=>'AD',
                'year'=>'Il',
                'sertifikat'=>'Sertifikat şəkili'
            ]);

            $file           = $request->sertifikat;
            $filename       = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
            $extention      = $file->getClientOriginalExtension();
            $new_name       = $filename . '-' . time() . '.' . $extention;

            $image_resize   = Image::make($file->getRealPath());
            $image_resize   = $image_resize->orientate();
            $image_resize->resize(272, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image_resize->save(public_path('files/products/sertifikatlar/'.$new_name));

            Sertifikat::create([
                'product_id'=>$request->id,
                'src'=>$new_name,
                'name'=>$request->name,
                'year'=>$request->year
            ]);
        }
        else
        {
            $this->validate($request,[
                'name'=>'required|max:191',
                'file'=>'required|mimes:pdf|max:2048'
            ],[],[
                'name'=>'AD',
                'file'=>'Fayl'
            ]);

            $file           = $request->file;
            $filename       = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
            $extention      = $file->getClientOriginalExtension();
            $new_name       = $filename . '-' . time() . '.' . $extention;


            $file->move(public_path('files/products/files/'),$new_name);

            \App\Models\File::create([
                'product_id'=>$request->id,
                'name'=>$request->name,
                'src'=>$new_name,
            ]);
        }

        toastSuccess(__('static.data_ugurla_elave_etildi'));
        return redirect()->back();
    }

    public function productFilesDelete($action, $id)
    {
        if($action == 'sertifikat')
        {
            $ser = Sertifikat::findOrFail($id);
            if(File::exists(public_path('files/products/sertifikatlar/'.$ser->src)))
            {
                File::delete('files/products/sertifikatlar/'.$ser->src);
            }

            $ser->delete();
        }
        else
        {
            $file = \App\Models\File::findOrFail($id);
            if(File::exists(public_path('files/products/files/'.$file->src)))
            {
                File::delete('files/products/files/'.$file->src);
            }

            $file->delete();
        }


        toastSuccess(__('static.data_ugurla_silindi'));
        return redirect()->back();
    }
}
