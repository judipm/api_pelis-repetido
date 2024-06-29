<?php

include_once "config.php";

function nuevo_comentario($id, $recurso, $comentario, $timestamp){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
	$sql = "INSERT INTO comentarios (id_usuario, id_recurso, comentario, timestamp) VALUES (?,?,?,?)";
	$mbd->prepare($sql)->execute([$id, $recurso, $comentario, $timestamp]);
}
function listado_comentarios_por_recurso($id_recurso){

    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT 
                usuarios.nombre as el_nombre, 
                usuarios.apellidos as los_apellidos, 
                comentarios.timestamp as fechayhora, 
                comentarios.comentario as el_comentario,
                comentarios.id as id_comentario
            FROM comentarios 
            JOIN usuarios ON comentarios.id_usuario = usuarios.id
            WHERE comentarios.id_recurso = '$id_recurso'";
    $comentarios = $mbd->query($sql);
    $array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
    return $array;  
}
function ranking_comentarios(){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT
                usuarios.nombre as el_nombre, 
                usuarios.apellidos as los_apellidos, 
                COUNT(comentarios.id_usuario) as recuento_id
            FROM comentarios
            JOIN usuarios ON comentarios.id_usuario = usuarios.id 
            GROUP BY usuarios.nombre, usuarios.apellidos
            ORDER BY recuento_id DESC ";
    $comentarios = $mbd->query($sql);
    $array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
    return $array; 
}
function ranking_recurso(){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT
                id_recurso as recurso,
                COUNT(id_recurso) as recuento
            FROM comentarios
            GROUP BY id_recurso
            ORDER BY recuento DESC ";
    $comentarios = $mbd->query($sql);
    $array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
    return $array;             
}
?>