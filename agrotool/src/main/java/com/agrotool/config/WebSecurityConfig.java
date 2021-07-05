package com.agrotool.config;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;

import com.agrotool.service.implementation.UserDetailsServiceImpl;

//import com.ageia.loginSecurity.service.UserDetailsServiceImpl;

@Configuration
@EnableWebSecurity
public class WebSecurityConfig extends WebSecurityConfigurerAdapter {
	
	@Autowired
	private UserDetailsServiceImpl userDetailService;
	
	
	@Autowired
	private BCryptPasswordEncoder bcrypt;

	// Crea el encriptador de contraseñas
	//El numero 4 representa que tan fuerte quieres la encriptacion.
	//Se puede en un rango entre 4 y 31. 
	//Si no pones un numero el programa utilizara uno aleatoriamente cada vez
	//que inicies la aplicacion, por lo cual tus contrasenas encriptadas no funcionaran bien
	
	@Bean
	public BCryptPasswordEncoder passwordEncoder() {
		BCryptPasswordEncoder bCryptPasswordEncoder = new BCryptPasswordEncoder();
		return bCryptPasswordEncoder;
	}
	
	
	
	
	
	// Necesario para evitar que la seguridad se aplique a los resources
	// Como los css, imagenes y javascripts
	String[] resources = new String[] { "/include/**", "/css/**", "/icons/**", "/img/**", "/js/**", "/layer/**" };

	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.authorizeRequests().antMatchers(resources).permitAll().antMatchers("/", "/index").permitAll()
				.antMatchers("/admin*").access("hasRole('ADMIN')").antMatchers("/user*")
				.access("hasRole('USER') or hasRole('ADMIN')").anyRequest().authenticated().and().formLogin()
				.loginPage("/login").permitAll().defaultSuccessUrl("/dashboard").failureUrl("/login?error=true")
				.usernameParameter("username").passwordParameter("password").and().logout().permitAll()
				.logoutSuccessUrl("/login?logout");


	}
	
	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.userDetailsService(userDetailService).passwordEncoder(bcrypt);
	}
	
	
	
	 
	
	@Autowired
    public void configureGlobal(AuthenticationManagerBuilder auth) throws Exception { 
    	//Especificar el encargado del login y encriptacion del password
        auth.userDetailsService(userDetailsService()).passwordEncoder(passwordEncoder());
    }
	
	
//	@Autowired
//	UserDetailsServiceImpl userDetailsService;

	// Registra el service para usuarios y el encriptador de contrasena
//	@Autowired
//	public void configureGlobal(AuthenticationManagerBuilder auth) throws Exception {

		// Setting Service to find User in the database.
		// And Setting PassswordEncoder
//		auth.userDetailsService(userDetailsService).passwordEncoder(passwordEncoder());
//	}
}
