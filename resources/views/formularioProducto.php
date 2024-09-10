<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Registro de Productos</title>
</head>
<body>
<div class="container">
        <h1>Formulario de Producto</h1>
        <form id="formProducto" method="POST" action="../../src/controllers/productoController.php">
            <div class="form-row">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" value="PROD01K">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="Set Comedor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega">
                        <option>Bodega 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal">
                        <option>Sucursal 2</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda">
                        <option>DÓLAR</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" value="1500">
                </div>
            </div>
            <div class="form-group full-width">
                <label>Material del Producto</label>
                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="materiales[]" value="plastico">
                        <span>Plástico</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="materiales[]" value="metal">
                        <span>Metal</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="materiales[]" value="madera" checked>
                        <span>Madera</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="materiales[]" value="vidrio" checked>
                        <span>Vidrio</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="materiales[]" value="textil">
                        <span>Textil</span>
                    </label>
                </div>
            </div>
            <div class="form-group full-width">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3">Elegante set de comedor de madera natural, incluye mesa y sillas. Diseño clásico y duradero, ideal para cualquier estilo de decoración. Perfecto para cenas familiares y reuniones sociales.</textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit">Guardar Producto</button>
            </div>
        </form>
    </div>
</body>
<script src="../js/script.js"></script>
</html>