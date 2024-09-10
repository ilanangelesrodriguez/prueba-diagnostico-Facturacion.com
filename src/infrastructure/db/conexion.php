<?php

class Conexion {
    private static $conexion = null;

    public static function conectar() {
        if (self::$conexion == null) {
            $dsn = 'pgsql:host=ep-long-river-a595nnbd.us-east-2.aws.neon.tech;dbname=prueba-diagnostico;sslmode=require';
            $username = 'prueba-diagnostico_owner';
            $password = '2FdVkCwrxv6R';
            try {
                self::$conexion = new PDO($dsn, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::ejecutarScriptSQL('./script.sql');
            } catch (PDOException $e) {
                throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }

    private static function ejecutarScriptSQL($archivo) {
        if (file_exists($archivo)) {
            $script = file_get_contents($archivo);
            try {
                self::$conexion->exec($script);
            } catch (PDOException $e) {
                throw new Exception("Error al ejecutar el script SQL: " . $e->getMessage());
            }
        } else {
            throw new Exception("El archivo de script SQL no existe: " . $archivo);
        }
    }
}