package com.agrotool.entities;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@Entity
@Getter @Setter @NoArgsConstructor @ToString
public class Usuario {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private int id;
	
	@Column
	private String usuario;
	
	
	@Column
	private String password;


	public String getPassword() {
		// TODO Auto-generated method stub
		return null;
	}


	public String getUsuario() {
		// TODO Auto-generated method stub
		return null;
	}
	
}
