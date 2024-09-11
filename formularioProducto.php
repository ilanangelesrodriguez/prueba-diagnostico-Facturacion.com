<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./resources/css/styles.css" rel="stylesheet">
    <title>Registro de Productos</title>
</head>
<body>
<div class="container">
    <h1>Formulario de Producto</h1>
    <form id="formProducto" method="POST" action="./src/controllers/productoController.php">
        <div class="form-row">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" id="codigo" name="codigo">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="bodega">Bodega</label>
                <select id="bodega" name="bodega">
                    <option value="">Seleccione una bodega</option>
                    <!-- Opciones cargadas dinámicamente -->
                </select>
            </div>
            <div class="form-group">
                <label for="sucursal">Sucursal</label>
                <select id="sucursal" name="sucursal">
                    <option value="">Seleccione una sucursal</option>
                    <!-- Opciones cargadas dinámicamente -->
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="moneda">Moneda</label>
                <select id="moneda" name="moneda">
                    <option value="">Seleccione una moneda</option>
                    <!-- Opciones cargadas dinámicamente -->
                </select>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio">
            </div>
        </div>
        <div class="form-group full-width">
            <label>Material del Producto</label>
            <div class="checkbox-group">
                <!-- Opciones cargadas dinámicamente -->
            </div>
        </div>
        <div class="form-group full-width">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <div class="form-group full-width">
            <button type="submit">Guardar Producto</button>
        </div>
    </form>
</div>
<script src="./resources/js/script.js"></script>

</body>
</html>
