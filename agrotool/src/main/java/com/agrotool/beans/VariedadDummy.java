package com.agrotool.beans;

import java.util.HashMap;

import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.context.annotation.Configuration;

import lombok.Getter;
import lombok.Setter;

@Configuration
@EnableAutoConfiguration
@Getter @Setter
public class VariedadDummy {
	private int id;
	private String marca;//DM arg + DM br + DM usa + Brasmax br + Neogen br + Virtue usa + Mustang usa + Illinois arg
    private String pais;
	private String nombre;
	private String cultivo;
	private Boolean nuevo;
	private String campania;
	private String gid;
	
	private String technology;
	///private String instance;
	
	private HashMap<?, ?> imagesGrilla; //Listado de Variedades //BOLSA-MAPA 
	private Ficha ficha;
	private String linkFicha;
	private String linkOfertaPublica;
	private String linkCatalogo;
	private String linkEcommerce;
	private String resumenFooter;

}
