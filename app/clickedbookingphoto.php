<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clickedbookingphoto extends Model
{
    protected $fillable=['name','image','phone_num','booking_date','function_date','occation','size','total_rate','advance','due'];
}
