<?php 
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
include "modelos/bbdd/perfiles.php";
include "modelos/bbdd/comentario.php";
$notificaciones = listado_notificaciones($_SESSION["id"]);
include "vistas/nueva_foto.html";
?>