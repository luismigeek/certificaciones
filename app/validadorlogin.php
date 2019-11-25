<?php

include_once 'config.php';
include_once 'conexion.php';
include_once 'repositoriousuario.php';

class validadorlogin{

	private $usuario;

	private $error;

	public function __construct($email, $pass, $conexion){
		$this->error = "";

		if ($this->variable_inciada($email) || $this->variable_inciada($pass)) {

			$this->usuario = repositoriousuario::obtnerusuarioporemail($email, $conexion);

			if (is_null($this->usuario) || !password_verify($pass, $this->usuario->obtenerPass())) {
				$this->error = "Datos Incorrectos";
			}

		} else {
			$this->usuario = null;
			$this->error = "Sus datos ingresados no son Correctos";
		}
	}

	private function variable_inciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}

	public function obtnenerUsuario(){
		return $this->usuario;
	}

	public function obtenerError(){
		return $this->error;
	}
}
