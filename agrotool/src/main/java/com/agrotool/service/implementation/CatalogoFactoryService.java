package com.agrotool.service.implementation;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.agrotool.entities.Variedad;

import lombok.Getter;
import lombok.Setter;

@Service
@Getter @Setter
public class CatalogoFactoryService {
	private List<Variedad> variedades;
	
	
	
	/*
	 * @Autowired IVariedadRepository variedadRep;
	 * 
	 * 
	 * 
	 * 
	 * public Catalogo buildCatalogo() { Catalogo catalogo = new Catalogo();
	 * catalogo.setId(1); catalogo.setInstancia("LAS"); catalogo.setVariedades(new
	 * ArrayList<VariedadDummy>());
	 * 
	 * 
	 * variedades = variedadRep.getAll(); VariedadDummy vd = null; Ficha f = new
	 * Ficha(); HashMap<String, Object> atr = new HashMap<String, Object>();
	 * Iterator it = variedades.iterator();
	 * 
	 * while(it.hasNext()){ Variedad v = (Variedad) it.next(); vd = new
	 * VariedadDummy(); vd.setId(v.getId().intValue());
	 * vd.setCampania(v.getCampania()); vd.setCultivo(v.getCultivo()); }
	 * 
	 * 
	 * vd.setFicha(f); catalogo.getVariedades().add(vd); return catalogo;
	 * 
	 * }
	 */
}
