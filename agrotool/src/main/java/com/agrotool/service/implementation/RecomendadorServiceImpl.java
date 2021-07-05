package com.agrotool.service.implementation;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Service;

import com.agrotool.commons.GenericServiceImpl;
import com.agrotool.entities.VariedadRecomendada;
import com.agrotool.repository.dao.intefaces.IRecomendadorRepository;

@Service
public class RecomendadorServiceImpl extends GenericServiceImpl<VariedadRecomendada,Integer> {
	
	@Autowired
	IRecomendadorRepository recoRep;

	@Override
	public CrudRepository<VariedadRecomendada, Integer> getDao() {
		// TODO Auto-generated method stub
		return null;
	}

	public List<VariedadRecomendada> findbyAllParameters(String reporte,String pais,String cultivo, String zona ,String tipo_rendimiento,String tipo_climatico) {
		
		return recoRep.findbyAllParams(reporte, pais, cultivo, zona, tipo_rendimiento, tipo_climatico);
	}
	
	public List<VariedadRecomendada> findbyCultivoPaisZona(String reporte,String pais,String cultivo, String zona) {
		
		return recoRep.findbyCultivoPaisZona(reporte, pais, cultivo, zona);
	}

}
