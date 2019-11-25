<?php

include_once "repositoriousuario.php";

class ValidadorRegistro
{

	private $tipo;
	private $id;
	private $name;
	private $ape;
	private $cel;
	private $usu;
	private $email;
	private $pass;

	private $errorTipo;
	private $errorId;
	private $errorName;
	private $errorApe;
	private $errorCel;
	private $errorUsu;
	private $errorEmail;
	private $errorPass1;
	private $errorPass2;

	public function __construct($tipo, $id, $name, $ape, $cel, $usu, $email, $pass1, $pass2, $conexion){

		$this->tipo = "";
		$this->id = "";
		$this->name = "";
		$this->ape = "";
		$this->cel = "";
		$this->usu = "";
		$this->email = "";
		$this->pass = "";


		$this->errorTipo = $this->validarTipo($tipo);
		$this->errorId = $this->validarId($id, $conexion);
		$this->errorName = $this->validarName($name);
		$this->errorApe = $this->validarApe($ape);
		$this->errorCel = $this->validarCel($cel);
		$this->errorUsu = $this->validarUsu($usu, $conexion);
		$this->errorEmail = $this->validarEmail($email, $conexion);
		$this->errorPass1 = $this->validarPass1($pass1);
		$this->errorPass2 = $this->validarPass2($pass1, $pass2);

		if ($this->errorPass1 === "" && $this->errorPass2 === "") {
			$this->pass = $pass1;
		}
	}

	private function variableIniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}


	# Metodos para validar campos

	private function validarTipo($tipo){

		if (!$this->variableIniciada($tipo)) {
			return "Ingrese el tipo de documento";
		} else {
			$this->tipo = $tipo;
		}
		return "";
	}

	private function validarId($id, $conexion){

		if (!$this->variableIniciada($id)) {
			return "Ingrese Id de Usuario";
		} else {
			$this->id = $id;
		}

		if (strlen($id) < 7) {
			return "La identificacion debe tener al menos 7 caracteres";
		}

		if (strlen($id) > 10) {
			return "La identificacion no debe superar los 10 caracteres";
		}

		if (RepositorioUsuario::idExiste($conexion, $id)) {
			return "El ya está registrado con otro nombre de usuario";
		}
		return "";
	}

	private function validarName($name){

		if (!$this->variableIniciada($name)) {
			return "Ingrese su primer nombre";
		} else {
			$this->name = $name;
		}
		return "";
	}

	private function validarApe($ape){

		if (!$this->variableIniciada($ape)) {
			return "Ingrese su Apellido";
		} else {
			$this->ape = $ape;
		}
		return "";
	}

	private function validarCel($cel){

		if (!$this->variableIniciada($cel)) {
			return "Ingrese su numero de celular";
		} else {
			$this->cel = $cel;
		}
		return "";
	}

	private function validarUsu($usu, $conexion){

		if (!$this->variableIniciada($usu)) {
			return "Ingrese un nombre de usuario por favor";
		} else {
			$this->usu = $usu;
		}

		if (strlen($usu) < 6) {
			return "El nombre de usuario debe contener al menos 6 caracteres";
		}

		if (strlen($usu) > 12) {
			return "El nombre de usuario no debe superar los 12 caracteres";
		}

		if (RepositorioUsuario::usuExiste($conexion, $usu)) {
			return "El nombre ya está en uso, por favor ingrese otro nombre de usuario";
		}

		return "";
	}

	private function validarEmail($email, $conexion){

		if (!$this->variableIniciada($email)) {
			return "Ingrese su correo por favor";
		} else {
			$this->email = $email;
		}

		if (RepositorioUsuario::emailExiste($conexion, $email)) {
			return "El correo ya se encuentra en uso";
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			return "Este correo ($email) no es válido, ejemplo: email@gmail.com";
		}

		return "";
	}

	private function validarPass1($pass){

		if (!$this->variableIniciada($pass)) {
			return "Ingrese su contraseña antes de continuar";
		}

		if (strlen($pass) < 6) {
			return "Por tu seguridad la contraseña debe contener al menos 6 caracteres";
		}

		if ($this->usu === $pass) {
			return "Por tu seguridad el nombre no debe ser igual a tu contraseña";
		}

		return "";
	}

	private function validarPass2($pass1, $pass2){


		if (!$this->variableIniciada($pass1)) {
			return "Ingrese primero su contraseña";
		}

		if (!$this->variableIniciada($pass2)) {
			return "Repita su contraseña";
		}

		if ($pass1 !== $pass2) {
			return "Las contraseñas no son iguales";
		}

		return "";
	}


	# Metodos para obtener datos

	public function obtenerTipo() {
		return $this->tipo;
	}

	public function obtenerId()	{
		return $this->id;
	}

	public function obtenerName() {
		return $this->name;
	}

	public function obtenerApe() {
		return $this->ape;
	}

	public function obtenerCel() {
		return $this->cel;
	}

	public function obtenerUsu() {
		return $this->usu;
	}

	public function obtenerEmail() {
		return $this->email;
	}

	public function obtenerPass() {
		return $this->pass;
	}


	# Metodos para obtener errores

	public function obtenerErrorTipo() {
		return $this->errorTipo;
	}

	public function obtenerErrorId() {
		return $this->errorId;
	}

	public function obtenerErrorName() {
		return $this->errorName;
	}

	public function obtenerErrorApe() {
		return $this->errorApe;
	}

	public function obtenerErrorCel() {
		return $this->errorCel;
	}

	public function obtenerErrorUsu() {
		return $this->errorUsu;
	}

	public function obtenerErrorEmail() {
		return $this->errorEmail;
	}

	public function obtenerErrorPass1() {
		return $this->errorPass1;
	}

	public function obtenerErrorPass2() {
		return $this->errorPass2;
	}

	//////////////////////////////////////////////////////////////////////


	public function registroValido() {
		if (
			$this->errorTipo === "" && $this->errorId === "" && $this->errorName === "" && $this->errorApe === "" && $this->errorCel === "" && $this->errorUsu === "" && $this->errorEmail === "" && $this->errorPass1 === "" && $this->errorPass2 === "") {
			return true;
		} else {
			return false;
		}
	}

}
