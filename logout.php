<?php
//activamos la sesión
session_start();

//renovamos todas las sesiones
session_unset();

//destruimos la sesión
session_destroy();

//redirigimos a nuestra página de logueo
header('location: login-administrador.php');
?>