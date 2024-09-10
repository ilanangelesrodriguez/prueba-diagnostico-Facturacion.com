<?php

class Producto {
    public $codigo;
    public $nombre;
    public $bodega;
    public $sucursal;
    public $moneda;
    public $precio;
    public $materiales;
    public $descripcion;

    public function __construct($codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $materiales, $descripcion) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->bodega = $bodega;
        $this->sucursal = $sucursal;
        $this->moneda = $moneda;
        $this->precio = $precio;
        $this->materiales = $materiales;
        $this->descripcion = $descripcion;
    }
}
