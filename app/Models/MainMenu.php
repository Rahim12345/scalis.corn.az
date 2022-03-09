<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;

    protected $table = 'main_menus';
    protected $primaryKey = 'main_menu_id';

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'slug_az',
        'slug_en',
        'slug_ru'
    ];

    public function sub_one_menus()
    {
        return $this->hasMany(SubOneMenu::class,'main_menu_id','main_menu_id');
    }
}
