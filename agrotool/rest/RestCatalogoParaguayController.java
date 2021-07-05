package com.gdm.services.rest;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.gdm.commons.beans.Catalogo;
import com.gdm.commons.beans.Ficha;
import com.gdm.commons.beans.VariedadDummy;

@RestController
@RequestMapping("/catalogoParaguay")
public class RestCatalogoParaguayController {
		
	@GetMapping
	public List<Catalogo> listar(){
		List<Catalogo> listado = new ArrayList<Catalogo>();
		Catalogo catalogo = new Catalogo();
		catalogo.setId(1);
		catalogo.setInstancia("LAS");
		catalogo.setVariedades(new ArrayList<VariedadDummy>());
		
		
		
		VariedadDummy v1 = new VariedadDummy();
		v1.setId(1);
		v1.setMarca("DM PARAGUAY");
		v1.setPais("PARAGUAY");
		v1.setCultivo("SOJA");
		v1.setNombre("IPRO DM 60i62");
		v1.setNuevo(true);
		v1.setCampania("20/2021");
		v1.setGid("");
	//	v1.setImagesGrilla(imgGrilla1);
		
	//	v1.setFicha(f1);
		v1.setLinkFicha("");
		v1.setLinkOfertaPublica("https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf");
		v1.setLinkCatalogo("https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		v1.setResumenFooter("La variedad IPRO de mayor potencial de rendimiento. Buen porte vegetativo y excelente comportamiento frente a vuelco. Destacado comportamiento en fechas de siembra desde fines de septiembre y octubre. 1. Datos promedio zona centro - este. Fechas de siembra a fines de septiembre. 2. Datos promedio zona norte, fechas de siembra de principios de septiembre. 3. Datos promedio zona Chaco Paraguayo. 4.1. Sin susceptibilidad al vuelco. 5. Cancro del tallo (Diaporthe phaseolorum Vsr. Meridionalis). Test de invernáculo metodo del pasillo. 6. Resistente (Gen RPS 1K), este gen le confiere cultivar a la resistencia frente a las razas 17, 18, 21 - 24, 26, 36, 37 y 42 - 44 . INTACTA RR2 PRO es marca registrada del Grupo Bayer.");
		
		
		VariedadDummy v2 = new VariedadDummy();
		v2.setId(2);
		v2.setMarca("DM ARGENTINA");
		v2.setPais("ARGENTINA");
		v2.setCultivo("SOJA");
		v2.setNombre("DM 46i20 IPRO STS *");
		v2.setCampania("20/2021");
		v2.setNuevo(true);
	//	v2.setImagesGrilla(imgGrilla2);
		
	//	v2.setFicha(f2);
		v2.setLinkFicha("https://www.donmario.com/catalogo-soja-maiz-trigo/soja/dm-46i20-ipro-sts/");
		v2.setLinkOfertaPublica("https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf");
		v2.setLinkCatalogo("https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		v2.setResumenFooter("Zona núcleo sojera, oeste, centro y sur de Bs. As. Ambientes de alta productividad del centro-sur de Córdoba y centro-sur de Santa Fe.\n" + 
				"1) Zona norte de Buenos Aires 2) Zona centro de Córdoba y Entre Ríos 3) Zona NEA y NOA 4) 1: Sin susceptibilidad al vuelco, 10 máxima susceptibilidad al vuelco 5) Cancro del tallo (Diaporthe phaseolorum Var. Meridionalis). Test de invernáculo, método del palillo (Inta Marcos Juarez). 7) Gen Rps 1k: Este gen le confiere al cultivar la resistencia frente a las razas Phytophtora 1-11, 13-15, 17, 18, 21-24, 26, 36, 37 y 42-44.\n" + 
				"\n" + 
				"INTACTA RR2 PRO y Roundup Ready son marcas registradas de propiedad del Grupo Bayer.\n" + 
				"\n" + 
				"STS © es una marca registrada de Du Pont usada bajo licencia por Asociados Don Mario S.A. y sus afiliadas en Argentina.\n" + 
				"\n" + 
				"* La variedad se encuentran en trámite de inscripción ante el Registro Nacional de Cultivares dependiente del INASE y será comercializada únicamente una vez concluida dicha inscripción. Para información actualizada, consultar el Catálogo Nacional de Cultivares disponible en el sitio web del INASE.");
	
		
		
		
		VariedadDummy v3 = new VariedadDummy();
		v3.setId(3);
		v3.setMarca("DM ARGENTINA");
		v3.setPais("ARGENTINA");
		v3.setCultivo("MAIZ");
		v3.setNombre("DM 2738 MGRR2");
		v3.setCampania("20/2021");
		v3.setNuevo(true);
		//v3.setFicha(f3);
		v3.setLinkFicha("https://www.donmario.com/catalogo-soja-maiz-trigo/maiz/dm-2738-mgrr2");
		v3.setLinkOfertaPublica("");
		v3.setLinkCatalogo("https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		v3.setResumenFooter("Especialmente recomendado para los planteos de media y baja productividad: Bs. As., centro y sur de Santa Fe, centro y sur de Córdoba, La Pampa y Entre Ríos. Buen comportamiento en siembras tardías o de segunda en provincia de Bs. As. y sur de Santa Fe.  a) Datos del norte de Bs. As. en fechas tempranas. b) Datos del norte de Bs. As. en fechas tardías. c) Datos del NOA. (*) Escala de 1 a 5. 1 tolerante y 5 susceptible.\n" + 
				"\n" + 
				"VT Triple PRO, Roundup Ready 2 y sus respectivos logos son marcas registradas del Grupo Bayer.");
		
		
		VariedadDummy v4 = new VariedadDummy();
		v4.setId(4);
		v4.setMarca("DM ARGENTINA");
		v4.setPais("ARGENTINA");
		v4.setCultivo("TRIGO");
		v4.setNombre("DM PEHUÉN");
		v4.setCampania("20/2021");
		v4.setNuevo(false);
	//	v4.setFicha(f4);
		v4.setLinkFicha("https://www.donmario.com/catalogo-soja-maiz-trigo/trigo/dm-pehuen");
		v4.setLinkOfertaPublica("https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf");
		v4.setLinkCatalogo("https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		v4.setResumenFooter("(*) Datos provenientes de subregion II sur. (**) Datos provenientes de Region IV. (***) Datos de la campaña 2018-19.\n" + 
				"\n" + 
				"");
		
		
		
		
		
		
		
		
		Ficha f1 = new Ficha();
		
		HashMap<String, Object> hm1 = new HashMap<String, Object>();
		hm1.put("Ciclo", "IV medio");
		hm1.put("Hábito de Crecimiento", "Indeterminado");
		hm1.put("Días desde Emergencia a R8", "146(1)");
		hm1.put("Potencial de Ramificación", "Alta");
		hm1.put("Susceptibilidad al Vuelco (1 a 10) (4)", "2");
		hm1.put("Peso Promedio de 1000 Semillas (g)", new Integer(160));
		hm1.put("Color de Pubescencia", "Castaña clara");
		hm1.put("Color de Flor", "Blanca");
		hm1.put("Altura de Planta (cm)", "112");
		hm1.put("Cancro del Tallo (5)", "Resistente");
		hm1.put("Phytophthora (6)", "Susceptible a Raza 1");
		hm1.put("Mancha Ojo de Rana (MOR)", "Susceptible");
		
		
		HashMap<String, Object> imgGrilla1 = new HashMap<String, Object>();
		imgGrilla1.put("mapaGrilla", "mapa.jpg");
		imgGrilla1.put("bolsa", "bolsa.jpg");
		
		HashMap<String, Object> img1 = new HashMap<String, Object>(); //CORRESPONDIENTE A LA FICHA
		img1.put("mapaFicha", "mapa.jpg");
		img1.put("tecnologias", "rr2.jpg");
		
		f1.setAtributos(hm1);
		f1.setImages(img1);
		

		
		
		Ficha f2 = new Ficha();
		
		HashMap<String, Object> img2 = new HashMap<String, Object>(); //CORRESPONDIENTE A LA FICHA
		img2.put("mapaFicha", "mapa.jpg");
		img2.put("tecnologias", "rr2.jpg");
		
		HashMap<String, Object> hm2 = new HashMap<String, Object>();
		hm2.put("Ciclo", "IV medio");
		hm2.put("Hábito de Crecimiento", "Indeterminado");
		hm2.put("Días desde Emergencia a R8", "147(1)");
		hm2.put("Potencial de Ramificación", "Alta");
		hm2.put("Susceptibilidad al Vuelco (1 a 10) (4)", "2");
		hm2.put("Peso Promedio de 1000 Semillas (g)", new Integer(168));
		hm2.put("Color de Pubescencia", "Castaña clara");
		hm2.put("Color de Flor", "Púrpura");
		hm2.put("Altura de Planta (cm)", "114");
		hm2.put("Cancro del Tallo (5)", "Resistente");
		hm2.put("Phytophthora (6)", "Susceptible a Raza 1");
		hm2.put("Mancha Ojo de Rana (MOR)", "Susceptible");

		
		f2.setAtributos(hm2);
		f2.setImages(img2);
		
		HashMap<String, Object> imgGrilla2 = new HashMap<String, Object>();
		imgGrilla2.put("mapaGrilla", "mapa.jpg");
		imgGrilla2.put("bolsa", "bolsa.jpg");
		
		
		
		////////////////////////////////////////////////////////////////////////////////////
		///MAIZ
		
		Ficha f3 = new Ficha();
		
		HashMap<String, Object> hm3 = new HashMap<String, Object>();
		hm3.put("Ciclo y Cruzamiento", "Intermedio y simple");
		hm3.put("Tipo de Grano", "Semi-dentado anaranjado");
		hm3.put("Peso Promedio de 1000 granos", new Integer(300));
		hm3.put("Días a Floración", "78(a) 64(b)");
		hm3.put("Madurez Relativa", "119");
		hm3.put("Vuelco (*)", "2");
		hm3.put("Altura de Planta (cm)", "238 (a)");
		hm3.put("Peso Promedio de 1000 Semillas (g)", new Integer(160));
		hm3.put("Altura de Planta (cm)", "112");
		hm3.put("Inserción de Espiga (cm)", "97(a)");
		hm3.put("Roya (*)", "3");
		hm3.put("Mal del Río IV (*)", "3");
		hm3.put("Tizón (*)", "4");
		
		HashMap<String, Object> img3 = new HashMap<String, Object>(); //CORRESPONDIENTE A LA FICHA
		img3.put("mapaFicha", "mapa.jpg");
		img3.put("tecnologias", "rr2.jpg");
		
		f3.setAtributos(hm3);
		f3.setImages(img3);
		
		
