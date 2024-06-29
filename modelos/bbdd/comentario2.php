<?php

include_once "config.php";

function nuevo_comentario2($id, $id_comentario, $comentario, $timestamp){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
	$sql = "INSERT INTO comentarios2 (id_usuario, id_comentarios, comentario, timestamp) VALUES (?,?,?,?)";
	$mbd->prepare($sql)->execute([$id, $id_comentario, $comentario, $timestamp]);
}
function listado_comentarios2($id_comentario){

    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT 
                usuarios.nombre as el_nombre, 
                usuarios.apellidos as los_apellidos, 
                comentarios2.timestamp as fechayhora, 
                comentarios2.comentario as el_comentario,
                comentarios2.id_comentarios as id_comentario
            FROM comentarios2 
            JOIN usuarios ON comentarios2.id_usuario = usuarios.id
            WHERE comentarios2.id_comentarios = '$id_comentario'";
    $comentarios = $mbd->query($sql);
    $array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
    return $array;  
}

?>