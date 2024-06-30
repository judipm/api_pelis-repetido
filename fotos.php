<?php
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
include "modelos/bbdd/perfiles.php";

include "modelos/bbdd/fotos.php";
include "modelos/bbdd/comentario.php";
$notificaciones = listado_notificaciones($_SESSION["id"]);
$imagenes = listado_fotos($_SESSION["id"]);
include "vistas/fotos.html";
?>