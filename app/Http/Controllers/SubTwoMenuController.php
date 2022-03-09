<?php

namespace App\Http\Controllers;

use App\Models\SubOneMenu;
use App\Models\SubTwoMenu;
use App\Http\Requests\StoreSubTwoMenuRequest;
use App\Http\Requests\UpdateSubTwoMenuRequest;

class SubTwoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_two_menus = SubTwoMenu::paginate(10);

        return view('back.pages.sub_two_menus.index', compact('sub_two_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.sub_two_menus.create',[
            'sub_one_menus' => SubOneMenu::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubTwoMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubTwoMenuRequest $request)
    {
        $sub_two_menu = SubTwoMenu::create([
            'sub_one_menu_id'=>$request->sub_one_menu_id,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        if($sub_two_menu){
            toastSuccess('Əlavə etdi');
            return redirect()->route('sub-two-menu.index')->with('success','Sub Two Menu Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubTwoMenu  $subTwoMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SubTwoMenu $subTwoMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubTwoMenu  $subTwoMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($sub_two_menu_id)
    {
        $sub_two_menu = SubTwoMenu::where('sub_two_menu_id',$sub_two_menu_id)->firstOrFail();

        return view('back.pages.sub_two_menus.edit',[
            'sub_two_menu'=>$sub_two_menu,
            'sub_one_menus' => SubOneMenu::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubTwoMenuRequest  $request
     * @param  \App\Models\SubTwoMenu  $subTwoMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubTwoMenuRequest $request, SubTwoMenu $subTwoMenu)
    {
        $subTwoMenu->update([
            'sub_one_menu_id'=>$request->sub_one_menu_id,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        toastSuccess('Dəyişdi');
        return redirect()->route('sub-two-menu.index')->with('success','Sub Two Menu Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubTwoMenu  $subTwoMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_two_menu_id)
    {
        $sub_two_menu = SubTwoMenu::where('sub_two_menu_id',$sub_two_menu_id)->firstOrFail();

        if($sub_two_menu->delete()){
            toastSuccess('Silindi');
            return redirect()->route('sub-two-menu.index')->with('success','Sub Two Menu Deleted Successfully');
        }
    }
}
