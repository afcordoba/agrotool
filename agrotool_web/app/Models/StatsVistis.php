<?php

namespace App\Models;

use App\Models\Base;
use Illuminate\Support\Facades\Input;

class StatsVisits extends Base
{
    protected $table = 'stats_visits';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'ip',
        'visits'         
    ];
       
}
