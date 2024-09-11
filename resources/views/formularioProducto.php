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
                    sucursalSelect.innerHTML = '<option value="">Seleccione una sucursal</option>'; // Limpiar opciones actuales

                    const filteredSucursales = data.sucursales.filter(sucursal => sucursal.id_bodega === selectedBodegaId);
                    filteredSucursales.forEach(sucursal => {
                        const option = document.createElement('option');
                        option.value = sucursal.id;
                        option.textContent = sucursal.nombre_sucursal;
                        sucursalSelect.appendChild(option);
                    });
                });

                // Disparar el evento change para cargar las sucursales de la bodega seleccionada por defecto
                bodegaSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('formProducto').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Validaciones
        const codigo = document.getElementById('codigo').value;
        const nombre = document.getElementById('nombre').value;
        const precio = document.getElementById('precio').value;
        const descripcion = document.getElementById('descripcion').value;
        const bodega = document.getElementById('bodega').value;
        const sucursal = document.getElementById('sucursal').value;
        const moneda = document.getElementById('moneda').value;
        const materiales = document.querySelectorAll('input[name="materiales[]"]:checked');

        // Validación de código
        const codigoRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,15}$/;
        if (!codigo) {
            alert("El código del producto no puede estar en blanco.");
            return;
        }
        if (!codigoRegex.test(codigo)) {
            alert("El código del producto debe contener letras y números y tener entre 5 y 15 caracteres.");
            return;
        }

        // Validación de nombre
        if (!nombre) {
            alert("El nombre del producto no puede estar en blanco.");
            return;
        }
        if (nombre.length < 2 || nombre.length > 50) {
            alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            return;
        }

        // Validación de precio
        const precioRegex = /^\d+(\.\d{1,2})?$/;
        if (!precio) {
            alert("El precio del producto no puede estar en blanco.");
            return;
        }
        if (!precioRegex.test(precio) || parseFloat(precio) <= 0) {
            alert("El precio del producto debe ser un número positivo con hasta dos decimales.");
            return;
        }

        // Validación de descripción
        if (!descripcion) {
            alert("La descripción del producto no puede estar en blanco.");
            return;
        }
        if (descripcion.length < 10 || descripcion.length > 1000) {
            alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
            return;
        }

        // Validación de bodega
        if (!bodega) {
            alert("Debe seleccionar una bodega.");
            return;
        }

        // Validación de sucursal
        if (!sucursal) {
            alert("Debe seleccionar una sucursal para la bodega seleccionada.");
            return;
        }

        // Validación de moneda
        if (!moneda) {
            alert("Debe seleccionar una moneda para el producto.");
            return;
        }

        // Validación de materiales
        if (materiales.length < 2) {
            alert("Debe seleccionar al menos dos materiales para el producto.");
            return;
        }

        // Verificar unicidad del código del producto
        fetch(`../../src/controllers/verificarCodigoProducto.php?codigo=${codigo}`)
            .then(response => response.json())
            .then(data => {
                if (!data.unico) {
                    alert("El código del producto ya está registrado.");
                    return;
                }

                // Si todas las validaciones pasan, enviar el formulario
                const formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Producto guardado exitosamente');
                        this.reset(); // Limpiar los campos del formulario
                    } else {
                        alert('Error al guardar el producto: ' + data.message);
                    }
                })
                .catch(error => {
                    alert('Error al guardar el producto: ' + error.message);
                });
            })
            .catch(error => {
                alert('Error al verificar el código del producto: ' + error.message);
            });
    });
</script>
</body>
</html>