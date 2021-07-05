package com.agrotool.service.implementation;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Service;

import com.agrotool.commons.GenericServiceImpl;
import com.agrotool.entities.Ensayo;
import com.agrotool.entities.VariedadRecomendada;
import com.agrotool.repository.dao.intefaces.IEnsayoRepository;

@Service
public class EnsayoServiceImpl extends GenericServiceImpl<Ensayo,Integer>{

	
	@Autowired
	IEnsayoRepository repo;
	
	@Override
	public CrudRepository<Ensayo, Integer> getDao() {
		//return repo;
		return null;
	}
public List<com.agrotool.beans.Ensayo> findbyAllParameters(String red) {
		
		return repo.findbyAllParams(red);
	}

}
