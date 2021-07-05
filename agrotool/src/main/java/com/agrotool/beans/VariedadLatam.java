package com.agrotool.beans;

import java.io.Serializable;


import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@Getter @Setter  @ToString
public class VariedadLatam implements Serializable{

	private static final long serialVersionUID = 1L;

	private String marca;
	
	private String pais;	
	
	private String nombre;
	
	private String cultivo;
	
	private String ciclo;
	
	private String grupo_madurez;
	
	private String tecnologia;
	
	private String nuevo;
	
	private String campania;
	
	private String gid;
	
	private String grilla_img_uno;
	
	private String grilla_img_dos;
	
	private String imagenFicha;
	
	private String tecnologiasFicha;
	
	private String linkFicha;
	
	private String linkOfertaPublica;
    
    private String linkCatalogo;
    
    private String linkEcommerce;
    
    private String resumenFooter;
    
    private Integer orden_visualizacion;
    
    //private FichaLatam ficha;
    
    private FichaLatam ficha;
    
}
