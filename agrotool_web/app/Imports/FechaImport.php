<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FechaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'reporte' => 'siembra',
            'cultivo' => (isset($row['pais'])) ? $row['cultivo'] : '',
            'pais' => (isset($row['pais'])) ? $row['pais'] : '', 
            'zona' => (isset($row['zona'])) ? $row['zona'] : '',
            'ambiente' => (isset($row['ambiente'])) ? $row['ambiente'] : '',
            'variedad' => (isset($row['variedad'])) ? $row['variedad'] : '', 
            'gm' => (isset($row['gm'])) ? $row['gm'] : '',
            'fecha_siembra' => (isset($row['fecha_de_siembra'])) ? $row['fecha_de_siembra'] : '',
            'rendimiento' => (isset($row['rendimiento'])) ? $row['rendimiento'] : 0, 
            'rango_fs' => (isset($row['rango_de_fs'])) ? $row['rango_de_fs'] : '',
            'gm2' => (isset($row['gm2'])) ? $row['gm2'] : '',
            'fs_1_a_fs_2_v' => (isset($row['fs_1_a_fs_2_v'])) ? $row['fs_1_a_fs_2_v'] : '', 
            'fs_2_a_fs_3_v' => (isset($row['fs_2_a_fs_3_v'])) ? $row['fs_2_a_fs_3_v'] : '',
            'fs_3_a_fs_4_v' => (isset($row['fs_3_a_fs_4_v'])) ? $row['fs_3_a_fs_4_v'] : '',
            'fs_1_a_fs_2' => (isset($row['fs_1_a_fs_2'])) ? $row['fs_1_a_fs_2'] : '', 
            'fs_2_a_fs_3' => (isset($row['fs_2_a_fs_3'])) ? $row['fs_2_a_fs_3'] : '',
            'fs_3_a_fs_4' => (isset($row['fs_3_a_fs_4'])) ? $row['fs_3_a_fs_4'] : '',  
            'rango_optimo' => (isset($row['rango_optimo'])) ? $row['rango_optimo'] : ''
        ]);
    }
}
