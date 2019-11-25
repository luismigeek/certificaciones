<?php
class Usuario {

	private $tipo;
	private $id;
	private $name;
	private $ape;
	private $cel;
	private $usu;
	private $email;
	private $pass;
	
	public function __construct ($tipo, $id, $name, $ape, $cel, $usu, $email, $pass ){
		$this->tipo = $tipo;
		$this->id = $id;
		$this->name = $name;
		$this->ape = $ape;
		$this->cel = $cel;
		$this->usu = $usu;
		$this->email = $email;
		$this->pass = $pass;

	}

	public function obtenerTipo(){
		return $this->tipo;
	}

	public function obtenerId(){
		return $this->id;
	}

	public function obtenerName(){
		return $this->name;
	}

	public function obtenerApe(){
		return $this->ape;
	}

	public function obtenerCel(){
		return $this->cel;
	}

	public function obtenerUsu(){
		return $this->usu;
	}

	public function obtenerEmail(){
		return $this->email;
	}

	public function obtenerPass(){
		return $this->pass;
	}
}
?>
