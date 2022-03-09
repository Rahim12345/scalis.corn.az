<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Http\Requests\StoreMainMenuRequest;
use App\Http\Requests\UpdateMainMenuRequest;

class MainMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainmenus = MainMenu::paginate(10);

        return view('back.pages.mainmenus.index', compact('mainmenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.mainmenus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMainMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainMenuRequest $request)
    {
        $main_menu = MainMenu::create([
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        if ($main_menu) {
            toastSuccess('Əməliyyat uğurla yerinə yetirildi');
            return redirect()->route('esas-menu.index')->with('success', 'Main Menu created successfully');
        } else {
            toastError('Əməliyyatda xəta baş verdi');
            return redirect()->route('esas-menu.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainMenu  $mainMenu
     * @return \Illuminate\Http\Response
     */
    public function show(MainMenu $mainMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainMenu  $mainMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($main_menu_id)
    {
        $main_menu = MainMenu::where('main_menu_id',$main_menu_id)->firstOrFail();
        return view('back.pages.mainmenus.edit', compact('main_menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMainMenuRequest  $request
     * @param  \App\Models\MainMenu  $mainMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainMenuRequest $request, MainMenu $mainMenu)
    {
        $main_menu = MainMenu::where('main_menu_id', $request->main_menu_id)->firstOrFail();
        $main_menu->update([
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        toastSuccess('Main Menu updated successfully.');
        return redirect()->route('esas-menu.index')->with('success', 'Main Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainMenu  $mainMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($main_menu_id)
    {
        $main_menu = MainMenu::where('main_menu_id', $main_menu_id)->firstOrFail();
        $main_menu->delete();

        toastSuccess('Main Menu deleted successfully.');
        return redirect()->route('esas-menu.index')->with('success', 'Main Menu deleted successfully.');
    }
}
