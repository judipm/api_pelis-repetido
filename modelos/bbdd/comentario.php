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
function listado_notificaciones($id_usuario){

    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);	
    $sql = "SELECT 
                comentarios.id_usuario as el_notificado,
                usuarios.nombre as el_nombre, 
                usuarios.apellidos as los_apellidos, 
                comentarios2.comentario as ha_comentado,
                comentarios.comentario as el_comentario_comentado,
                comentarios.id_recurso as la_ficha
                FROM comentarios2
            JOIN comentarios ON comentarios2.id_comentarios = comentarios.id
            JOIN usuarios ON comentarios2.id_usuario = usuarios.id
            WHERE comentarios.id_usuario = '$id_usuario'
            AND comentarios2.id_usuario != '$id_usuario'";
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