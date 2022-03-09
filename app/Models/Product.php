<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'sub_two_menu_id',
        'capri',
        'agt',
        'brend',
        'seth',
        'reng',
        'en',
        'boy',
        'qalinliq',
        'palet',
        'center_image',
        'right_side_image_1',
        'right_side_image_2',
        'right_side_video',
        'draft'
    ];

    public function getSubMenu2()
    {
        return $this->hasOne(SubTwoMenu::class,'sub_two_menu_id','sub_two_menu_id');
    }
}
