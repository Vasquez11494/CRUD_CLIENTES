<?php

$mensaje = '';
    $nit =  $_POST['cli_nit'];
    // VALIDAR INFORMACION
    $_POST['cli_nombre'] = htmlspecialchars( $_POST['cli_nombre']);
    $_POST['cli_apellido'] = htmlspecialchars( $_POST['cli_apellido']);
    $_POST['cli_precio'] = filter_var( $nit , FILTER_VALIDATE_INT) ;

if($_POST['cli_nombre'] == '' || $_POST['cli_apellido'] == '' ||  $_POST['cli_nit'] < 0 ){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
}else{