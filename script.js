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
        const tipomantenimientoSelect = document.getElementById('id_tipomanto');
        data.forEach(tipomantenimiento => {
            const option = document.createElement('option');
            option.value = tipomantenimiento.id_tipomanto;
            option.textContent = tipomantenimiento.nombre_mantenimiento;
            tipomantenimientoSelect.appendChild(option);
        });
    });


    // Manejar las opciones dinamicas para el cargue de vehiculos en la 
    // interfaz mantenimiento

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

  
  
   // Cargar opciones de mecánico
fetch('php/get_mecanicos.php')
.then(response => response.json()) // Corrección de 'reponse' a 'response'
.then(data => {
   const mecanicosSelect = document.getElementById('mecanico_form_mant');
   data.forEach(mecanico => {
     const option = document.createElement('option');
     option.value = mecanico.id_mecanico;
     option.textContent = mecanico.nombre_mecanico;
     mecanicosSelect.appendChild(option);
   });
})
.catch(error => {
   console.error('Error al cargar los mecánicos:', error);
});

   // Cargar opciones de repuesto
   fetch('php/get_repuestos.php')
   .then(response => response.json()) // Corrección de 'reponse' a 'response'
   .then(data => {
      const repuestoSelect = document.getElementById('repuesto_mant');
      data.forEach(repuesto => {
        const option = document.createElement('option');
        option.value = repuesto.id_repuesto;
        option.textContent = repuesto.nombre_repuesto;
        repuestoSelect.appendChild(option);
      });
   })
   .catch(error => {
      console.error('Error al cargar los repuestos:', error);
   });


 });
 
 function agregarRepuesto() {
    const repuestoSelect = document.getElementById('repuesto_mant');
    const opcionSeleccionada = repuestoSelect.options[repuestoSelect.selectedIndex];
    const repuestoId = opcionSeleccionada.value;
    const repuestoNombre = opcionSeleccionada.textContent;

    const newItem = document.createElement('div');
    newItem.classList.add('alert', 'alert-secondary', 'd-flex', 'justify-content-between', 'align-items-center', 'mb-2');
    newItem.textContent = repuestoNombre;
    newItem.dataset.idRepuesto = repuestoId; // Guardar el id_repuesto en un atributo de datos personalizado

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('btn-close');
    deleteButton.setAttribute('aria-label', 'Close');
    deleteButton.onclick = function() {
        newItem.remove();
        actualizarListaRepuestos();
    };

    newItem.appendChild(deleteButton);

    const listaRepuestos = repuestoSelect.parentElement.nextElementSibling;
    listaRepuestos.appendChild(newItem);

    actualizarListaRepuestos();
}

function actualizarListaRepuestos() {
    const listaRepuestosDiv = document.querySelector('#repuesto_mant').parentElement.nextElementSibling;
    const repuestosListaInput = document.getElementById('repuestos_lista');
    const repuestos = [];

    listaRepuestosDiv.querySelectorAll('.alert').forEach(function(item) {
        repuestos.push(item.dataset.idRepuesto.trim()); // Obtener el id_repuesto desde el atributo de datos
    });

    repuestosListaInput.value = repuestos.join(',');
}