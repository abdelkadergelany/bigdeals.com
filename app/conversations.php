<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversations extends Model
{
    //
    protected $fillable = [
        'userId','with','created_at','updated_at'
    ];
}
