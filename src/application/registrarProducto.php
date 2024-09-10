<?php

class RegistrarProducto {
    private $repositorio;

    public function __construct(RepositorioProducto $repositorio) {
        $this->repositorio = $repositorio;
    }

    public function ejecutar(Producto $producto) {
        // Verifica que el producto no exista
        if ($this->repositorio->buscarPorCodigo($producto->codigo)) {
            throw new Exception('El código del producto ya existe.');
        }

        // Guardar producto
        $this->repositorio->guardar($producto);
    }
}
