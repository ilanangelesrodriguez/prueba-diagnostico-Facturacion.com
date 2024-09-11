<?php

require_once __DIR__ . '/../db/conexion.php';
require_once '../models/repositorioProducto.php';

/**
 * Clase PostgresProductoRepo
 * 
 * Implementación del repositorio de productos utilizando PostgreSQL.
 */
class PostgresProductoRepo implements RepositorioProducto {
    /**
     * Guarda un producto en la base de datos.
     * 
     * Inserta un nuevo producto en la tabla `productos` y sus materiales asociados en la tabla `producto_materiales`.
     * 
     * @param Producto $producto El producto a guardar.
     * @throws Exception Si ocurre un error al guardar el producto.
     */
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

    /**
     * Busca un producto por su código.
     * 
     * Consulta la base de datos para encontrar un producto con el código especificado.
     * 
     * @param string $codigo El código del producto a buscar.
     * @return array|false Los datos del producto si se encuentra, o false si no se encuentra.
     */
    public function buscarPorCodigo($codigo) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM productos WHERE codigo_producto = :codigo";
        $stmt = $conexion->prepare($query);
        $stmt->execute(['codigo' => $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}