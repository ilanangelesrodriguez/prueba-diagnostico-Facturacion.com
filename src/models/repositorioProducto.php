<?php

interface RepositorioProducto {
    public function guardar(Producto $producto);
    public function buscarPorCodigo($codigo);
}
