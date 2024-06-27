<?php
include "modelos/bbdd/usuarios.php";
$id = $_GET["id"];
eliminar_usuario($id);
header('Location: usuarios.php');
?>