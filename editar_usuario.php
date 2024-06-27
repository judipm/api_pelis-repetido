<?php
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
if($_SESSION["perfil"] != 1){header('Location: salir.php');}

include "modelos/bbdd/usuarios.php";
include "modelos/bbdd/perfiles.php";
$id = $_GET["id"];
$usuarios = datos_usuario($id);
$listado_perfiles = perfiles_listado();

include "vistas/editar_usuario.html"
?>