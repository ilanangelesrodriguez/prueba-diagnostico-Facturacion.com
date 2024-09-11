<?php

require_once '../infrastructure/db/conexion.php';

/**
 * Script para verificar la unicidad del código de un producto.
 * 
 * Este script se conecta a la base de datos y verifica si un código de producto
 * ya existe en la tabla `productos`. Devuelve un JSON indicando si el código es único.
 */

// Conectar a la base de datos
$conexion = Conexion::conectar();

// Obtener el código del producto desde la solicitud GET
$codigo = $_GET['codigo'];

// Preparar y ejecutar la consulta para contar los productos con el código especificado
$query = $conexion->prepare("SELECT COUNT(*) FROM productos WHERE codigo_producto = :codigo");
$query->execute(['codigo' => $codigo]);
$count = $query->fetchColumn();

// Devolver el resultado en formato JSON
echo json_encode(['unico' => $count == 0]);