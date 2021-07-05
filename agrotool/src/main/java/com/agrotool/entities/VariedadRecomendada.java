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
@Table(name = "VariedadRecomendada")
public class VariedadRecomendada implements Serializable {
	
	@Id
	@GeneratedValue(strategy=GenerationType.AUTO, generator="native")
	@GenericGenerator(name="native",strategy="native")
	private Long id;
	
	private static final long serialVersionUID = 1L;
	@Column
	private String cultivo;
	@Column
	private String pais;	
	@Column
	private String zona;
	@Column
	private String tipo_rendimiento;
	@Column
	private String variedad;
	@Column
	private String fecha_siembra;
	@Column
	private String rango_fs;
	@Column
	private String densidad;
	@Column
	private String fecha_pc;
	@Column
	private String dias_r8;
	@Column
	private String tipo_climatico;
	@Column
	private String ver_mas;
	
	@Column
	private String reporte;
	  
	
}
