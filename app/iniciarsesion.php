<?php  

include_once 'config.php';
include_once 'conexion.php';
include_once 'validadorlogin.php';

Conexion::abrirConexion();

$validador = new validadorlogin($_POST['email'], $_POST['pass'], Conexion::obtenerConexion());

if (empty($validador->obtenerError())) {

	$usuario = $validador->obtnenerUsuario(); 

	session_start();
	$_SESSION['usuario'] = $usuario->obtenerName() . ' ' . $usuario->obtenerApe();
	
	echo "<script> 	window.location='index.php'; </script>";
}else{
	echo $validador->obtenerError();
} 

Conexion::cerrarConexion();