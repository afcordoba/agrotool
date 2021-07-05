package com.gdm.services.rest;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.gdm.commons.beans.FichaLatam;
import com.gdm.commons.beans.VariedadLatam;
import com.gdm.entities.Variedad;
import com.gdm.service.implementation.VariedadServiceImpl;


@RestController
@RequestMapping("/catalogoLAS")
public class RestCatalogoLasController {
	@Autowired
	VariedadServiceImpl servicio;
	
	
	@GetMapping
	public List<VariedadLatam> listar(){
		List<Variedad> tmp =  (List<Variedad>) servicio.getDao().findAll();
		Iterator ite = tmp.iterator();
		FichaLatam f = null;
		List<VariedadLatam> variedades = new ArrayList<VariedadLatam>();
		
		Variedad var = null;
		while(ite.hasNext()) {
			var = (Variedad) ite.next();
			VariedadLatam varL = new VariedadLatam();
			varL.setCampania(var.getCampania());
			varL.setCultivo(var.getCultivo());
			varL.setCiclo(var.getCiclo());
			varL.setGrupo_madurez(var.getGrupo_madurez());
			varL.setTecnologia(var.getTecnologia());
			varL.setGid(var.getGid());
			varL.setGrilla_img_dos(var.getGrilla_img_dos());
			varL.setGrilla_img_uno(var.getGrilla_img_uno());
			varL.setImagenFicha(var.getImagenFicha());
			varL.setLinkCatalogo(var.getLinkCatalogo());
			varL.setLinkEcommerce(var.getLinkEcommerce());
			varL.setLinkFicha(var.getLinkFicha());
			varL.setLinkOfertaPublica(var.getLinkOfertaPublica());
			varL.setMarca(var.getMarca());
			varL.setNombre(var.getNombre());
			varL.setNuevo(var.getNuevo());
			varL.setOrden_visualizacion(var.getOrden_visualizacion());
			varL.setPais(var.getPais());
			varL.setResumenFooter(var.getResumenFooter());
			varL.setTecnologiasFicha(var.getTecnologiasFicha());
			
			f = new FichaLatam();
			f.getAtributos().put("1-"+ var.getFicha_labels().getAtr_uno(), var.getFicha_values().getVal1());
			f.getAtributos().put("2-"+ var.getFicha_labels().getAtr_dos(), var.getFicha_values().getVal2());
			f.getAtributos().put("3-"+ var.getFicha_labels().getAtr_tres(), var.getFicha_values().getVal3());
			f.getAtributos().put("4-"+ var.getFicha_labels().getAtr_cuatro(), var.getFicha_values().getVal4());
			f.getAtributos().put("5-"+ var.getFicha_labels().getAtr_cinco(), var.getFicha_values().getVal5());
			f.getAtributos().put("5-"+ var.getFicha_labels().getAtr_seis(), var.getFicha_values().getVal6());
			f.getAtributos().put("7-"+ var.getFicha_labels().getAtr_siete(), var.getFicha_values().getVal7());
			f.getAtributos().put("8-"+ var.getFicha_labels().getAtr_ocho(), var.getFicha_values().getVal8());
			f.getAtributos().put("9-"+ var.getFicha_labels().getAtr_nueve(), var.getFicha_values().getVal9());
			f.getAtributos().put("10-"+ var.getFicha_labels().getAtr_diez(), var.getFicha_values().getVal10());
			f.getAtributos().put("11-"+ var.getFicha_labels().getAtr_once(), var.getFicha_values().getVal11());
			f.getAtributos().put("12-"+ var.getFicha_labels().getAtr_doce(), var.getFicha_values().getVal12());
			
			f = new FichaLatam();
			f.getAtributos().put(var.getFicha_labels().getAtr_uno(), var.getFicha_values().getVal1());
			f.getAtributos().put(var.getFicha_labels().getAtr_dos(), var.getFicha_values().getVal2());
			f.getAtributos().put(var.getFicha_labels().getAtr_tres(), var.getFicha_values().getVal3());
			f.getAtributos().put(var.getFicha_labels().getAtr_cuatro(), var.getFicha_values().getVal4());
			f.getAtributos().put(var.getFicha_labels().getAtr_cinco(), var.getFicha_values().getVal5());
			f.getAtributos().put(var.getFicha_labels().getAtr_seis(), var.getFicha_values().getVal6());
			f.getAtributos().put(var.getFicha_labels().getAtr_siete(), var.getFicha_values().getVal7());
			
			if(var.getFicha_labels().getAtr_ocho()!=null )
			f.getAtributos().put(var.getFicha_labels().getAtr_ocho(), var.getFicha_values().getVal8());
			
			if(var.getFicha_labels().getAtr_nueve()!=null )
			f.getAtributos().put(var.getFicha_labels().getAtr_nueve(), var.getFicha_values().getVal9());
			
			if(var.getFicha_labels().getAtr_diez()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_diez(), var.getFicha_values().getVal10());
			
			if(var.getFicha_labels().getAtr_once()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_once(), var.getFicha_values().getVal11());
			if(var.getFicha_labels().getAtr_doce()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_doce(), var.getFicha_values().getVal12());
			
			if(var.getFicha_labels().getAtr_trece()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_trece(), var.getFicha_values().getVal13());

			if(var.getFicha_labels().getAtr_catorce()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_catorce(), var.getFicha_values().getVal14());

			if(var.getFicha_labels().getArt_quince()!=null )
				f.getAtributos().put(var.getFicha_labels().getArt_quince(), var.getFicha_values().getVal15());

			if(var.getFicha_labels().getAtr_dieciseis()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_dieciseis(), var.getFicha_values().getVal16());

			if(var.getFicha_labels().getAtr_diecisiete()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_diecisiete(), var.getFicha_values().getVal17());
			
			if(var.getFicha_labels().getAtr_dieciocho()!=null )
				f.getAtributos().put(var.getFicha_labels().getAtr_dieciocho(), var.getFicha_values().getVal18());
			
			varL.setFicha(f);
			variedades.add(varL);
		} 
		
		
		return variedades;
	}
}
