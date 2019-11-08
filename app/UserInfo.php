<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    //
    protected $fillable = [
        'address','isStore','userId','FullName','cityName','RegionName','phone'
    ];
}
