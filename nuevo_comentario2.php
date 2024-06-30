<?php 
    session_start();
    include "modelos/bbdd/usuarios.php"; 
    include "modelos/bbdd/comentario.php";

    nuevo_comentario2($_SESSION["id"], $_POST["cod_comentario"], $_POST["comentario"], $timestamp);
    $notificaciones = listado_notificaciones($_SESSION["id"]);
    
    header('Location: ficha.php?id='.$_POST["cod_recurso"]);

?>