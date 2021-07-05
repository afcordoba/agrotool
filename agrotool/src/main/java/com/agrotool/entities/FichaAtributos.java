package com.agrotool.entities;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;


import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@Entity
@Getter @Setter  @ToString
@Table(name = "ficha_soja_atributos")

public class FichaAtributos implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;
	@Column
	private String atr_uno;
	@Column
	private String atr_dos;	
	@Column
	private String atr_tres;
	@Column
	private String atr_cuatro;
	@Column
	private String atr_cinco;
	@Column
	private String atr_seis;
	@Column
	private String atr_siete;
	@Column
	private String atr_ocho;
	@Column
	private String atr_nueve;
	@Column
	private String atr_diez;
	@Column
	private String atr_once;
	@Column
	private String atr_doce;
	@Column
	private String atr_trece;
	@Column
	private String atr_catorce;
	@Column
	private String art_quince;
	@Column
	private String atr_dieciseis;
	@Column
	private String atr_diecisiete;
	@Column
	private String atr_dieciocho;
	
	
	
	
	
	
	
}
