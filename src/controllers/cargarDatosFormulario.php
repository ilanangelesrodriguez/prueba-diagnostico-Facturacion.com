<?php

require_once '../infrastructure/db/conexion.php';

/**
 * Script para cargar datos del formulario.
 * 
 * Este script se conecta a la base de datos y obtiene los datos necesarios para
 * llenar los campos del formulario de productos, como bodegas, sucursales, monedas y materiales.
 * Luego, devuelve estos datos en formato JSON.
 */

// Conectar a la base de datos
$conexion = Conexion::conectar();

// Obtener datos de las bodegas
$bodegas = $conexion->query("SELECT id, nombre_bodega FROM bodegas")->fetchAll(PDO::FETCH_ASSOC);

// Obtener datos de las sucursales
$sucursales = $conexion->query("SELECT id, nombre_sucursal, id_bodega FROM sucursales")->fetchAll(PDO::FETCH_ASSOC);

// Obtener datos de las monedas
$monedas = $conexion->query("SELECT id, nombre_moneda FROM monedas")->fetchAll(PDO::FETCH_ASSOC);

// Obtener datos de los materiales
$materiales = $conexion->query("SELECT id, nombre_material FROM materiales")->fetchAll(PDO::FETCH_ASSOC);

// Devolver los datos en formato JSON
echo json_encode([
    'bodegas' => $bodegas,
    'sucursales' => $sucursales,
    'monedas' => $monedas,
    'materiales' => $materiales
]);