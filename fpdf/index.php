<?php

$datos = array(
    'nombre' => 'Error en el nombre',
    'apellido' => 'Error en el apellido',
    'ciudad' => '',
    'edad' => 'Error en la edad'
); 

$datosJSON = json_encode($datos);

$msg = "No se pudo registrar el usuario por los siguientes motivos: <br>";

foreach ($datos as $key => $value) {
    if (!empty($value)) {
        $msg = $msg . $value . '.<br>';
    }
}

echo $msg;