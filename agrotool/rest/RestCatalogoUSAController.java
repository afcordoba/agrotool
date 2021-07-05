package com.gdm.services.rest;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.gdm.commons.beans.Catalogo;
import com.gdm.commons.beans.Ficha;
import com.gdm.commons.beans.VariedadDummy;
import com.gdm.commons.beans.VariedadUSA;

@RestController
@RequestMapping("/restCatalogoUSA")
public class RestCatalogoUSAController {

	
	@GetMapping
	public List<Catalogo> listar(){
		List<Catalogo> listado = new ArrayList<Catalogo>();
		Catalogo catalogo = new Catalogo();
		catalogo.setId(1);
		catalogo.setInstancia("USA");
		catalogo.setVariedades(new ArrayList<VariedadDummy>());
		
		VariedadUSA v1 = new VariedadUSA();
		v1.setName("V 3720S");
		v1.setBrand("virtue");
		v1.setGid("2984050");
		Ficha f1 = new Ficha();
		
		HashMap<String, Object> hm1 = new HashMap<String, Object>();
		hm1.put("RM", "IV medio");
		hm1.put("FC", "Indeterminado");
		hm1.put("PUB", "146");
		hm1.put("POD", "2");
		hm1.put("HILUM", "160");
		hm1.put("GH", "Castaña clara");
		hm1.put("PLANT HEIGHT", "112");
		hm1.put("LODGING", new Integer(160));
		hm1.put("STEM CANKER", "https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf");
		hm1.put("RPS GENE", "https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		
		HashMap<String, Object> img1 = new HashMap<String, Object>();
		img1.put("mapa", "mapa.jpg");
		img1.put("tecnology", "rr2.jpg");
		img1.put("image", "bolsa_soja.jpg");
		
		//catalogo.getVariedades().add(v1);
		return listado;
	}
	
}
