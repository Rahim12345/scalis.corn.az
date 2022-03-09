<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Models\SubOneMenu;
use App\Http\Requests\StoreSubOneMenuRequest;
use App\Http\Requests\UpdateSubOneMenuRequest;

class SubOneMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_one_menus = SubOneMenu::paginate(10);
        return view('back.pages.sub_one_menus.index', compact('sub_one_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.sub_one_menus.create',[
            'main_menus' => MainMenu::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubOneMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubOneMenuRequest $request)
    {
        $sub_one_menu = SubOneMenu::create([
            'main_menu_id'=>$request->main_menu_id,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        if($sub_one_menu){
            return redirect()->route('sub-one-menu.index')->with('success','Əməliyyat uğurla yerinə yetirildi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubOneMenu  $subOneMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SubOneMenu $subOneMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubOneMenu  $subOneMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($sub_one_menu_id)
    {
//        dd($sub_one_menu_id);
        return view('back.pages.sub_one_menus.edit',[
            'sub_one_menu' => SubOneMenu::where('sub_one_menu_id',$sub_one_menu_id)->firstOrFail(),
            'main_menus' => MainMenu::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubOneMenuRequest  $request
     * @param  \App\Models\SubOneMenu  $subOneMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubOneMenuRequest $request)
    {
        $sub_one_menu = SubOneMenu::findOrFail($request->sub_one_menu_id);
        $sub_one_menu->update([
            'main_menu_id'=>$request->main_menu_id,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        if($sub_one_menu){
            return redirect()->route('sub-one-menu.index')->with('success','Əməliyyat uğurla yerinə yetirildi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubOneMenu  $subOneMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_one_menu_id)
    {
        $sub_one_menu = SubOneMenu::where('sub_one_menu_id',$sub_one_menu_id)->firstOrFail();
        $sub_one_menu->delete();

        toastSuccess('Əməliyyat uğurla yerinə yetirildi');
        return redirect()->route('sub-one-menu.index')->with('success','Əməliyyat uğurla yerinə yetirildi');
    }
}
