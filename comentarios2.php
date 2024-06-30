<?php 
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
include "modelos/bbdd/perfiles.php";
include "modelos/bbdd/comentario.php";

$notificaciones = listado_notificaciones($_SESSION["id"]);
$id_comentario = $_GET['id_comentario'];
$id_recurso = $_GET['id_ficha'];
echo $id_recurso;
include "vistas/comentarios2.html";

 ?>