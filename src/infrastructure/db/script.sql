-- Crear tablas
CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY, -- Identificador único del producto
    codigo_producto VARCHAR(15) UNIQUE NOT NULL, -- Código único del producto
    nombre_producto VARCHAR(50) NOT NULL, -- Nombre del producto
    precio DECIMAL(10, 2) NOT NULL, -- Precio del producto
    descripcion TEXT NOT NULL, -- Descripción del producto
    id_bodega INT NOT NULL, -- Identificador de la bodega donde se almacena el producto
    id_sucursal INT NOT NULL, -- Identificador de la sucursal donde se almacena el producto
    id_moneda INT NOT NULL -- Identificador de la moneda en la que se expresa el precio del producto
);

CREATE TABLE IF NOT EXISTS bodegas (
    id SERIAL PRIMARY KEY, -- Identificador único de la bodega
    nombre_bodega VARCHAR(100) NOT NULL -- Nombre de la bodega
);

CREATE TABLE IF NOT EXISTS sucursales (
    id SERIAL PRIMARY KEY, -- Identificador único de la sucursal
    nombre_sucursal VARCHAR(100) NOT NULL, -- Nombre de la sucursal
    id_bodega INT REFERENCES bodegas(id) -- Identificador de la bodega a la que pertenece la sucursal
);

CREATE TABLE IF NOT EXISTS monedas (
    id SERIAL PRIMARY KEY, -- Identificador único de la moneda
    nombre_moneda VARCHAR(50) NOT NULL, -- Nombre de la moneda
    simbolo_moneda VARCHAR(10) NOT NULL -- Símbolo de la moneda
);

CREATE TABLE IF NOT EXISTS materiales (
    id SERIAL PRIMARY KEY, -- Identificador único del material
    nombre_material VARCHAR(100) NOT NULL -- Nombre del material
);

CREATE TABLE IF NOT EXISTS producto_materiales (
    id_producto INT REFERENCES productos(id), -- Identificador del producto
    id_material INT REFERENCES materiales(id), -- Identificador del material
    PRIMARY KEY (id_producto, id_material) -- Llave primaria compuesta por id_producto e id_material
);

-- Insertar datos iniciales solo si las tablas están vacías
DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM bodegas) THEN
        INSERT INTO bodegas (nombre_bodega) VALUES ('Bodega Central'), ('Bodega Norte'); -- Insertar bodegas iniciales
    END IF;

    IF NOT EXISTS (SELECT 1 FROM sucursales) THEN
        INSERT INTO sucursales (nombre_sucursal, id_bodega) VALUES ('Sucursal 1', 1), ('Sucursal 2', 1), ('Sucursal 3', 2); -- Insertar sucursales iniciales
    END IF;

    IF NOT EXISTS (SELECT 1 FROM monedas) THEN
        INSERT INTO monedas (nombre_moneda, simbolo_moneda) VALUES ('Peso chileno', '$'), ('Soles', 'S/.'); -- Insertar monedas iniciales
    END IF;

    IF NOT EXISTS (SELECT 1 FROM materiales) THEN
        INSERT INTO materiales (nombre_material) VALUES ('Plástico'), ('Metal'), ('Madera'); -- Insertar materiales iniciales
    END IF;
END $$;