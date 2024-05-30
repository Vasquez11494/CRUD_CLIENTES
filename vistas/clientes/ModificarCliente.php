<?php
require "../../modelos/cliente.php";

$_GET['cli_codigo'] = filter_var( base64_decode($_GET['cli_codigo']), FILTER_SANITIZE_NUMBER_INT);

$modificar = new Cliente();
$ClienteModificar = $modificar->buscarID($_GET['cli_codigo']);

// var_dump($ClienteModificar);