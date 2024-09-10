<?php

require_once '../models/repositorioProducto.php';
require_once '../infrastructure/db/conexion.php';

class PostgresProductoRepo implements RepositorioProducto {
    public function guardar(Producto $producto) {
        $conexion = Conexion::conectar();
        $query = "INSERT INTO productos (codigo, nombre, bodega, sucursal, moneda, precio, materiales, descripcion) 
                  VALUES (:codigo, :nombre, :bodega, :sucursal, :moneda, :precio, :materiales, :descripcion)";
        $stmt = $conexion->prepare($query);
        $stmt->execute([
            'codigo' => $producto->codigo,
            'nombre' => $producto->nombre,
            'bodega' => $producto->bodega,
            'sucursal' => $producto->sucursal,
            'moneda' => $producto->moneda,
            'precio' => $producto->precio,
            'materiales' => $producto->materiales,
            'descripcion' => $producto->descripcion,
        ]);
    }

    public function buscarPorCodigo($codigo) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM productos WHERE codigo = :codigo";
        $stmt = $conexion->prepare($query);
        $stmt->execute(['codigo' => $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
