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
@Table(name = "ficha_soja_values")
public class FichaValues implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;
	@Column
	private String val1;
	@Column
	private String val2;	
	@Column
	private String val3;
	@Column
	private String val4;
	@Column
	private String val5;
	@Column
	private String val6;
	@Column
	private String val7;
	@Column
	private String val8;
	@Column
	private String val9;
	@Column
	private String val10;
	@Column
	private String val11;
	@Column
	private String val12;
	@Column
	private String val13;
	@Column
	private String val14;
	@Column
	private String val15;
	@Column
	private String val16;
	@Column
	private String val17;
	@Column
	private String val18;

}
