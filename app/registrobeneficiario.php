<?php

include_once 'config.php';
include_once 'conexion.php';
include_once 'clases/beneficiario.php';
include_once 'repositoriobeneficiario.php';
include_once 'validarregistrob.php';

Conexion::abrirConexion();

$validador = new ValidadorRegistrob($_POST['tipo'], $_POST['id'], $_POST['lugarexp'], $_POST['name'], $_POST['ape'], $_POST['fechanac'], $_POST['celular'], $_POST['email'], $_POST['proyecto'], $_POST['desc'], $_POST['objgen'], $_POST['objesp'], Conexion::obtenerConexion());

if ($validador->registroValido()) {

	$beneficiario = new beneficiario($validador->obtenerTipo(), $validador->obtenerId(), $validador->obtenerLugarexp(), $validador->obtenerName(), $validador->obtenerApe(), $validador->obtenerFechana(), $validador->obtenerCelular(), $validador->obtenerEmail(), $validador->obtenerProyecto(), $validador->obtenerDesc(), $validador->obtenerObjgen(), $validador->obtenerObjesp());
	$insertar_beneficiario = repositoriobeneficiario::insertar_beneficiario(Conexion::obtenerConexion(), $beneficiario);

	if ($insertar_beneficiario) {
		echo "Insertado";
	} else {
		echo "No insertado";
	}
} else {
	$error = $arrayName = array(
		'errorTipo' 	=> $validador->obtenerErrorTipo(),
		'errorId' 		=> $validador->obtenerErrorId(),
		'errorLugarExp' => $validador->obtenerErrorLugarexp(),
		'errorName'	 	=> $validador->obtenerErrorName(),
		'errorApe' 		=> $validador->obtenerErrorApe(),
		'errorFechana'	=> $validador->obtenerErrorFechana(),
		'errorCel' 		=> $validador->obtenerErrorCelular(),
		'errorEmail' 	=> $validador->obtenerErrorEmail(),
		'errorProtecto' => $validador->obtenerErrorProyecto(),
		'errorDesc'		=> $validador->obtenerErrorDesc(),
		'errorObjgen'	=> $validador->obtenerErrorObjgen(),
		'errorObjesp'	=> $validador->obtenerErrorObjesp()
	);

	$msg = "No se pudo registrar el beneficiario por los siguientes motivos: <br><br>";
	foreach ($error as $key => $value) {
		if (!empty($value)) {
			$msg = $msg . $value . '. <br>';
		}
	}
	echo $msg;
	//	echo json_encode($error);
}

Conexion::cerrarConexion();
