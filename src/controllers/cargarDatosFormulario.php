<?php

require_once '../infrastructure/db/conexion.php';

$conexion = Conexion::conectar();

$bodegas = $conexion->query("SELECT id, nombre_bodega FROM bodegas")->fetchAll(PDO::FETCH_ASSOC);
$sucursales = $conexion->query("SELECT id, nombre_sucursal, id_bodega FROM sucursales")->fetchAll(PDO::FETCH_ASSOC);
$monedas = $conexion->query("SELECT id, nombre_moneda FROM monedas")->fetchAll(PDO::FETCH_ASSOC);
$materiales = $conexion->query("SELECT id, nombre_material FROM materiales")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'bodegas' => $bodegas,
    'sucursales' => $sucursales,
    'monedas' => $monedas,
    'materiales' => $materiales
]);