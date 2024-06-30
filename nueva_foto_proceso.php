<?php 
    session_start();
    if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
    include "modelos/bbdd/perfiles.php"; 

    include "modelos/bbdd/fotos.php";
    include "modelos/bbdd/comentario.php";
    $notificaciones = listado_notificaciones($_SESSION["id"]);
    $ultimo_id = nueva_foto($_SESSION["id"], $_POST["comentario"]);

    move_uploaded_file($_FILES['archivo']['tmp_name'],"imgs/".$ultimo_id.".jpg");
    //ha colocado ese id subido renonmbrado como el id_numero_que_sea.jpg en la carpeta imgs/
    
    header('Location: fotos.php');

?>