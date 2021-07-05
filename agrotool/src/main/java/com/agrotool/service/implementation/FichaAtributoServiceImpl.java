package com.agrotool.service.implementation;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Service;

import com.agrotool.commons.GenericServiceImpl;
import com.agrotool.entities.FichaAtributos;
import com.agrotool.repository.dao.intefaces.IFichaAtributosRepository;

@Service
public class FichaAtributoServiceImpl extends GenericServiceImpl<FichaAtributos,String> {
	
	
	@Autowired
	IFichaAtributosRepository fichaAtrRep;

	
	public FichaAtributos getAtributosFichaSoja() {
		//return fichaAtrRep.getAtributosFichaSoja();
		return null;
	}

	@Override
	public CrudRepository<FichaAtributos, String> getDao() {
		// TODO Auto-generated method stub
		return null;
	}

}
