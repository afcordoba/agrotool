package com.gdm.services.rest;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.gdm.commons.beans.EnsayoMapa;
import com.gdm.commons.beans.FichaEnsayo;
import com.gdm.entities.Ensayo;
import com.gdm.repository.dao.intefaces.IEnsayoRepository;

@RestController
@RequestMapping("/ensayos")
public class RestEnsayosController {

	@Autowired
	IEnsayoRepository servicio;

	@GetMapping
	public List<EnsayoMapa> listar() throws ParseException {
		List<Ensayo> tmp = (List<Ensayo>) servicio.findbyAllParams("DMMAS");

		Iterator ite = tmp.iterator();
		FichaEnsayo f = null;
		List<EnsayoMapa> ensayos = new ArrayList<EnsayoMapa>();
		Ensayo ensayo = null;
		String ensayoActual = "";
		boolean ensayoCompleto = false;
		EnsayoMapa enM = null;
		procesarRedDMMAS(ite, f, ensayos, ensayoActual, ensayoCompleto, enM);
		this.procesarRedTerceros(ensayos);
		return ensayos;
	}

	private void procesarRedDMMAS(Iterator ite, FichaEnsayo f, List<EnsayoMapa> ensayos, String ensayoActual, boolean ensayoCompleto, EnsayoMapa enM)  {
		Ensayo ensayo;
		while (ite.hasNext()) {
			ensayo = (Ensayo) ite.next();
			if ("DMMAS".equals(ensayo.getTipode_red().trim()) && !ensayoActual.equals(ensayo.getEnsayo()) ) {
				ensayoActual = ensayo.getEnsayo();
				enM = new EnsayoMapa();
				f = new FichaEnsayo();
				ensayoCompleto = false;
			}
			if ("DMMAS".equals(ensayo.getTipode_red().trim()) && ensayoActual.equals(ensayo.getEnsayo())) {
				if (f.getAtributos().size()==0) {
					enM.getEnsayo().setPais(ensayo.getPais());
					enM.getEnsayo().setCultivo(ensayo.getCultivo());
					enM.getEnsayo().setCampania(ensayo.getCampania());
					enM.getEnsayo().setEpoca(ensayo.getEpoca());
					enM.getEnsayo().setCoordenadaEnsayo_1(ensayo.getCoordenadaEnsayo_1());
					enM.getEnsayo().setCoordenadaEnsayo_2(ensayo.getCoordenadaEnsayo_2());
					enM.getEnsayo().setTipoDeREd(ensayo.getTipode_red());
					// Armamos la ficha del ensayo
					enM.getFichaEnsayo().getAtributos().put("RED", ensayo.getTipode_red());
					enM.getFichaEnsayo().getAtributos().put("Localidad", ensayo.getLocalidad());
					enM.getFichaEnsayo().getAtributos().put("Micro Region", ensayo.getMicroRegion());
					enM.getFichaEnsayo().getAtributos().put("Campañia", ensayo.getCampania());
					enM.getFichaEnsayo().getAtributos().put("Firma", ensayo.getFirma());
					
					enM.getFichaEnsayo().getAtributos().put("Fecha de Siembra", ensayo.getFechaSiembra());
					
					enM.getFichaEnsayo().getAtributos().put("Antecesor", ensayo.getAntecesor());
					enM.getFichaEnsayo().getAtributos().put("Rendimiento Promedio del Ensayo (kg/ha)",ensayo.getPromedio_ensayo());
					f.getAtributos().put("Producto", "Rendimiento (kg/ha)");
					f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
				} 
				if(f.getAtributos().size() < 6 && f.getAtributos().size() >= 2) {
						f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
				}
				if(f.getAtributos().size() == 6 && !ensayoCompleto) {
						enM.getFichaEnsayo().getAtributos().put("Ranking 5 Mejores Productos evaluados", f.getAtributos());
						ensayos.add(enM);
						ensayoCompleto = true;
				}
			}
			if(!ite.hasNext()){
				enM.getFichaEnsayo().getAtributos().put("Ranking 5 Mejores Productos evaluados", f.getAtributos());
				ensayos.add(enM);
			}
		}
	}

