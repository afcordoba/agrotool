package com.agrotool.beans;

import java.io.Serializable;

import lombok.Getter;
import lombok.Setter;
import lombok.ToString;
@Getter @Setter  @ToString
public class EnsayoMapa implements Serializable{
		
	private static final long serialVersionUID = 1L;

	private Ensayo ensayo;
    
	private FichaEnsayo fichaEnsayo;
	
	public EnsayoMapa() {
		ensayo = new Ensayo();
		fichaEnsayo = new FichaEnsayo(); 
		
	}
		
}
