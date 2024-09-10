<?php

class RegistrarProducto {
    private $repositorio;

    public function __construct(RepositorioProducto $repositorio) {
        $this->repositorio = $repositorio;
    }

    public function ejecutar(Producto $producto) {
        if ($this->repositorio->buscarPorCodigo($producto->codigo)) {
            throw new Exception('El código del producto ya existe.');
        }

        $this->repositorio->guardar($producto);
    }
}
