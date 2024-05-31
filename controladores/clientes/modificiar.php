<?php

require '../../modelos/cliente.php';

$_POST['cli_codigo'] = filter_var($_POST['cli_codigo'], FILTER_VALIDATE_INT);
$_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
$_POST['cli_apellido'] = htmlspecialchars($_POST['cli_apellido']);
$_POST['cli_nit'] = filter_var($_POST['cli_nit'], FILTER_VALIDATE_INT);
$_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);

if ($_POST['cli_nombre'] == '' || $_POST['cli_apellido' == ''] || $_POST['cli_nit'] == '' || $_POST['cli_telefono'] == '') {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
     
        $clienteNuevo = new  cliente($_POST);

        $modficar = $clienteNuevo->modificar();

        $resultado = [
            'mensaje' => 'PRODUCTO MODIFICADO CORRECTAMENTE',
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
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }

}