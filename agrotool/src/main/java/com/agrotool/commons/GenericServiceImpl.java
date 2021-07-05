package com.agrotool.commons;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Service;

import com.agrotool.commons.GenericServiceI;

@Service
public abstract class GenericServiceImpl<T, ID extends Serializable> implements GenericServiceI<T,ID>{

	@Override
	public T save(T entity) {
		
		return getDao().save(entity);
	}
	
	
	@Override
	public void delete(ID id) {
		getDao().deleteById(id);
		
	}

	@Override
	public T get(ID id) {
		Optional<T> obj = getDao().findById(id);
		if(obj.isPresent()) {
			return obj.get();
		}
		return null;
	}

	@Override
	public List<T> getAll() {
		List<T> retList = new ArrayList<>();
		getDao().findAll().forEach(obj -> retList.add(obj));
		return retList;
	}
	
	public abstract CrudRepository<T, ID> getDao();

}
