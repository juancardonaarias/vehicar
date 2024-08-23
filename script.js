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
 });
 
