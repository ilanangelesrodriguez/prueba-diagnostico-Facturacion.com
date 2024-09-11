<?php

require_once __DIR__ . '/../db/conexion.php';
require_once '../models/repositorioProducto.php';

class PostgresProductoRepo implements RepositorioProducto {
    public function guardar(Producto $producto) {
        $conexion = Conexion::conectar();
        $query = "INSERT INTO productos (codigo_producto, nombre_producto, precio, descripcion, id_bodega, id_sucursal, id_moneda) 
                  VALUES (:codigo, :nombre, :precio, :descripcion, :id_bodega, :id_sucursal, :id_moneda)";
        $stmt = $conexion->prepare($query);
        $stmt->execute([
            'codigo' => $producto->codigo,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'descripcion' => $producto->descripcion,
            'id_bodega' => $producto->id_bodega,
            'id_sucursal' => $producto->id_sucursal,
            'id_moneda' => $producto->id_moneda,
        ]);

        $producto_id = $conexion->lastInsertId();
        foreach ($producto->materiales as $material_id) {
            $query = "INSERT INTO producto_materiales (id_producto, id_material) VALUES (:id_producto, :id_material)";
            $stmt = $conexion->prepare($query);
            $stmt->execute(['id_producto' => $producto_id, 'id_material' => $material_id]);
        }
    }

    public function buscarPorCodigo($codigo) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM productos WHERE codigo_producto = :codigo";
        $stmt = $conexion->prepare($query);
        $stmt->execute(['codigo' => $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}