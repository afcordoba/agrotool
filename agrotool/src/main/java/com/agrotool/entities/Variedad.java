package com.agrotool.entities;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;
import org.hibernate.annotations.NotFound;
import org.hibernate.annotations.NotFoundAction;

import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@Entity
@Getter @Setter  @ToString
@Table(name = "Variedad")
public class Variedad implements Serializable{
	 
	private static final long serialVersionUID = 1L;
	
	@Id
	@GeneratedValue(strategy=GenerationType.AUTO, generator="native")
	@GenericGenerator(name="native",strategy="native")
	private Long id;

	@Column
	private String marca;
	@Column
	private String pais;	
	@Column
	private String nombre;
	@Column
	private String cultivo;
	@Column
	private String ciclo;
	@Column
	private String grupo_madurez;
	@Column
	private String tecnologia;
	@Column
	private String nuevo;
	@Column
	private String campania;
	@Column
	private String gid;
	@Column
	private String grilla_img_uno;
	@Column
	private String grilla_img_dos;
	@Column
	private String imagenFicha;
	@Column
	private String tecnologiasFicha;
	@Column
	private String linkFicha;
	@Column
	private String linkOfertaPublica;
    @Column
    private String linkCatalogo;
    @Column
    private String linkEcommerce;
    @Column
    private String resumenFooter;
    @Column
    private Integer orden_visualizacion;
     
	/*
	 * @OneToOne(cascade = CascadeType.ALL)
	 * 
	 * @JoinColumn(name = "ficha_soja_atr_id") FichaSojaAtributos fAtributos;
	 */
    
    @OneToOne(fetch = FetchType.LAZY)
    @NotFound(action = NotFoundAction.IGNORE)
	@JoinColumn(name = "id")
	FichaAtributos ficha_labels;
    
    @OneToOne(fetch = FetchType.LAZY)
    @NotFound(action = NotFoundAction.IGNORE)
	@JoinColumn(name = "id")
	FichaValues ficha_values;
     
    
}
