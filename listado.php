<?php 
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    $titulo = urlencode($_POST["busqueda"]);
    $year = urlencode($_POST["year"]);
    $tipo = urlencode($_POST["tipo"]);
    include "modelos/api.php";
    include "modelos/bbdd/perfiles.php";
    include "modelos/bbdd/preferidos.php";
    include "modelos/bbdd/usuarios.php";
    include "modelos/bbdd/comentario.php";
    $notificaciones = listado_notificaciones($_SESSION["id"]);
    $array = datos_busqueda($titulo, $year, $tipo);

    include "vistas/listado.html";
?>

   