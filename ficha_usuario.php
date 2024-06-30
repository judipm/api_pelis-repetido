<?php 
	session_start();

	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}

	include "modelos/bbdd/usuarios.php";
	include "modelos/bbdd/perfiles.php";
	include "modelos/bbdd/comentario.php";
	
	$notificaciones = listado_notificaciones($_SESSION["id"]);
	$datos_usuario = datos_usuario($_GET["id"]);

	include "vistas/ficha_usuario.html"; 

?>