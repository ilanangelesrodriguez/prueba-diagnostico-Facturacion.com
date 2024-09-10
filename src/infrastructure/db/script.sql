CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(15) UNIQUE NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    bodega VARCHAR(100) NOT NULL,
    sucursal VARCHAR(100) NOT NULL,
    moneda VARCHAR(10) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    materiales TEXT NOT NULL,
    descripcion TEXT NOT NULL
);
