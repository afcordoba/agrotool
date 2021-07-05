package com.gdm.services.rest;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import com.gdm.entities.Variedad;
import com.gdm.service.implementation.VariedadServiceImpl;

@RestController
public class RestCatalogoLatamController {

	@Autowired
	VariedadServiceImpl service;
	
	
	@GetMapping("api/variedades")
	@ResponseBody
	public List<Variedad> findAll(){
		return service.getAll();
	}
	
}
