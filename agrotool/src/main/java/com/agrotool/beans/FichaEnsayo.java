package com.agrotool.beans;

import java.io.Serializable;
import java.util.LinkedHashMap;

import lombok.Getter;
import lombok.Setter;

@Getter @Setter
public class FichaEnsayo implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private LinkedHashMap<String,Object> atributos;
	
	public FichaEnsayo() {
		atributos = new LinkedHashMap<String,Object>();

	}

}
