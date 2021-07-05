package com.agrotool.repository.dao.intefaces;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.agrotool.entities.Variedad;

@Repository
public interface IVariedadRepository extends CrudRepository<Variedad, Integer>{

	//@Query(value = "SELECT id,marca,pais,nombre,cultivo,nuevo,campania,gid,grilla_img_uno,grilla_img_dos,imagen_ficha,tecnologias_ficha,link_ficha,link_oferta_publica,link_catalogo,link_ecommerce,resumen_footer,orden_visualizacion,id_Ficha FROM Variedad;", nativeQuery=true)
	//List<Variedad> getAll();
	
}
