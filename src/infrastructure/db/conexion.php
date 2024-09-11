<?php

require_once __DIR__ . '/../repositories/postgresProductoRepo.php';

/**
 * Clase Conexion
 * 
 * Esta clase se encarga de gestionar la conexión a la base de datos utilizando PDO.
 */
class Conexion {
    /**
     * @var PDO|null $conexion Instancia de la conexión a la base de datos.
     */
    private static $conexion = null;

    /**
     * Conecta a la base de datos.
     * 
     * Si no existe una conexión previa, crea una nueva conexión utilizando los parámetros
     * de conexión especificados. Si ya existe una conexión, la reutiliza.
     * 
     * @return PDO La instancia de la conexión a la base de datos.
     * @throws Exception Si ocurre un error al conectar a la base de datos.
     */
    public static function conectar() {
        if (self::$conexion == null) {
            $dsn = 'pgsql:host=ep-long-river-a595nnbd.us-east-2.aws.neon.tech;dbname=prueba-diagnostico;sslmode=require';
            $username = 'prueba-diagnostico_owner';
            $password = '2FdVkCwrxv6R';
            try {
                self::$conexion = new PDO($dsn, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::ejecutarScriptSQL(__DIR__ . '/script.sql');
            } catch (PDOException $e) {
                throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Ejecuta un script SQL desde un archivo.
     * 
     * Lee el contenido del archivo SQL especificado y lo ejecuta en la base de datos.
     * 
     * @param string $archivo Ruta del archivo SQL a ejecutar.
     * @throws Exception Si ocurre un error al ejecutar el script SQL o si el archivo no existe.
     */
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