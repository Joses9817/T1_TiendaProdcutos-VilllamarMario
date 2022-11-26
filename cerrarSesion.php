<?php 
//encender el motro de sesiones siempre
session_start();
//para crear sesiones
session_destroy();

header("Location: index.php");

?>
