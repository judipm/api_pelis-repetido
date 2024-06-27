<?php 
session_start();
if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
include "modelos/bbdd/perfiles.php";
include "vistas/filtro.html";

 ?>