<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
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
            $data = Contact::latest()
                ->get();

            return DataTables::of($data)


                ->addColumn('action',function ($row){
                    return '
                <div class="btn-list flex-nowrap">
                    <a href="javascript:void(0)" class="btn btn-danger messageDeleter" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#modal-danger">
                      <i class="fa fa-times"></i>
                    </a>
                </div>
                ';
                })

                ->editColumn('contact_details', function ($row) {
                    return $row->email."\n".$row->telno;
                })

                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => Carbon::parse($row->created_at)->format('d/m/Y H:i'),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })

                ->rawColumns(['action','created_at'])

                ->make(true);
        }

        return view('back.pages.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact_image = Options::getOption('contact_image');
        if(File::exists(public_path('files/contact/'.$contact_image))){
            File::delete(public_path('files/contact/'.$contact_image));
        }

        $file       = $request->file('image');
        $filename   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $newname    = str_slug($filename.time()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files/contact'), $newname);

        Option::updateOrCreate(
            ['key' => 'contact_image'],
            ['value' => $newname]
        );

        return response()->json(['message' => __('static.data_ugurla_elave_etildi')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => __('static.data_ugurla_silindi')], Response::HTTP_OK);
    }
}
