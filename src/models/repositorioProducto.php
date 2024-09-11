<?php
/**
 * Interfaz RepositorioProducto
 *
 * Esta interfaz define los métodos necesarios para interactuar con el repositorio de productos.
 */
interface RepositorioProducto {
    /**
     * Guarda un producto en el repositorio.
     *
     * @param Producto $producto El producto a guardar.
     * @return void
    */
    public function guardar(Producto $producto);

    /**
     * Busca un producto en el repositorio por su código.
     *
     * @param mixed $codigo El código del producto a buscar.
     * @return Producto|null El producto encontrado o null si no se encuentra.
     */
    public function buscarPorCodigo($codigo);
}
