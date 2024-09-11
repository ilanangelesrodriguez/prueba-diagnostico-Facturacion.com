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
                    <!-- Opciones cargadas dinámicamente -->
                </select>
            </div>
            <div class="form-group">
                <label for="sucursal">Sucursal</label>
                <select id="sucursal" name="sucursal">
                    <!-- Opciones cargadas dinámicamente -->
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="moneda">Moneda</label>
                <select id="moneda" name="moneda">
                    <!-- Opciones cargadas dinámicamente -->
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
                <!-- Opciones cargadas dinámicamente -->
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
<script src="../js/script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('../../src/controllers/cargarDatosFormulario.php')
            .then(response => response.json())
            .then(data => {
                const bodegaSelect = document.getElementById('bodega');
                const sucursalSelect = document.getElementById('sucursal');
                const monedaSelect = document.getElementById('moneda');
                const materialesDiv = document.querySelector('.checkbox-group');

                data.bodegas.forEach(bodega => {
                    const option = document.createElement('option');
                    option.value = bodega.id;
                    option.textContent = bodega.nombre_bodega;
                    bodegaSelect.appendChild(option);
                });

                data.sucursales.forEach(sucursal => {
                    const option = document.createElement('option');
                    option.value = sucursal.id;
                    option.textContent = sucursal.nombre_sucursal;
                    sucursalSelect.appendChild(option);
                });

                data.monedas.forEach(moneda => {
                    const option = document.createElement('option');
                    option.value = moneda.id;
                    option.textContent = moneda.nombre_moneda;
                    monedaSelect.appendChild(option);
                });

                data.materiales.forEach(material => {
                    const label = document.createElement('label');
                    label.classList.add('checkbox-label');
                    label.innerHTML = `
                        <input type="checkbox" name="materiales[]" value="${material.id}">
                        <span>${material.nombre_material}</span>
                    `;
                    materialesDiv.appendChild(label);
                });

                // Filtrar sucursales según la bodega seleccionada
                bodegaSelect.addEventListener('change', function() {
                    const selectedBodegaId = parseInt(bodegaSelect.value);
                    sucursalSelect.innerHTML = ''; // Limpiar opciones actuales

                    const filteredSucursales = data.sucursales.filter(sucursal => sucursal.id_bodega === selectedBodegaId);
                    filteredSucursales.forEach(sucursal => {
                        const option = document.createElement('option');
                        option.value = sucursal.id;
                        option.textContent = sucursal.nombre_sucursal;
                        sucursalSelect.appendChild(option);
                    });
                });

                bodegaSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error:', error));
    });
</script>
</body>
</html>