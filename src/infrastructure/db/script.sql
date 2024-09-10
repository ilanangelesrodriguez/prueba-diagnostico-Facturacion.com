CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    codigo_producto VARCHAR(15) UNIQUE NOT NULL,
    nombre_producto VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT NOT NULL,
    id_bodega INT NOT NULL,
    id_sucursal INT NOT NULL,
    id_moneda INT NOT NULL
);

CREATE TABLE IF NOT EXISTS bodegas (
    id SERIAL PRIMARY KEY,
    nombre_bodega VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS sucursales (
    id SERIAL PRIMARY KEY,
    nombre_sucursal VARCHAR(100) NOT NULL,
    id_bodega INT REFERENCES bodegas(id)
);

CREATE TABLE IF NOT EXISTS monedas (
    id SERIAL PRIMARY KEY,
    nombre_moneda VARCHAR(50) NOT NULL,
    simbolo_moneda VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS materiales (
    id SERIAL PRIMARY KEY,
    nombre_material VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS producto_materiales (
    id_producto INT REFERENCES productos(id),
    id_material INT REFERENCES materiales(id),
    PRIMARY KEY (id_producto, id_material)
);