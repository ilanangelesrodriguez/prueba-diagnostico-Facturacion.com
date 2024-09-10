<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <title>Registro de Productos</title>
    <link href="../css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-100 mt-2">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl">
        <h1 class="text-2xl font-bold mb-6">Formulario de Producto</h1>
        <form id="formProducto" method="POST" action="../../src/controllers/productoController.php">
            <div class="grid grid-cols-2 gap-2 mb-3">
                <div>
                    <label for="codigo" class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                    <input type="text" id="codigo" name="codigo" value="PROD01K" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="Set Comedor" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="bodega" class="block text-sm font-medium text-gray-700 mb-1">Bodega</label>
                    <select id="bodega" name="bodega" class="w-full p-2 border rounded">
                        <option>Bodega 1</option>
                    </select>
                </div>
                <div>
                    <label for="sucursal" class="block text-sm font-medium text-gray-700 mb-1">Sucursal</label>
                    <select id="sucursal" name="sucursal" class="w-full p-2 border rounded">
                        <option>Sucursal 2</option>
                    </select>
                </div>
                <div>
                    <label for="moneda" class="block text-sm font-medium text-gray-700 mb-1">Moneda</label>
                    <select id="moneda" name="moneda" class="w-full p-2 border rounded">
                        <option>DÓLAR</option>
                    </select>
                </div>
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                    <input type="text" id="precio" name="precio" value="1500" class="w-full p-2 border rounded">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Material del Producto</label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" name="materiales[]" value="plastico">
                        <span class="ml-2">Plástico</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" name="materiales[]" value="metal">
                        <span class="ml-2">Metal</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" name="materiales[]" value="madera" checked>
                        <span class="ml-2">Madera</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" name="materiales[]" value="vidrio" checked>
                        <span class="ml-2">Vidrio</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" name="materiales[]" value="textil">
                        <span class="ml-2">Textil</span>
                    </label>
                </div>
            </div>
            <div class="mb-6">
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="w-full p-2 border rounded">Elegante set de comedor de madera natural, incluye mesa y sillas. Diseño clásico y duradero, ideal para cualquier estilo de decoración. Perfecto para cenas familiares y reuniones sociales.</textarea>
            </div>
            <button type="submit" class="w-full bg-cyan-500 py-4 px-4 rounded hover:bg-cyan-600">Guardar Producto</button>
        </form>
    </div>
</body>
<script src="resources/js/script.js"></script>
</html>