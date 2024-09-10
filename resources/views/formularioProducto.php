<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <title>Registro de Productos</title>
    <link href="../css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold">Registrar Producto</h1>
        <form id="formProducto" method="POST" action="../../src/controllers/productoController.php">
            <div class="mb-4">
                <label for="codigo" class="block">Código del Producto:</label>
                <input type="text" id="codigo" name="codigo" class="border" required>
            </div>
            <div class="mb-4">
                <label for="nombre" class="block">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" class="border" required>
            </div>
            <!-- Más campos aquí -->
            <button type="submit" class="bg-teal-500 text-white px-4 py-2">Guardar Producto</button>
        </form>
    </div>
</body>
<script src="resources/js/script.js"></script>
</html>
