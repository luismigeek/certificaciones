<?php

class RepositorioUsuario
{

	public static function insertarUsuario($conexion, $usuario){

		$usuarioInsertado = false;

		if (isset($conexion)) {
			try {
				$sql = "INSERT INTO usuario (usuario_id, usuario_name, usuario_ape, usuario_cel, usuario_usu, usuario_email, usuario_pass, usuario_tipo) values (:id, :name, :ape, :cel, :usu, :email, :pass, :tipo)";

				$sentencia = $conexion->prepare($sql);

				$tipo = $usuario->obtenerTipo();
				$id = $usuario->obtenerId();
				$name = $usuario->obtenerName();
				$ape = $usuario->obtenerApe();
				$cel = $usuario->obtenerCel();
				$usu = $usuario->obtenerUsu();
				$email = $usuario->obtenerEmail();
				$pass = $usuario->obtenerPass();

				$sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
				$sentencia->bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia->bindParam(':name', $name, PDO::PARAM_STR);
				$sentencia->bindParam(':ape', $ape, PDO::PARAM_STR);
				$sentencia->bindParam(':cel', $cel, PDO::PARAM_STR);
				$sentencia->bindParam(':usu', $usu, PDO::PARAM_STR);
				$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia->bindParam(':pass', $pass, PDO::PARAM_STR);

				$usuarioInsertado = $sentencia->execute();
				$usuarioInsertado = true;
			} catch (PDOException $e) {
				print "ERROR" . $e->getMessage();
			}
		}
		return $usuarioInsertado; //true o false

	}

	public static function obtnerusuarioporemail($email, $conexion){

		$usuario = null;

		if (isset($conexion)) {

			try {

				include_once "clases/usuario.php";
				$sql = "SELECT * FROM usuario where usuario_email = :email";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['usuario_tipo'], $resultado["usuario_id"], $resultado["usuario_name"], $resultado["usuario_ape"], $resultado["usuario_cel"], $resultado["usuario_usu"], $resultado["usuario_email"], $resultado["usuario_pass"]);
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
				die();
			}
		}
		return $usuario;
	}

	public static function idExiste($conexion, $id){

		$idExiste = true;

		if (isset($conexion)) {

			try {

				$sql = "SELECT * FROM usuario where usuario_id = :id";
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

	public static function usuExiste($conexion, $usu){

		$usuExiste = true;

		if (isset($conexion)) {

			try {

				$sql = "SELECT * FROM usuario where usuario_usu = :usu";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':usu', $usu, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetchAll();

				if (count($resultado)) {
					$usuExiste = true;
				} else {
					$usuExiste = false;
				}
			} catch (PDOException $e) {
				print "ERROR " . $e->getMessage();
			}
		}

		return $usuExiste;
	}

	public static function emailExiste($conexion, $email){

		$emailExiste = true;

		if (isset($conexion)) {

			try {

				$sql = "SELECT * FROM usuario where usuario_email = :email";
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
