<?php

require_once '../models/producto.php';
require_once '../infrastructure/repositories/postgresProductoRepo.php';
require_once '../application/registrarProducto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $bodega = $_POST['bodega'] ?? null;
    $sucursal = $_POST['sucursal'] ?? null;
    $moneda = $_POST['moneda'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $materiales = isset($_POST['materiales']) && is_array($_POST['materiales']) ? implode(',', $_POST['materiales']) : null;
    $descripcion = $_POST['descripcion'] ?? null;

    $producto = new Producto(
        $codigo,
        $nombre,
        $bodega,
        $sucursal,
        $moneda,
        $precio,
        $materiales,
        $descripcion
    );

    try {
        $repositorio = new PostgresProductoRepo();
        $registrarProducto = new RegistrarProducto($repositorio);
        $registrarProducto->ejecutar($producto);

        echo json_encode(['mensaje' => 'Producto registrado exitosamente']);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}