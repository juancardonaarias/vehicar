<?php
session_start();

//session_unset(); // Elimina todas las variables de sesión.

// Destruir la sesión.
session_destroy();

// Redirigir al inicio de sesión.
echo '<script>window.location.href = "index.html";</script>';
exit();
?>
