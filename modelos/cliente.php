<?php
require "conexion.php";

class  Cliente extends Conexion {
    public $cli_codigo;
    public $cli_nombre;
    public $cli_apellido;
    public $cli_nit;
    public $cli_situacion;

    public function __construct($args = [])
    {
        $this->cli_codigo = $args['cli_id'] ?? null;
        $this->cli_nombre = $args['cli_nombre'] ?? '';
        $this->cli_apellido = $args['cli_apellido'] ?? '';
        $this->cli_nit = $args ['cli_nit'] ?? 00;
        $this->cli_situacion = $args['cli_situacion'] ?? 1;
    }
}