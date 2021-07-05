package com.agrotool.entities;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;

import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@Entity
@Getter @Setter  @ToString
@Table(name = "mapa_ensayos")
public class Ensayo implements Serializable{
	 
	private static final long serialVersionUID = 1L;
	@Id
	@GeneratedValue(strategy=GenerationType.AUTO, generator="native")
	@GenericGenerator(name="native",strategy="native")
	private Long id;
	
	@Column
	private String Cultivo;
	@Column
	private String Pais;	
	@Column
	private String tipode_red;
	@Column
	private String red_zonal;
	@Column
	private String Localidad_pbs;
	@Column
	private String Localidad;
	@Column
	private String MicroRegion;
	@Column
	private String firma;
	@Column
	private String FechaSiembra;
	@Column
	private String Antecesor;
	@Column
	private Integer promedio_ensayo;
	@Column
	private String Campania;
	@Column
	private String MacroRegion;
	@Column
	private String Epoca;
	@Column
	private String CoordenadaEnsayo_1;
    @Column
    private String CoordenadaEnsayo_2;
    @Column
    private String Genotipo;
    @Column
    private Integer Rendimiento;
    @Column
	private String ensayo;
}
