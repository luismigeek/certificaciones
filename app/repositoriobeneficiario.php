<?php

class RepositorioBeneficiario
{
	public static function insertar_beneficiario($conexion, $beneficiario){
		$beneficiarioInsertado = false;

		if (isset($conexion)) {
			try {
				$sql = "INSERT INTO beneficiario (ben_tipo, ben_id, ben_lugarexp, ben_name, ben_ape, ben_fechanac, ben_celular, ben_proyecto, ben_desc, ben_objgen, ben_objesp, ben_email) values (:tipo, :id, :lugarexp, :name, :ape, :fechanac, :celular, :proyecto, :desc, :objgen, :objesp, :email)";

				$sentencia = $conexion->prepare($sql);

				$tipo = $beneficiario->obtenerTipo();
				$id = $beneficiario->obtenerId();
				$lugarexp = $beneficiario->obtenerLugarexp();
				$name = $beneficiario->obtenerName();
				$ape = $beneficiario->obtenerApe();
				$fechanac = $beneficiario->obtenerFechanac();
				$celular = $beneficiario->obtenerCelular();
				$email = $beneficiario->obtenerEmail();
				$proyecto = $beneficiario->obtenerProyecto();
				$desc = $beneficiario->obtenerDesc();
				$objgen = $beneficiario->obtenerObjgen();
				$objesp = $beneficiario->obtenerObjesp();

				$sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
				$sentencia->bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia->bindParam(':lugarexp', $lugarexp, PDO::PARAM_STR);
				$sentencia->bindParam(':name', $name, PDO::PARAM_STR);
				$sentencia->bindParam(':ape', $ape, PDO::PARAM_STR);
				$sentencia->bindParam(':fechanac', $fechanac, PDO::PARAM_STR);
				$sentencia->bindParam(':celular', $celular, PDO::PARAM_STR);
				$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia->bindParam(':proyecto', $proyecto, PDO::PARAM_STR);
				$sentencia->bindParam(':desc', $desc, PDO::PARAM_STR);
				$sentencia->bindParam(':objgen', $objgen, PDO::PARAM_STR);
				$sentencia->bindParam(':objesp', $objesp, PDO::PARAM_STR);

				$beneficiarioInsertado = $sentencia->execute();

				$beneficiarioInsertado = true;
			} catch (PDOException $e) {
				print "ERROR" . $e->getMessage();
			}
		}
		return $beneficiarioInsertado; //true o false
	}

	public static function obtnerbeneficarioporemail($email, $conexion){
		$beneficiario = null;

		if (isset($conexion)) {

			try {
				include_once "beneficiario.inc.php";
				$sql = "SELECT * FROM beneficiario where ben_email = :email";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetch();

				if (!empty($resultado)) {
					$beneficiario = new Beneficiario($resultado["ben_tipo"], $resultado["ben_id"], $resultado["ben_lugarexp"], $resultado["ben_name"], $resultado["ben_ape"], $resultado["ben_fechana"], $resultado["ben_celular"], $resultado["ben_email"], $resultado["ben_proyecto"], $resultado["ben_desc"], $resultado["ben_objgen"], $resultado["ben_objesp"]);
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
				die();
			}
		}

		return $beneficiarioInsertado;
	}

	public static function obtenerBeneficiarioPorId($id, $tipo, $conexion){

		$beneficiario = null;

		if (isset($conexion)) {

			try {

				include_once "clases/beneficiario.php";

				$sql = "SELECT * FROM beneficiario where ben_id = :id AND ben_tipo = :tipo";
				$sentencia = $conexion->prepare($sql);

				$sentencia->bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);

				$sentencia->execute();
				$resultado = $sentencia->fetch();

				if (!empty($resultado)) {
					$beneficiario = new Beneficiario($resultado["ben_tipo"], $resultado["ben_id"], $resultado["ben_lugarexp"], $resultado["ben_name"], $resultado["ben_ape"], $resultado["ben_fechanac"], $resultado["ben_celular"], $resultado["ben_email"], $resultado["ben_proyecto"], $resultado["ben_desc"], $resultado["ben_objgen"], $resultado["ben_objesp"]);
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
				die();
			}
		}
		return $beneficiario;
	}

	public static function idExiste($conexion, $id){

		$idExiste = true;

		if (isset($conexion)) {

			try {

				$sql = "SELECT * FROM beneficiario where ben_id = :id";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetchAll();

				if (count($resultado)) {
					$idExiste = true;
				} else {
					$idExiste = false;
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
			}
		}

		return $idExiste;
	}
	
	public static function emailExiste($conexion, $email){

		$emailExiste = true;

		if (isset($conexion)) {

			try {

				$sql = "SELECT * FROM beneficiario where ben_email = :email";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetchAll();

				if (count($resultado)) {
					$emailExiste = true;
				} else {
					$emailExiste = false;
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
			}
		}

		return $emailExiste;
	}
}
