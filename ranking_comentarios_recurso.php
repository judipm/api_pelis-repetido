<?php 
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    if($_SESSION["perfil"] != 1){header('Location: salir.php');}
    
    include "modelos/bbdd/perfiles.php";
    include "modelos/bbdd/comentario.php";
    include "modelos/api.php";

    $listado_perfiles = perfiles_listado();
    $ranking = ranking_recurso();
    

    include "vistas/ranking_comentarios_recurso.html";
      
?>