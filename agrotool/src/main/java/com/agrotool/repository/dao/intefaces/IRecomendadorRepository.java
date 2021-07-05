package com.agrotool.repository.dao.intefaces;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.agrotool.entities.VariedadRecomendada;



@Repository
public interface IRecomendadorRepository extends JpaRepository<VariedadRecomendada, Integer>{
	
	@Query(value = "SELECT id,cultivo, pais, zona, tipo_rendimiento, variedad, product_id, fecha_siembra, rango_fs, densidad, fecha_pc, dias_r8, tipo_climatico,ver_mas,reporte FROM VariedadRecomendada WHERE reporte = :reporte AND pais = :pais AND cultivo = :cultivo AND zona = :zona AND tipo_rendimiento = :tipo_rendimiento AND tipo_climatico = :tipo_climatico", nativeQuery=true)
	List<VariedadRecomendada> findbyAllParams(@Param("reporte") String reporte,@Param("pais")String pais, @Param("cultivo") String cultivo, 
			 @Param("zona") String zona ,@Param("tipo_rendimiento") String tipo_rendimiento, @Param("tipo_climatico") String tipo_climatico) ;
	
	
	@Query(value = "SELECT id,cultivo, pais, zona, tipo_rendimiento, variedad, product_id, fecha_siembra, rango_fs, densidad, fecha_pc, dias_r8, tipo_climatico,ver_mas,reporte FROM VariedadRecomendada WHERE reporte = :reporte AND pais = :pais AND cultivo = :cultivo AND zona = :zona", nativeQuery=true)
	List<VariedadRecomendada> findbyCultivoPaisZona(@Param("reporte") String reporte,@Param("pais")String pais, @Param("cultivo") String cultivo, 
			 @Param("zona") String zona) ;
	


}
