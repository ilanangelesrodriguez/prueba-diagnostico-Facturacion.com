<?php

require_once '../infrastructure/db/conexion.php';

$conexion = Conexion::conectar();
$codigo = $_GET['codigo'];

$query = $conexion->prepare("SELECT COUNT(*) FROM productos WHERE codigo_producto = :codigo");
$query->execute(['codigo' => $codigo]);
$count = $query->fetchColumn();

echo json_encode(['unico' => $count == 0]);