////////////////////////////////////////////////////////////////////////////////////
///TRIGO

		Ficha f4 = new Ficha();
		
		HashMap<String, Object> hm4 = new HashMap<String, Object>();
		hm4.put("Ciclo", "Intermedio");
		hm4.put("Porte Vegetativo", "Erecto");
		hm4.put("Peso Promedio de 1000 granos", new Integer(35));
		hm4.put("Macollaje", "Medio");
		hm4.put("Desgrane", "Muy bueno");
		hm4.put("Vuelco", "Muy Bueno");
		hm4.put("Heladas en Pasto", "Regular");
		hm4.put("Requerimiento de Frío", "Bajo");
		hm4.put("Grupo de Calidad", "2");
		hm4.put("Altura (cm) (**)", "87 (*) 84 (**)");
		hm4.put("Roya del Tallo", "Moderadamente tolerante");
		hm4.put("Roya de la Hoja", "Moderadamente tolerante");
		hm4.put("Roya amarilla", "Moderadamente tolerante");
		hm4.put("Dreschlera", "Moderadamente susceptible");
		hm4.put("Septoria", "Moderadamente susceptible");
		hm4.put("Fusarium", "Moderadamente susceptible");
		
		
		HashMap<String, Object> img4 = new HashMap<String, Object>(); //CORRESPONDIENTE A LA FICHA
		img4.put("mapaFicha", "mapa.jpg");
		img4.put("tecnologias", "rr2.jpg");
		
		
		f4.setAtributos(hm4);
		f4.setImages(img4);
		
		
		
		
		/////////////////////SOJA BOLIVIA
		
		Ficha f5 = new Ficha();
		
		HashMap<String, Object> hm5 = new HashMap<String, Object>();
		hm5.put("Hábito de crecimiento", "Indeterminado");
		hm5.put("Ciclo", "Corto/Intermedio");
		hm5.put("Ciclo total (días desde siembra a R8) (1)(2)", "93(1) 99(2)");
		hm5.put("Altura de Planta (cm)(1)", "95");
		hm5.put("Potencial de Ramificación", "Alto");
		hm5.put("Susceptibilidad al vuelco (1 a 10)(3)", "2");
		hm5.put("Peso Promedio de 1000 Semillas (g)", "130 – 160");
		hm5.put("Color de pubescencia/color de flor", "Gris / Blanca");
		hm5.put("Cancro del tallo (4)", "Resistente");
		hm5.put("Phytophthora (5)", "Susceptible a raza");
		hm5.put("Mancha ojo de rana (MOR)", "Susceptible");
		hm5.put("Mancha Anillada", "Moderadamente Susceptible");
		
		HashMap<String, Object> img5 = new HashMap<String, Object>(); //CORRESPONDIENTE A LA FICHA
		img5.put("mapaFicha", "mapa.jpg");
		img5.put("tecnologias", "rr2.jpg");
		
		f5.setAtributos(hm5);
		f5.setImages(img5);
		
		VariedadDummy v5 = new VariedadDummy();
		v5.setId(5);
		v5.setMarca("DM BOLIVIA");
		v5.setPais("BOLIVIA");
		v5.setCultivo("SOJA");
		v5.setNombre("DM POTENCIA RR");
		v5.setCampania("20/2021");
		v5.setNuevo(true);
		v5.setFicha(f5);
		v5.setLinkFicha("https://www.donmario.com/bolivia/bolivia-catalogo/potencia-bo/");
		v5.setLinkOfertaPublica("https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf");
		v5.setLinkCatalogo("https://donmario.com/wp-content/uploads/DM-catalogo-2020-BAJA-Def-este.pdf");
		v5.setResumenFooter("Porte vegetativo defensivo. Variedad con excelente estabilidad. Destacado comportamiento en ambientes B y C en zona Este y Centro.\n" + 
				"Tolerante al herbicida Glifosato.");
		
		
		
