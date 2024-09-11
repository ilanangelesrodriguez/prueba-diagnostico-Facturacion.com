<?php
/**
 * Clase Producto
 * 
 * Representa un producto con sus atributos y métodos asociados.
 */
class Producto {
    /**
     * @var string $codigo Código del producto.
     */
    public $codigo;

    /**
     * @var string $nombre Nombre del producto.
     */
    public $nombre;

    /**
     * @var float $precio Precio del producto.
     */
    public $precio;

    /**
     * @var string $descripcion Descripción del producto.
     */
    public $descripcion;

    /**
     * @var int $id_bodega ID de la bodega donde se almacena el producto.
     */
    public $id_bodega;

    /**
     * @var int $id_sucursal ID de la sucursal donde se almacena el producto.
     */
    public $id_sucursal;

    /**
     * @var int $id_moneda ID de la moneda en la que se expresa el precio del producto.
     */
    public $id_moneda;

    /**
     * @var array $materiales Lista de materiales del producto.
     */
    public $materiales;

    /**
     * Constructor de la clase Producto.
     * 
     * @param string $codigo Código del producto.
     * @param string $nombre Nombre del producto.
     * @param float $precio Precio del producto.
     * @param string $descripcion Descripción del producto.
     * @param int $id_bodega ID de la bodega donde se almacena el producto.
     * @param int $id_sucursal ID de la sucursal donde se almacena el producto.
     * @param int $id_moneda ID de la moneda en la que se expresa el precio del producto.
     * @param array $materiales Lista de materiales del producto.
     */
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