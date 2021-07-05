package com.agrotool.services.rest;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import com.agrotool.entities.VariedadRecomendada;
import com.agrotool.service.implementation.RecomendadorServiceImpl;

@RestController

public class RestReomendadorController {
	
	
	
	@Autowired
	RecomendadorServiceImpl service;
	
	
	@GetMapping("api/recomendador")
	@ResponseBody
	
	public List<VariedadRecomendada> findbyAllParameters(@RequestParam String reporte,@RequestParam String pais,@RequestParam String cultivo, @RequestParam String zona ,@RequestParam String tipo_rendimiento,@RequestParam String tipo_climatico) {
		return service.findbyAllParameters(reporte, pais, cultivo, zona, tipo_rendimiento, tipo_climatico);
	}
	
	//http://localhost:8080/api/recomendador/?reporte=recomendador&pais=ARGENTINA&cultivo=soja&zona=NUCLEO&tipo_rendimiento=alto&tipo_climatico=neutro
	
//	public String getCultivo(@RequestParam String cultivo, @RequestParam String pais) {
//	    return "CULTIVO: " + cultivo + ", PAIS:" + pais;
//	}
	
	
	@GetMapping("api/recomendador/porcultivo")
	@ResponseBody
	
	public List<VariedadRecomendada> findbyCultivoPaisZona(@RequestParam String reporte,@RequestParam String pais,@RequestParam String cultivo, @RequestParam String zona) {
		return service.findbyCultivoPaisZona(reporte, pais, cultivo, zona);
	}
	
	//http://localhost:8080/api/recomendador/porcultivo?reporte=recomendador&pais=ARGENTINA&cultivo=soja&zona=NUCLEO

}
