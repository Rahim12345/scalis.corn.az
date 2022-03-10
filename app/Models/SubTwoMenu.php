<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTwoMenu extends Model
{
    use HasFactory;

    protected $table = 'sub_two_menus';
    protected $primaryKey = 'sub_two_menu_id';

    protected $fillable = [
        'sub_one_menu_id',
        'name_az',
        'name_en',
        'name_ru',
        'slug_az',
        'slug_en',
        'slug_ru'
    ];

    public function subMenuOne()
    {
        return $this->belongsTo(SubOneMenu::class, 'sub_one_menu_id');
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class,'sub_two_menu_id ','sub_two_menu_id ');
    }
}
