package com.agrotool.beans;


import java.io.Serializable;
import java.util.LinkedHashMap;

import lombok.Getter;
import lombok.Setter;

@Getter @Setter
public class FichaLatam implements Serializable {
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private LinkedHashMap<String,String> atributos;
	
	public FichaLatam() {
		atributos = new LinkedHashMap<String,String>();
		
	}
}
