<?php

namespace App\Models;

use App\Listeners\SendEmailContactMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'telno', 'message','ip'];
}
