-- Crear tablas
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

-- Insertar datos iniciales solo si las tablas están vacías
DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM bodegas) THEN
        INSERT INTO bodegas (nombre_bodega) VALUES ('Bodega Central'), ('Bodega Norte');
    END IF;

    IF NOT EXISTS (SELECT 1 FROM sucursales) THEN
        INSERT INTO sucursales (nombre_sucursal, id_bodega) VALUES ('Sucursal 1', 1), ('Sucursal 2', 1), ('Sucursal 3', 2);
    END IF;

    IF NOT EXISTS (SELECT 1 FROM monedas) THEN
        INSERT INTO monedas (nombre_moneda, simbolo_moneda) VALUES ('Peso chileno', '$'), ('Soles', 'S/.');
    END IF;

    IF NOT EXISTS (SELECT 1 FROM materiales) THEN
        INSERT INTO materiales (nombre_material) VALUES ('Plástico'), ('Metal'), ('Madera');
    END IF;
END $$;