/////////////////////SOJA PARAGUAY
		
		Ficha f6 = new Ficha();

		HashMap<String, Object> hm6 = new HashMap<String, Object>();
		hm6.put("Ciclo", "Semi Precoz");
		hm6.put("Hábito de crecimiento", "Indeterminado");
		hm6.put("Días desde emergencia a R3 (1)(2)(3)", "53(1) 56(2)");
		hm6.put("Ciclo total (días desde siembra a R8)(1)(2)", "119(1) 122(4)");
		hm6.put("Altura de planta (cm)(1)(2)", "106(3) 103(4)");
		hm6.put("Potencial de Ramificación", "Medio");
		hm6.put("Susceptibilidad al vuelco (1 a 10)(4)", "2");
		hm6.put("Peso promedio de 1000 semillas (g)", "155-170");
		hm6.put("Color de pubescencia/color de flor", "Gris / Violeta");
		hm6.put("Cancro del Tallo (5)", "Resistente");
		hm6.put("Phytophthora (6)", "Resistente a raza 1");
		hm6.put("Mancha Ojo de Rana (MOR)", "Resistente");
		
		
		f6.setAtributos(hm6);
		//f6.setImages(img5);
		
		VariedadDummy v6 = new VariedadDummy();
		v6.setId(6);
		v6.setMarca("DM PARAGUAY");
		v6.setPais("PARAGUAY");
		v6.setCultivo("SOJA");
		v6.setNombre("DM 6.8i");
		v6.setCampania("20/2021");
		v6.setNuevo(false);
		v6.setFicha(f6);
		v6.setLinkFicha("https://www.donmario.com/paraguay/paraguay-catalogo/dm-6-8i-sts-py/");
		//v6.setLinkOfertaPublica("https://donmario.com/wp-content/uploads/Oferta-Pu%CC%81blica.pdf"); //EN PARAGUAY NO TIENE OFERTA PUBLICA
		v6.setLinkCatalogo("https://www.donmario.com/wp-content/uploads/DM-catalogo-2018-PARAGUAY_web.pdf");
		v6.setResumenFooter("Plasticidad vegetativa, muy buen comportamiento frente al vuelco. Altísimo potencial de rendimiento en su grupo de madurez.\n" + 
				"Tolerante al herbicida Glifosato.");
		
		
		
		
		
		catalogo.getVariedades().add(v1);
		catalogo.getVariedades().add(v2);
		catalogo.getVariedades().add(v3);
		catalogo.getVariedades().add(v4);
		catalogo.getVariedades().add(v5);
		catalogo.getVariedades().add(v6);
		listado.add(catalogo);
		
		return listado;
	}
}
