<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //

    protected $fillable = [
        'userId','adId','orderCode','title','title','fullName','address','phone','price','state'
    ];
}
