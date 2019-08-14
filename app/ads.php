<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    // $table->string('regionName');
      protected $fillable = [
        'cityName',
        'buyNow',
        'address',
        'subCategoryName',
        'categoryName',
        'regionName',
        'title',
        'phone',
        'description',  
        'price',
        'isUsed',
        'userId',
        'negociable',
        'brand',
        'model',
        'size',
        'authenticity',
        'pict1',
        'pict2',
        'pict3',
        'pict4',
        'pict5',   
        'type'        
    ];
}
