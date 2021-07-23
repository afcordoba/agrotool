<?php

namespace App\Models;

use App\Models\Base;
use Illuminate\Support\Facades\Input;


class Data extends Base
{
    protected $table = 'data';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pais',
        'campana',
        'localidad',
        'genotipo',
        'gm',
        'antecesor',
        'f_siembra',
        'rango_fs',
        'nro_ensayo',
        'zona',
        'rendimiento',
        'dias_s_e_fs1',
        'dias_e_r1_fs1',
        'dias_r1_r3_fs1',
        'dias_r3_r5_fs1',
        'dias_r5_r7_fs1',
        'dias_r7_r8_fs1',
        'dias_e_r8_fs1',
        'dias_s_e_fs2',
        'dias_e_r1_fs2',
        'dias_r1_r3_fs2',
        'dias_r3_r5_fs2',
        'dias_r5_r7_fs2',
        'dias_r7_r8_fs2',
        'dias_e_r8_fs2',
        'dias_s_e_fs3',
        'dias_e_r1_fs3',
        'dias_r1_r3_fs3',
        'dias_r3_r5_fs3',
        'dias_r5_r7_fs3',
        'dias_r7_r8_fs3',
        'dias_e_r8_fs3',
        'dias_s_e_fs4',
        'dias_e_r1_fs4',
        'dias_r1_r3_fs4',
        'dias_r3_r5_fs4',
        'dias_r5_r7_fs4',
        'dias_r7_r8_fs4',
        'dias_e_r8_fs4',
        'updated_at',
        'created_at',
        'reporte',
        'cultivo',
        'ambiente',
        'variedad',
        'densidad',
        'planta_m2',
        'fs',
        'fecha',
        'dias_desde_1_10',
        's_e',
        'e_r1',
        'r1_r3',
        'r3_r5',
        'r5_r7',
        'r7_r8',
        'e_r8',
        'nrango',
        'fs_1_a_fs_2_v',
        'fs_2_a_fs_3_v',
        'fs_3_a_fs_4_v',
        'fs_1_a_fs_2',
        'fs_2_a_fs_3',
        'fs_3_a_fs_4',
        'rango_optimo',
        'tipo_rendimiento',
        'tipo_climatico',
        'product_id',
        'fecha_pc',
        'dias_r8',
        'fecha_siembra',
        'ver_mas',
        'gm2',
        'dias_desde_1_09',
        'e_vt',
        'vt_r1',
        'r1_r5',
        'e_r6',
        'dds',
        'e_encanazon',
        'encanazon_espigazon',
        'espigazon_madurez_fisiologica',
        'dde_mf',
        'ia',
        'tipo_de_ensayo'
        
    ];

    
    public static $fields = [
        'comportamiento' => [
            'cultivo' => 'cultivo',
            'pais' => 'País',
            'zona' => 'Zona',  
            'campana' => 'Campaña',
            'nro_ensayo' => 'Nro Ensayo', 
            'tipo_de_ensayo' => 'tipo_de_ensayo',
            'cultivo' => 'cultivo',
            'f_siembra' => 'f_siembra', 
            'rango_fs' => 'rango_de_fs',
            'nrango' => 'n_de_rango',
            'gm' => 'gm',
            'genotipo' => 'genotipo', 
            'antecesor' => 'antecesor',
            'zona' => 'zona',
            'rendimiento' => 'rendimiento', 
            'localidad' => 'localidad',  
            'ia' => 'ia',
            'ambiente' => 'ambiente',
            'created_at' => 'Creado'
        ],
        'densidad' => [
            'cultivo' => 'cultivo',
            'pais' => 'País',
            'zona' => 'Zona',           
            'ambiente' => 'ambiente',
            'variedad' => 'variedad', 
            'gm' => 'gm',
            'densidad' => 'densidad',
            'rendimiento' => 'rendimiento', 
            'planta_m2' => 'plantas_m2',
            'gm2' => 'gm2',
            'rango_optimo' => 'rango_optimo',
            'created_at' => 'Creado'
        ],
        'fecha' => [
            'cultivo' => 'cultivo',
            'pais' => 'pais', 
            'zona' => 'zona',
            'ambiente' => 'ambiente',
            'variedad' => 'variedad', 
            'gm' => 'gm',
            /*'nrango' => 'N Rango',*/
            'fecha_siembra' => 'fecha_de_siembra',
            'rendimiento' => 'rendimiento', 
            'rango_fs' => 'rango_de_fs',
            'gm2' => 'gm2',
            'fs_1_a_fs_2_v' => 'fs_1_a_fs_2_v', 
            'fs_2_a_fs_3_v' => 'fs_2_a_fs_3_v',
            'fs_3_a_fs_4_v' => 'fs_3_a_fs_4_v',
            'fs_1_a_fs_2' => 'fs_1_a_fs_2', 
            'fs_2_a_fs_3' => 'fs_2_a_fs_3',
            'fs_3_a_fs_4' => 'fs_3_a_fs_4',  
            'rango_optimo' => 'rango_optimo',
            'created_at' => 'Creado'
        ],
        'fenologico' => [
            'cultivo' => 'cultivo',
            'pais' => 'pais', 
            'zona' => 'zona',
            'fs' => 'fs',
            'variedad' => 'variedad', 
            'gm' => 'gm',
            'fecha' => 'fecha',
            'dias_desde_1_10' => 'dias_desde_1_10', 
            's_e' => 's_e',
            'e_r1' => 'e_r1',
            'r1_r3' => 'r1_r3', 
            'r3_r5' => 'r3_r5',
            'r5_r7' => 'r5_r7',  
            'r7_r8' => 'r7_r8',
            'r7_r8' => 'r7_r8',  
            'e_r8' => 'e_r8', 
            'dias_desde_1_09' => 'dias_desde_1_09',
            'e_vt' => 'e_vt',
            'vt_r1' => 'vt_r1',
            'r1_r5' => 'r1_r5',
            'e_r6' => 'e_r6',
            'dds' => 'dds',
            'e_encanazon' => 'e_encanazon',
            'encanazon_espigazon' => 'encanazon_espigazon',
            'espigazon_madurez_fisiologica' => 'espigazon_madurez_fisiologica',
            'dde_mf' => 'dde_mf',            
            'created_at' => 'Creado'
        ],
        'recomendador' => [
            'cultivo' => 'cultivo',
            'pais' => 'pais', 
            'zona' => 'zona',
            'tipo_rendimiento' => 'tipo_rendimiento',
            'variedad' => 'variedad', 
            'product_id' => 'product_id',
            'fecha_siembra' => 'fecha_siembra',
            'rango_fs' => 'rango_fs', 
            'densidad' => 'densidad', 
            'fecha_pc' => 'fecha_pc',
            'dias_r8' => 'dias_r8',
            'tipo_climatico' => 'Tipo Climático',    
            'fecha_siembra' => 'Fecha Siembra',  
            'ver_mas' => 'Ver Más', 
            'created_at' => 'Creado'            
        ]      
    ];
    
    protected static $search_fields;
    
    public static function search($type)
    {
        self::$search_fields[$type] = array_keys(self::$fields[$type]);
        $terms = Input::get('q','');
        if ($terms != '') {
            activity()->log("buscó {$terms} en datos de {$type}");
        } else {
            activity()->log('visualizó datos de '.$type);
        }
        return parent::relevanceSearch(self::$search_fields[$type]);  
    } 
    

}
