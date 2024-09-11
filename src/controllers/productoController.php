<?php

require_once '../infrastructure/db/conexion.php';
require_once '../models/producto.php';
require_once '../infrastructure/repositories/postgresProductoRepo.php';

$conexion = Conexion::conectar();
$repositorio = new PostgresProductoRepo();

try {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $id_bodega = $_POST['bodega'];
    $id_sucursal = $_POST['sucursal'];
    $id_moneda = $_POST['moneda'];
    $materiales = isset($_POST['materiales']) ? $_POST['materiales'] : [];

    $producto = new Producto($codigo, $nombre, $precio, $descripcion, $id_bodega, $id_sucursal, $id_moneda, $materiales);
    $repositorio->guardar($producto);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}