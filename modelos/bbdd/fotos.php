<?php
include_once "config.php";

function listado_fotos($id_usuario){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT * FROM fotos
            WHERE fotos.id_usuario = '$id_usuario'";
    $comentarios = $mbd->query($sql);
    $array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}
function nueva_foto($id, $comentario){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
	$sql = "INSERT INTO fotos (id_usuario, comentario) VALUES (?,?)";
	$mbd->prepare($sql)->execute([$id, $comentario]);
    return $mbd->lastInsertId(); //esto devuelve un número, devuelve el último id insertado.
}

?>