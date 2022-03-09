<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOneMenu extends Model
{
    use HasFactory;

    protected $table = 'sub_one_menus';
    protected $primaryKey = 'sub_one_menu_id';

    protected $fillable = [
        'main_menu_id',
        'name_az',
        'name_en',
        'name_ru',
        'slug_az',
        'slug_en',
        'slug_ru'
    ];

    public function sub_two_menus()
    {
        return $this->hasMany(SubTwoMenu::class,'sub_one_menu_id','sub_one_menu_id');
    }

    public function mainMenus()
    {
        return $this->belongsTo(MainMenu::class,'main_menu_id','main_menu_id');
    }
}
