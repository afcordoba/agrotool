<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class DataExport implements FromQuery
{
    use Exportable;
    
    public function __construct(string $type, string $index)
    {
        $this->type = $type;
        $this->index = $index;
    }    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $fields = array_keys(Data::$fields[$this->index]);
        return Data::query()->select($fields)->where("reporte", "=", $this->type);
    }
}
