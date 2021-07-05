package com.agrotool.repository.dao.intefaces;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.agrotool.entities.Usuario;

@Repository
public interface IUserRepository extends JpaRepository<Usuario, Integer>  {
    public Usuario findByUsuario(String username);
}