<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecomendadorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'reporte' => 'recomendador',
            'cultivo' => (isset($row['cultivo'])) ? $row['cultivo'] : '', 
            'pais' => (isset($row['pais'])) ? $row['pais'] : '', 
            'zona' => (isset($row['zona'])) ? $row['zona'] : '',
            'tipo_rendimiento' => (isset($row['tipo_rendimiento'])) ? $row['tipo_rendimiento'] : '',
            'variedad' => (isset($row['variedad'])) ? $row['variedad'] : '', 
            'product_id' => (isset($row['product_id'])) ? (int) $row['product_id'] : 0,
            'fecha_siembra' => (isset($row['fecha_siembra'])) ? $row['fecha_siembra'] : '',
            'rango_fs' => (isset($row['fecha'])) ? $row['fecha'] : '', 
            'densidad' => (isset($row['densidad'])) ? $row['densidad'] : '', 
            'fecha_pc' => (isset($row['fecha_pc'])) ? $row['fecha_pc'] : '',
            'dias_r8' => (isset($row['dias_r8'])) ? (int) $row['dias_r8'] : 0,
            'ver_mas' => (isset($row['ver_mas'])) ? $row['ver_mas'] : '',
            'tipo_climatico' => (isset($row['tipo_climatico'])) ? $row['tipo_climatico'] : ''
        ]);
    }
}
