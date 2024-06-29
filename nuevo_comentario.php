<?php 
    session_start();
    include "modelos/bbdd/usuarios.php"; 
    include "modelos/bbdd/comentario.php";

    nuevo_comentario($_SESSION["id"], $_POST["cod_recurso"],  $_POST["comentario"], $timestamp);
    
    header('Location: ficha.php?id='.$_POST["cod_recurso"]);

?>