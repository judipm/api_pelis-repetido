<?php 
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    if($_SESSION["perfil"] != 1){header('Location: salir.php');}
    include "modelos/bbdd/usuarios.php";
    include "modelos/bbdd/perfiles.php";
    $array_usuarios = usuarios_mysql();
    include "vistas/usuarios.html";
      
?>
    
