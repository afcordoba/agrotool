<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ComparativoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $f_siembra = (isset($row['f_siembra'])) ? Date::excelToDateTimeObject($row['f_siembra']) : null;
        return new Data([
            'reporte' => 'comportamiento',
            'pais' => (isset($row['pais'])) ? $row['pais'] : null,
            'cultivo' => (isset($row['cultivo'])) ? $row['cultivo'] : null,
            'campana' => (isset($row['campana'])) ? $row['campana'] : null,
            'nro_ensayo' => (isset($row['nro_ensayo'])) ? (int) $row['nro_ensayo'] : null,
            'f_siembra' => $f_siembra, 
            'rango_fs' => (isset($row['rango_de_fs'])) ? $row['rango_de_fs'] : null,
            'nrango' => (isset($row['n_de_rango'])) ? (string) $row['n_de_rango'] : null,
            'gm' => (isset($row['gm'])) ? $row['gm'] : null,
            'genotipo' => (isset($row['genotipo'])) ? $row['genotipo'] : null, 
            'antecesor' => (isset($row['antecesor'])) ? $row['antecesor'] : null,
            'zona' => (isset($row['zona'])) ? $row['zona'] : null,
            'rendimiento' => (isset($row['rendimiento'])) ? (int) $row['rendimiento'] : null, 
            'localidad' => (isset($row['localidad'])) ? $row['localidad'] : null,
            'ia' => (isset($row['ia'])) ? $row['ia'] : null,
            'tipo_de_ensayo' => (isset($row['ia'])) ? $row['tipo_de_ensayo'] : null
        ]);
    }
}
