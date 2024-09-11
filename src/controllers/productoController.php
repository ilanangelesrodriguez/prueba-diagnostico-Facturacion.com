<?php

require_once '../infrastructure/db/conexion.php';
require_once '../models/producto.php';
require_once '../infrastructure/repositories/postgresProductoRepo.php';

/**
 * Controlador para el registro de productos.
 * 
 * Este script maneja la solicitud POST para registrar un nuevo producto en la base de datos.
 * Realiza las validaciones necesarias y guarda el producto utilizando el repositorio de productos.
 */

// Conectar a la base de datos
$conexion = Conexion::conectar();

// Crear una instancia del repositorio de productos
$repositorio = new PostgresProductoRepo();

try {
    // Obtener los datos del producto desde la solicitud POST
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $id_bodega = $_POST['bodega'];
    $id_sucursal = $_POST['sucursal'];
    $id_moneda = $_POST['moneda'];
    $materiales = isset($_POST['materiales']) ? $_POST['materiales'] : [];

    // Crear una instancia del producto
    $producto = new Producto($codigo, $nombre, $precio, $descripcion, $id_bodega, $id_sucursal, $id_moneda, $materiales);

    // Guardar el producto en la base de datos
    $repositorio->guardar($producto);

    // Devolver una respuesta JSON indicando éxito
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Devolver una respuesta JSON indicando error
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}