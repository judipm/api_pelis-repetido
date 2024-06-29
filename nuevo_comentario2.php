<?php 
    session_start();
    include "modelos/bbdd/usuarios.php"; 
    include "modelos/bbdd/comentario2.php";

    nuevo_comentario2($_SESSION["id"], $_POST["cod_comentario"], $_POST["comentario"], $timestamp);
    
    header('Location: ficha.php?id='.$_POST["cod_recurso"]);

?>