	public void procesarRedTerceros(List<EnsayoMapa> ensayos) {
		List<Ensayo> tmp = (List<Ensayo>) servicio.findbyAllParams("TERCEROS");
		Iterator ite = tmp.iterator();
		FichaEnsayo f = null;
		Ensayo ensayo = null;
		String ensayoActual = "";
		EnsayoMapa enM = null;
		while (ite.hasNext()) {
			ensayo = (Ensayo) ite.next();
			if ("TERCEROS".equals(ensayo.getTipode_red().trim()) && !ensayoActual.equals(ensayo.getEnsayo())) {
				ensayoActual = ensayo.getEnsayo();
				enM = new EnsayoMapa();
				if(f==null )
					f = new FichaEnsayo();
				
				if(f.getAtributos().size()==0) {
						f.getAtributos().put("Producto", "Rendimiento (kg/ha)");
						f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
				}
				if (f.getAtributos().size()==2) {//CASO EN EL QUE HAYA UN SOLO GENOTIPO POR ENSAYO
					if (f.getAtributos().size()==2 && enM.getEnsayo().getCultivo()!= null) {
						enM.getFichaEnsayo().getAtributos().put("Ranking Mejores Productos evaluados", f.getAtributos());
						ensayos.add(enM);
						f = new FichaEnsayo();
						f.getAtributos().put("Producto", "Rendimiento (kg/ha)");
						f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
					}
				}
				if (f.getAtributos().size()>=3) {//CASO EN EL QUE HAYA VARIOS GENOTIPOS POR ENSAYO
						enM.getFichaEnsayo().getAtributos().put("Ranking Mejores Productos evaluados", f.getAtributos());
						ensayos.add(enM);
						f = new FichaEnsayo();
						f.getAtributos().put("Producto", "Rendimiento (kg/ha)");
						f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
				}
			}
			if ("TERCEROS".equals(ensayo.getTipode_red().trim()) && ensayoActual.equals(ensayo.getEnsayo())) {
				if (f.getAtributos().size()==2 && enM.getEnsayo().getCultivo()==null) {
					enM.getEnsayo().setPais(ensayo.getPais());
					enM.getEnsayo().setCultivo(ensayo.getCultivo());
					enM.getEnsayo().setCampania(ensayo.getCampania());
					enM.getEnsayo().setEpoca(ensayo.getEpoca());
					enM.getEnsayo().setCoordenadaEnsayo_1(ensayo.getCoordenadaEnsayo_1());
					enM.getEnsayo().setCoordenadaEnsayo_2(ensayo.getCoordenadaEnsayo_2());
					enM.getEnsayo().setTipoDeREd(ensayo.getTipode_red());
					// Armamos la ficha del ensayo
					enM.getFichaEnsayo().getAtributos().put("RED", ensayo.getRed_zonal());
					enM.getFichaEnsayo().getAtributos().put("Localidad", ensayo.getLocalidad());
					enM.getFichaEnsayo().getAtributos().put("Micro Region", ensayo.getMicroRegion());
					enM.getFichaEnsayo().getAtributos().put("Campañia", ensayo.getCampania());
					//enM.getFichaEnsayo().getAtributos().put("Firma", ensayo.getFirma());
					enM.getFichaEnsayo().getAtributos().put("Fecha de Siembra", ensayo.getFechaSiembra());
					
					//enM.getFichaEnsayo().getAtributos().put("Antecesor", ensayo.getAntecesor());
					enM.getFichaEnsayo().getAtributos().put("Rendimiento Promedio del Ensayo (kg/ha)",ensayo.getPromedio_ensayo());
				}else {
					
					f.getAtributos().put(ensayo.getGenotipo(), ensayo.getRendimiento().toString());
				}
					
			}
	
		}
	}	
}