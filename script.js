document.addEventListener('DOMContentLoaded', () => {
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

    // Cargar opciones de tipo de repuesto
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

    // cargar opciones de taller
    fetch('php/get_taller.php')
        .then(response => response.json())
        .then(data => {
            const tallerSelect = document.getElementById('id_taller');
            data.forEach(taller => {
                const option = document.createElement('option');
                option.value = taller.id_taller;
                option.textContent = taller.nombre_taller;
                tallerSelect.appendChild(option);
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

    //Cargar opciones de tipo de mantenimiento
    fetch('php/get_tipomantenimiento.php')
    .then(response => response.json())
    .then(data => {
        const tipomantenimientoSelect = document.getElementById('tipo_mantenimiento');
        data.forEach(tipomantenimiento => {
            const option = document.createElement('option');
            option.value = tipomantenimiento.id_tipomanto;
            option.textContent = tipomantenimiento.nombre_mantenimiento;
            tipomantenimientoSelect.appendChild(option);
        });
    });



 });
 
