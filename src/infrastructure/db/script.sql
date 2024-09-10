CREATE TABLE IF NOT EXISTS productos (
    codigo VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    bodega VARCHAR(100) NOT NULL,
    sucursal VARCHAR(100) NOT NULL,
    moneda VARCHAR(10) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    materiales TEXT,
    descripcion TEXT
);
