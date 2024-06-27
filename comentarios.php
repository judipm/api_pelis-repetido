<?php 
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
include "modelos/bbdd/perfiles.php";

$id_recurso = $_GET['id_ficha'];

include "vistas/comentarios.html";

 ?>