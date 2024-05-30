<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
abstract class Conexion
{

    protected static $conexion = null;

    // protected static function conectar(): PDO
    // {
    //     try {
    //         self::$conexion = new PDO("informix:host=192.168.73.71; service=1526; database=curso_656751; server=MV015_tcp; protocol=onsoctcp", "656751", "656751");
    //         self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch (PDOException $e) {
    //         echo "No hay conexion ala Base de Datoss <br>";
    //         echo $e->getMessage();
    //         self::$conexion = null;
    //         exit;
    //     }
    //     return self::$conexion;
    // }
    protected static function conectar(): PDO
    {
        try {
            self::$conexion = new PDO("informix:host=host.docker.internal; service=9088;database=crud_vasquezo; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix", "in4mix");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "CONEXION EXITOSA";
        } catch (PDOException $e) {
            echo "No hay conexion ala Base de Datoss <br>"; 
            echo $e->getMessage();
            self::$conexion = null;
            exit;
        }
        return self::$conexion;
    }

    // METODO PARA EJECUTAR SENTENCIAS SQL

    public function ejecutar($sql)
    {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $idInsertado = $conexion->lastInsertId();
        self::$conexion = null;

        return [
            "resultado" => $resultado,
            "id" => $idInsertado
        ];

    }

    // METODO PARA CONSULTAR INFORMACION
    public function servir($sql)
    {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $datos = [];
        foreach ($data as $k => $v) {
            $datos[] = array_change_key_case($v, CASE_LOWER);
        }
        self::$conexion = null;

        return $datos;

    }
}
