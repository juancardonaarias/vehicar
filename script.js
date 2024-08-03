document.addEventListener('DOMContentLoaded', () => {
    // Cargar opciones de tipo de taller
    fetch('php/get_tiporepuesto.php')
        .then(response => response.json())
        .then(data => {
            const tiporepuestoSelect = document.getElementById('id_tiporepuesto');
            data.forEach(tiporepuesto => {
                const option = document.createElement('option');
                option.value = tiporepuesto.id_tipo;
                option.textContent = tiporepuesto.tipo;
                tiporepuestoSelect.appendChild(option);
            });
        });

    
    // Cargar opciones de departamentos
    fetch('php/get_departamentos.php')
        .then(response => response.json())
        .then(data => {
            const departamentoSelect = document.getElementById('id_departamento');
            data.forEach(departamento => {
                const option = document.createElement('option');
                option.value = departamento.id_departamento;
                option.textContent = departamento.nombre_departamento;
                departamentoSelect.appendChild(option);
            });
        });


    // Cargar opciones de ciudad
    fetch('php/get_ciudades.php')
        .then(response => response.json())
        .then(data => {
            const ciudadSelect = document.getElementById('id_ciudad');
            data.forEach(ciudad => {
                const option = document.createElement('option');
                option.value = ciudad.id_ciudad;
                option.textContent = ciudad.nombre_ciudad;
                ciudadSelect.appendChild(option);
            });
        });

    
    // Cargar opciones de propietarios
    fetch('php/get_propietarios.php')
        .then(response => response.json())
        .then(data => {
            const propietarioSelect = document.getElementById('id_propietario');
            data.forEach(propietario => {
                const option = document.createElement('option');
                option.value = propietario.id_propietario;
                option.textContent = propietario.nombre_propietario;
                propietarioSelect.appendChild(option);
            });
        });

    // Cargar opciones de vehículos
    fetch('php/get_vehiculos.php')
        .then(response => response.json())
        .then(data => {
            const vehiculoSelect = document.getElementById('id_vehiculo');
            data.forEach(vehiculo => {
                const option = document.createElement('option');
                option.value = vehiculo.id_vehiculo;
                option.textContent = vehiculo.placa_vehiculo;
                vehiculoSelect.appendChild(option);
            });
        });

    // Manejar las opciones dinamicas para el cargue de vehiculos en la interfaz mantenimiento
    
    /*fetch('php/get_vehiculos.php')
        .then(response => response.json())
        .then(data => {
            const vehiculoSelect = document.getElementById('vehiculos_en_mantenimiento');
            data.forEach(vehiculo => {
                const option = document.createElement('option');
                option.value = vehiculo.id_vehiculo;
                option.textContent = `${vehiculo.marca} ${vehiculo.modelo}`;
                vehiculoSelect.appendChild(option);
            });
        });
    */

    // Manejar la navegación entre secciones del formulario
    const navLinks = document.querySelectorAll('.nav-link');
    const formSections = document.querySelectorAll('.form-section');

    navLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const targetSection = link.getAttribute('data-section');

            formSections.forEach(section => {
                if (section.id === targetSection) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
});
