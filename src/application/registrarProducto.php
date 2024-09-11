<?php

/**
 * Clase RegistrarProducto
 * 
 * Esta clase se encarga de registrar un producto en el repositorio.
 */
class RegistrarProducto {
    /**
     * @var RepositorioProducto $repositorio Repositorio de productos.
     */
    private $repositorio;

    /**
     * Constructor de la clase RegistrarProducto.
     * 
     * @param RepositorioProducto $repositorio Repositorio de productos.
     */
    public function __construct(RepositorioProducto $repositorio) {
        $this->repositorio = $repositorio;
    }

    /**
     * Ejecuta el registro de un producto.
     * 
     * Verifica si el código del producto ya existe en el repositorio. Si existe, lanza una excepción.
     * Si no existe, guarda el producto en el repositorio.
     * 
     * @param Producto $producto El producto a registrar.
     * @throws Exception Si el código del producto ya existe.
     */
    public function ejecutar(Producto $producto) {
        if ($this->repositorio->buscarPorCodigo($producto->codigo)) {
            throw new Exception('El código del producto ya existe.');
        }

        $this->repositorio->guardar($producto);
    }
}