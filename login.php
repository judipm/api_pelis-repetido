<?php
   session_start();
   include "modelos/bbdd/usuarios.php";
   include "modelos/bbdd/preferidos.php";
   $usuario = $_POST["usuario"];
   $pass = $_POST["password"];
   $id_usuario = login($usuario , $pass);
   $array_perfiles = preferidos_listado();


    if ($id_usuario != 0){ 
        $_SESSION["nombre"] = datos_usuario($id_usuario)["nombre"]; 
        $_SESSION["apellidos"] = datos_usuario($id_usuario)["apellidos"];
        $_SESSION["nombreyapellidos"] = $_SESSION["nombre"] . " ". $_SESSION["apellidos"];
        $_SESSION["perfil"] = datos_usuario($id_usuario)["perfil"];
        $_SESSION["administrador"] = datos_usuario($id_usuario)["administradores"];
        $_SESSION["id"] = $id_usuario;

        header('Location: filtro.php');
          
    }else{
        header('Location: vistas/accesodenegado.html');
    }

?>