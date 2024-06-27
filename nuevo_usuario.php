<?php 
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    if($_SESSION["perfil"] != 1){header('Location: salir.php');}
    
    include "modelos/bbdd/perfiles.php";

    $listado_perfiles = perfiles_listado();

    include "vistas/nuevo_usuario.html";
      
?>