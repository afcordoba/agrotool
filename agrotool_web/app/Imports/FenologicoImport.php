<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FenologicoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'reporte' => 'fenologia',
            'cultivo' => (isset($row['cultivo'])) ? $row['cultivo'] : null,
            'pais' => (isset($row['pais'])) ? $row['pais'] : null, 
            'zona' => (isset($row['zona'])) ? $row['zona'] : null,
            'fs' => (isset($row['fs'])) ? $row['fs'] : null,
            'variedad' => (isset($row['variedad'])) ? $row['variedad'] : null, 
            'gm' => (isset($row['gm'])) ? $row['gm'] : null,
            'fecha' => (isset($row['fecha'])) ? $row['fecha'] : '',
            'dias_desde_1_10' => (isset($row['dias_desde_1_10'])) ? $row['dias_desde_1_10'] : null, 
            'e_r1' => (isset($row['e_r1'])) ? $row['e_r1'] : null,
            'r1_r3' => (isset($row['r1_r3'])) ? $row['r1_r3'] : null, 
            'r3_r5' => (isset($row['r3_r5'])) ? $row['r3_r5'] : null,
            'r5_r7' => (isset($row['r5_r7'])) ? $row['r5_r7'] : null,  
            'r7_r8' => (isset($row['r7_r8'])) ? $row['r7_r8'] : null,
            'e_r8' => (isset($row['e_r8'])) ? $row['e_r8'] : null,
            'dias_desde_1_09' =>  (isset($row['dias_desde_1_09'])) ? $row['dias_desde_1_09'] : null,
            'e_vt' =>  (isset($row['e_vt'])) ? $row['e_vt'] : null,
            'vt_r1' =>  (isset($row['vt_r1'])) ? $row['vt_r1'] : null,
            'r1_r5' =>  (isset($row['r1_r5'])) ? $row['r1_r5'] : null,
            'e_r6' =>  (isset($row['e_r6'])) ? $row['e_r6'] : null,
            'dds' =>  (isset($row['dds'])) ? $row['dds'] : null,
            'e_encanazon' =>  (isset($row['e_encanazon'])) ? $row['e_encanazon'] : null,
            'encanazon_espigazon' =>  (isset($row['encanazon_espigazon'])) ? $row['encanazon_espigazon'] : null,
            'espigazon_madurez_fisiologica' =>  (isset($row['espigazon_madurez_fisiologica'])) ? $row['espigazon_madurez_fisiologica'] : null,   
            'dde_mf' => (isset($row['dde_mf'])) ? $row['dde_mf'] : null,
        ];
        
        
        if (isset($row['s_e']) && $row['s_e'] != '') {
            $data['s_e'] = $row['s_e'];
        } elseif (isset($row['s_e2']) && $row['s_e2'] != '') {
            $data['s_e'] = $row['s_e2'];
        } elseif (isset($row['s_e3']) && $row['s_e3'] != '') {
            $data['s_e'] = $row['s_e3'];
        } else {
            $data['s_e'] = null;
        }
        
        return new Data($data);
    }
}
