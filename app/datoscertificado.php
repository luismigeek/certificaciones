<?php

include_once 'config.php';
include_once 'conexion.php';
include_once 'repositoriobeneficiario.php';

Conexion::abrirConexion();

$tipo_certificacion = $_POST["tipo_cer"];
$tipo_documento = $_POST["tipo_doc"];
$identificacion = $_POST["numero"];

$val = validarId($identificacion, Conexion::obtenerConexion());


if (is_bool($val) && $val) {


    $ben = RepositorioBeneficiario::obtenerBeneficiarioPorId($identificacion, $tipo_documento, Conexion::obtenerConexion());

    if (is_null($ben)) {
        echo "El numero de identificación no se encontró en la base de datos";
    } else {
        $msg = $ben->obtenerName() . " " . $ben->obtenerApe() . " identificado con C.C. " . $ben->obtenerId() . " de " . $ben->obtenerLugarexp() . ",
         presentó ante la asamblea general el proyecto de: <strong>".$ben->obtenerProyecto()."</strong>. el cual cuenta con nuestro aval 
         y apoyo. Viene siendo desarrollado y evaluado, teniendo en cuenta su plan de actividades. <br><br> La anterior certificación se expide a solicitud del interesado para ser anexada como avances y ser presentada ante 
        el ICETEX, para renovación en el fondo ALVARO ULCUÉ CHOCUÉ. <br><br>";

        echo $msg . " <a href='certificaciones.php?name=" . $ben->obtenerName() . "&ape=" . $ben->obtenerApe() . "&cc=" . $ben->obtenerId() . "&exp=" . $ben->obtenerLugarexp() . "&pro=".$ben->obtenerProyecto()."' 
                        target='_blank' rel='noopener noreferrer'><button>Ver en PDF</button></a>";
    }
} else {
    echo $val;
}

function variableIniciada($variable)
{

    if (isset($variable) && !empty($variable)) {
        return true;
    } else {
        return false;
    }
}


function validarId($id, $conexion)
{

    if (!variableIniciada($id)) {
        return "Debe ingresar su número de identificación";
    }

    if (strlen($id) < 7) {
        return "La identificacion debe tener al menos 7 caracteres";
    }

    if (strlen($id) > 10) {
        return "La identificacion no debe superar los 10 caracteres";
    }

    if (!RepositorioBeneficiario::idExiste($conexion, $id)) {
        return "El numero de identificación no se encontró en la base de datos";
    }

    return true;
}
