package com.agrotool.beans;

import java.util.HashMap;

import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.context.annotation.Configuration;

import lombok.Getter;
import lombok.Setter;

@Configuration
@EnableAutoConfiguration
@Getter @Setter
public class Ficha {
		private HashMap<?, ?> atributos;
		private HashMap<?, ?> images;
}
