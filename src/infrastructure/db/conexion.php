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
            } catch (PDOException $e) {
                throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}