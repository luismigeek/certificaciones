<?php

class Beneficiario{

	private $tipo;
	private $id;
	private $lugarexp;
	private $name;
	private $ape;
	private $fechanac;
	private $celular;
	private $email;
	private $proyecto;
	private $desc;
	private $objgen;
	private $objesp;

	public function __construct($tipo, $id, $lugarexp, $name, $ape, $fechana, $celular, $email, $proyecto, $desc, $objgen, $objesp){
	
		$this->tipo = $tipo;
		$this->id = $id;
		$this->lugarexp = $lugarexp;
		$this->name = $name;
		$this->ape = $ape;
		$this->fechanac = $fechana;
		$this->celular = $celular;
		$this->email = $email;
		$this->proyecto = $proyecto;
		$this->desc = $desc;
		$this->objgen = $objgen;
		$this->objesp = $objesp;
	}

	public function obtenerTipo() {
		return $this->tipo;
	}

	public function obtenerId()	{
		return $this->id;
	}

	public function obtenerLugarexp() {
		return $this->lugarexp;
	}

	public function obtenerName() {
		return $this->name;
	}

	public function obtenerApe() {
		return $this->ape;
	}

	public function obtenerFechanac() {
		return $this->fechanac;
	}

	public function obtenerCelular() {
		return $this->celular;
	}

	public function obtenerEmail(){
		return $this->email;
	}

	public function obtenerProyecto() {
		return $this->proyecto;
	}

	public function obtenerDesc(){
		return $this->desc;
	}

	public function obtenerObjgen(){
		return $this->objgen;
	}

	public function obtenerObjesp(){
		return $this->objesp;
	}
}