<?php

namespace App\Models;

use App\Models\Base;
use DB;

class StatsReports extends Base
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

    public static function getReportsByUserEmail($user)
    {
        return DB::table('stats_reports')
                ->select(DB::raw('report, sum(total) as total'))
                ->where('email',"=", $user->email)
                ->groupBy('report')
                ->orderBy('total','desc')
                ->get();           
    }   
    
public function getReportAttribute($value)
{
    $this->attributes['report'] = ucfirst($value);
}    
}


