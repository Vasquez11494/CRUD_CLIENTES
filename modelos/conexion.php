<?php

abstract class Conexion{

    protected static $conexion = null;

    protected static function conectar() : PDO{
        try {
            self::$conexion = new PDO ("informix:host=192.168.73.71; service=9088;database=curso_656751; server=MV015_tcp; protocol=onsoctcp;EnableScrollableCursors=1", "656751", "656751");
            self:: $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "No hay conexion ala Base de Datoss <br>";
            echo $e->getMessage();
            self::$conexion = null;
            return null;
            exit;
        }

    }
}