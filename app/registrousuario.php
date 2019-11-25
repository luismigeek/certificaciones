<?php

include_once 'config.php';
include_once 'conexion.php';
include_once 'clases/usuario.php';
include_once 'repositoriousuario.php';
include_once 'validarregistro.php';


Conexion::abrirConexion();

$validador = new ValidadorRegistro($_POST['tipo'], $_POST['id'], $_POST['name'], $_POST['ape'], $_POST['cel'], $_POST['usuario'], $_POST['email'], htmlspecialchars($_POST['pass']), htmlspecialchars($_POST['pass2']), Conexion::obtenerConexion());

if ($validador->registroValido()) {

	$usuario = new usuario($validador->obtenerTipo(), $validador->obtenerId(), $validador->obtenerName(), $validador->obtenerApe(), $validador->obtenerCel(), $validador->obtenerUsu(), $validador->obtenerEmail(), password_hash($validador->obtenerPass(), PASSWORD_BCRYPT));
	$insertar_usuario = repositoriousuario::insertarUsuario(Conexion::obtenerConexion(), $usuario);

	if ($insertar_usuario) {
		echo "Insertado";
	} else {
		echo "No insertado";
	}

} else {
	$error = array(
		'errorTipo' =>  $validador->obtenerErrorTipo(),
		'errorId' =>  $validador->obtenerErrorId(),
		'errorName' =>  $validador->obtenerErrorName(),
		'errorApe' =>  $validador->obtenerErrorApe(),
		'errorCel' =>  $validador->obtenerErrorCel(),
		'errorUsu' => $validador->obtenerErrorUsu(),
		'errorEmail' =>  $validador->obtenerErrorEmail(),
		'errorPass1' =>  $validador->obtenerErrorPass1(),
		'errorPass2' =>  $validador->obtenerErrorPass2()
	);

	$msg = "No se pudo registrar el usuario por los siguientes motivos: <br><br>";
	foreach ($error as $key => $value) {
		if (!empty($value)) {
			$msg = $msg . $value . '. <br>';
		}
	}
	echo $msg;
	//echo json_encode($error);
}

Conexion::cerrarConexion();