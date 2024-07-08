document.addEventListener('DOMContentLoaded', function() {
    // Cargar propietarios
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

    // Cargar vehículos
    fetch('php/get_vehiculos.php')
        .then(response => response.json())
        .then(data => {
            const vehiculoSelect = document.getElementById('id_vehiculo');
            data.forEach(vehiculo => {
                const option = document.createElement('option');
                option.value = vehiculo.id_vehiculo;
                option.textContent = `${vehiculo.marca} ${vehiculo.modelo}`;
                vehiculoSelect.appendChild(option);
            });
        });

    // Funcionalidad de navegación del menú
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

