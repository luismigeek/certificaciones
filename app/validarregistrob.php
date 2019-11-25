<?php
include_once "repositoriobeneficiario.php";

class ValidadorRegistrob
{
	private $tipo;
	private $id;
	private $lugarexp;
	private $name;
	private $ape;
	private $fechana;
	private $celular;
	private $email;
	private $proyecto;
	private $desc;
	private $objgen;
	private $objesp;

	private $ErrorTipo;
	private $ErrorId;
	private $ErrorLugarexp;
	private $ErrorName;
	private $ErrorApe;
	private $ErrorFechana;
	private $ErrorCelular;
	private $ErrorEmail;
	private $ErrorProyecto;
	private $ErrorDesc;
	private $ErrorObjgen;
	private $ErrorObjesp;


	public function __construct($tipo, $id, $lugarexp, $name, $ape, $fechana, $celular, $email, $proyecto, $desc, $objgen, $objesp, $conexion){

		$this->tipo = "";
		$this->id = "";
		$this->lugarexp = "";
		$this->name = "";
		$this->ape = "";
		$this->fechana = "";
		$this->celular = "";
		$this->email = "";
		$this->proyecto = "";
		$this->desc = "";
		$this->objgen = "";
		$this->objesp = "";

		$this->ErrorTipo = $this->validarTipo($tipo);
		$this->ErrorId	= $this->validarId($id, $conexion);
		$this->ErrorLugarexp = $this->validarLugarexp($lugarexp);
		$this->ErrorName = $this->validarName($name);
		$this->ErrorApe = $this->validarApe($ape);
		$this->ErrorFechana = $this->validarFechana($fechana);
		$this->ErrorCelular = $this->validarCelular($celular);
		$this->ErrorEmail = $this->validarEmail($email, $conexion);
		$this->ErrorProyecto = $this->validarProyecto($proyecto);
		$this->ErrorDesc = $this->validarDesc($desc);
		$this->ErrorObjgen = $this->validarObjgen($objgen);
		$this->ErrorObjesp = $this->validarObjesp($objesp);
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
			return "Debe seleccionar un tipo de documento";
		} else {
			$this->tipo = $tipo;
		}
		return "";
	}

	private function validarId($id, $conexion){
		if (!$this->variableIniciada($id)) {
			return "Debe ingresar su número de identificación";
		} else {
			$this->id = $id;
		}

		if (strlen($id) < 6) {
			return "La identificacion debe tener al menos 6 caracteres";
		}

		if (strlen($id) > 25) {
			return "La identificacion no debe superar los 30 caracteres";
		}

		if (RepositorioBeneficiario::idExiste($conexion, $id)) {
			return "El numero de identificación ingresado ya está registrado con otro nombre de usuario";
		}
		return "";
	}

	private function validarLugarexp($lugarexp){

		if (!$this->variableIniciada($lugarexp)) {
			return "Debe ingresar el lugar de expedición de su documento de identidad";
		} else {
			$this->lugarexp = $lugarexp;
		}
		return "";
	}

	private function validarName($name){
		if (!$this->variableIniciada($name)) {
			return "Debe ingresar su nombre";
		} else {
			$this->name = $name;
		}
		return "";
	}

	private function validarApe($ape){

		if (!$this->variableIniciada($ape)) {
			return "Debe ingresar su apellido";
		} else {
			$this->ape = $ape;
		}
		return "";
	}

	private function validarFechana($fechana){
		if (!$this->variableIniciada($fechana)) {
			return "Debe ingresar su fecha de nacimiento";
		} else {
			$this->fechana = $fechana;
		}
		return "";
	}

	private function validarCelular($celular){

		if (!$this->variableIniciada($celular)) {
			return "Debe ingresar su numero de celular";
		} else {
			$this->celular = $celular;
		}
		return "";
	}

	private function validarEmail($email, $conexion){

		if (!$this->variableIniciada($email)) {
			return "Debe ingresar su correo electrónico";
		} else {
			$this->email = $email;
		}

		if (RepositorioBeneficiario::emailExiste($conexion, $email)) {
			return "El correo ingresado ya se encuentra en uso";
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			return "Este correo ($email) no es válido, ejemplo: email@gmail.com";
		}

		return "";
	}

	private function validarProyecto($proyecto){

		if (!$this->variableIniciada($proyecto)) {
			return "Debe ingresar el nombre del proyecto";
		} else {
			$this->proyecto = $proyecto;
		}
		return "";
	}

	private function validarDesc($desc){
		if (!$this->variableIniciada($desc)) {
			return "Debe ingresar la descripcion del proyecto";
		} else {
			$this->desc = $desc;
		}
		return "";
	}

	private function validarObjgen($objgen){
		if (!$this->variableIniciada($objgen)) {
			return "Debe ingresar el objetivo general del proyecto";
		} else {
			$this->objgen = $objgen;
		}
		return "";
	}

	private function validarObjesp($objesp){
		if (!$this->variableIniciada($objesp)) {
			return "Debe ingresar los objetivos especificos del proyecto";
		} else {
			$this->objesp = $objesp;
		}
		return "";
	}


	# MEtodos para obtener variables

	public function obtenerTipo(){
		return $this->tipo;
	}

	public function obtenerId()	{
		return $this->id;
	}

	public function obtenerLugarexp()	{
		return $this->lugarexp;
	}

	public function obtenerName()	{
		return $this->name;
	}

	public function obtenerApe()	{
		return $this->ape;
	}

	public function obtenerFechana()	{
		return $this->fechana;
	}

	public function obtenerCelular()	{
		return $this->celular;
	}

	public function obtenerEmail()	{
		return $this->email;
	}

	public function obtenerProyecto()	{
		return $this->proyecto;
	}

	public function obtenerDesc()	{
		return $this->desc;
	}

	public function obtenerObjgen()	{
		return $this->objgen;
	}

	public function obtenerObjesp()	{
		return $this->objesp;
	}

	//GETTERS ERRORES

	public function obtenerErrorTipo(){
		return $this->ErrorTipo;
	}

	public function obtenerErrorId(){
		return $this->ErrorId;
	}

	public function obtenerErrorLugarexp(){
		return $this->ErrorLugarexp;
	}

	public function obtenerErrorName(){
		return $this->ErrorName;
	}

	public function obtenerErrorApe(){
		return $this->ErrorApe;
	}

	public function obtenerErrorFechana(){
		return $this->ErrorFechana;
	}

	public function obtenerErrorCelular(){
		return $this->ErrorCelular;
	}

	public function obtenerErrorEmail(){
		return $this->ErrorEmail;
	}

	public function obtenerErrorProyecto(){
		return $this->ErrorProyecto;
	}

	public function obtenerErrorDesc(){
		return $this->ErrorDesc;
	}

	public function obtenerErrorObjgen(){
		return $this->ErrorObjgen;
	}

	public function obtenerErrorObjesp(){
		return $this->ErrorObjesp;
	}

	//////////////////////////////////////////////////////////////////////


	public function registroValido(){

		if (
			empty($this->ErrorApe) &&
			empty($this->ErrorCelular) &&
			empty($this->ErrorDesc) &&
			empty($this->ErrorEmail) &&
			empty($this->ErrorFechana) &&
			empty($this->ErrorId) &&
			empty($this->ErrorLugarexp) &&
			empty($this->ErrorName) &&
			empty($this->ErrorObjesp) &&
			empty($this->ErrorObjgen) &&
			empty($this->ErrorProyecto) &&
			empty($this->ErrorTipo)
		) {
			return true;
		} else {
			return false;
		}
	}
}
