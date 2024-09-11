# Proyecto de Facturación
Este proyecto es una aplicación web para la gestión de productos. Incluye funcionalidades para registrar productos, verificar la unicidad de los códigos de producto, y cargar datos necesarios para los formularios.

## Probar la Aplicación

Puedes probar la aplicación en el siguiente enlace: [https://spontaneous-lurette-ilanangelesrodriguez-8858b25c.koyeb.app/formularioProducto.php](https://spontaneous-lurette-ilanangelesrodriguez-8858b25c.koyeb.app/formularioProducto.php)


## Estructura del Proyecto

### Carpetas

```plaintext
📁 resources
│   📁 css
│   │   └── styles.css
│   📁 js
│       └── script.js
📁 src
│   📁 application
│   │   └── registrarProducto.php
│   📁 controllers
│   │   ├── cargarDatosFormulario.php
│   │   ├── productoController.php
│   │   └── verificarCodigoProducto.php
│   📁 infrastructure
│   │   📁 db
│   │   │   ├── conexion.php
│   │   │   └── script.sql
│   │   📁 repositories
│   │       └── postgresProductoRepo.php
│   📁 models
│       ├── producto.php
│       └── repositorioProducto.php
├── formularioProducto.php
├── index.php
├── .gitignore
├── LICENSE
```

### Archivos SQL

- **script.sql**: Contiene las definiciones de las tablas necesarias para el proyecto.

### Archivos JavaScript

- **script.js**: Maneja la lógica del formulario de productos en el lado del cliente.

## Instalación

1. Clona el repositorio.
2. Configura la base de datos y ejecuta el script SQL para crear las tablas necesarias.
3. Configura la conexión a la base de datos en `conexion.php`.
4. Inicia el servidor web y accede a `index.php` para comenzar a usar la aplicación.

## Tablas de la Base de Datos

El proyecto utiliza una base de datos PostgreSQL con las siguientes tablas:

### Tabla `productos`

```sql
CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(50) UNIQUE NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla `categorias`

```sql
CREATE TABLE categorias (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);
```

### Tabla `clientes`

```sql
CREATE TABLE clientes (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    direccion TEXT
);
```

### Tabla `facturas`

```sql
CREATE TABLE facturas (
    id SERIAL PRIMARY KEY,
    cliente_id INT REFERENCES clientes(id),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL
);
```
### Tabla `detalle_factura`

```sql
CREATE TABLE detalle_factura (
    id SERIAL PRIMARY KEY,
    factura_id INT REFERENCES facturas(id),
    producto_id INT REFERENCES productos(id),
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL
);
```
Estas tablas permiten gestionar productos, categorías, clientes, facturas y los detalles de cada factura en la base de datos del proyecto.

## Conexión a la Base de Datos

Para conectar la aplicación a la base de datos de forma local, sigue estos pasos:

1. Asegúrate de tener PostgreSQL instalado y en ejecución en tu máquina local.
2. Crea una base de datos para el proyecto:

```sh
createdb nombre_de_tu_base_de_datos
```

3. Configura la conexión a la base de datos en el archivo `conexion.php`:

```php
<?php
$host = 'localhost';
$port = '5432';
$dbname = 'nombre_de_tu_base_de_datos';
$user = 'tu_usuario';
$password = 'tu_contraseña';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
```

- **$host**: Dirección del servidor de la base de datos (para conexión local, usa `localhost`).
- **$port**: Puerto del servidor de la base de datos (por defecto, `5432`).
- **$dbname**: Nombre de la base de datos que creaste.
- **$user**: Usuario de la base de datos.
- **$password**: Contraseña del usuario de la base de datos.

Asegúrate de reemplazar `nombre_de_tu_base_de_datos`, `tu_usuario`, y `tu_contraseña` con los valores correspondientes a tu configuración local.

## Ejecución de la Aplicación PHP

Para ejecutar la aplicación PHP, sigue estos pasos:

1. Asegúrate de tener PHP 8 instalado en tu máquina.
2. Asegúrate de tener PostgreSQL 16 instalado y en ejecución.
3. Navega al directorio del proyecto en tu terminal.
4. Ejecuta el siguiente comando para iniciar el servidor web integrado de PHP:

```sh
php -S localhost:8000
```

4. Abre un navegador web y navega a `http://localhost:8000/index.php` para acceder a la aplicación.


## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## Desarrolladores

- Ángeles Rodríguez Ilan

## Contacto

Para cualquier pregunta o sugerencia, por favor abre un issue en el repositorio o contacta a [ilanangelesrodriguez@gmail.com](ilanangelesrodriguez@gmail.com).