<?php

namespace App\Models;

use App\Models\Base;
use Illuminate\Support\Facades\Input;

class UrlShorter extends Base
{
    protected $table = 'url_shorter';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',        
    ];
       
}