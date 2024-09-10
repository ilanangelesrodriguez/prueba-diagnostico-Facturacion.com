<?php
class Producto {
    public $codigo;
    public $nombre;
    public $precio;
    public $descripcion;
    public $id_bodega;
    public $id_sucursal;
    public $id_moneda;
    public $materiales;

    public function __construct($codigo, $nombre, $precio, $descripcion, $id_bodega, $id_sucursal, $id_moneda, $materiales) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->id_bodega = $id_bodega;
        $this->id_sucursal = $id_sucursal;
        $this->id_moneda = $id_moneda;
        $this->materiales = $materiales;
    }
}