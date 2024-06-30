<?php
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    
    include "modelos/bbdd/perfiles.php";
    include "modelos/api.php";
    include "modelos/bbdd/comentario.php";

    $notificaciones = listado_notificaciones($_SESSION["id"]);
    $ficha = $_GET['id'];
    $array = datos_recurso($ficha);
    $comentario = listado_comentarios_por_recurso($ficha);


    include "vistas/ficha.html";
    

?>

    
