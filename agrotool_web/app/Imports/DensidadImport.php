<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DensidadImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([

            'reporte' => 'densidad',
            'pais' => (isset($row['pais'])) ? $row['pais'] : '',
            'zona' => (isset($row['zona'])) ? $row['zona'] : '',            
            'cultivo' => (isset($row['cultivo'])) ? $row['cultivo'] : '',
            'ambiente' => (isset($row['ambiente'])) ? $row['ambiente'] : '',
            'variedad' => (isset($row['variedad'])) ? $row['variedad'] : '', 
            'gm' => (isset($row['gm'])) ? $row['gm'] : '',
            'densidad' => (isset($row['densidad'])) ? $row['densidad'] : '',
            'rendimiento' => (isset($row['rendimiento'])) ? (float) $row['rendimiento'] : 0, 
            'planta_m2' => (isset($row['plantas_m2'])) ? (float) $row['plantas_m2'] : 0,
            'gm2' => (isset($row['gm2'])) ? $row['gm2'] : '',
            'rango_optimo' => (isset($row['rango_optimo'])) ? $row['rango_optimo'] : ''
        ]);
    }
}
