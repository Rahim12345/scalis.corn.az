<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'banner_image', // Banner Image
        'about_us_az',  // About us az
        'about_us_en',  // About us en
        'about_us_ru',  // About us ru
    ];
}
