<?php

require "../../modelos/cliente.php";
include_once '../templates/header.php';
$_GET['cli_codigo'] = filter_var(base64_decode($_GET['cli_codigo']), FILTER_SANITIZE_NUMBER_INT);

$Eliminar = new Cliente($_GET);


try {

    $clienteEliminar = $Eliminar->elimnar();

    $modficar = $clienteNuevo->modificar();

    $resultado = [
        'mensaje' => 'CLIENTE MODIFICADO CORRECTAMENTE',
        'codigo' => 1
    ];

} catch (PDOException $pe) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO ERROR EN LA EJECUCION',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}

