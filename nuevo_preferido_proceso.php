<?php 
    session_start();
    include "modelos/bbdd/usuarios.php"; 
    include "modelos/bbdd/preferidos.php";

    nuevo_preferido($_SESSION["id"], $_GET["id_recurso"]);
    
    header('Location: filtro.php');



?>