<?php 
include_once "config.php";

function perfiles_mysql($id){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD); 
    $sql = "SELECT * FROM perfiles WHERE id='" . $id . "'";
    $perfiles = $mbd->query($sql);
    $perfil = $perfiles->fetch();
    return $perfil["nombre"];
}
function perfiles_listado(){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD); 
    $perfiles = $mbd->query('SELECT * FROM perfiles');
    $listado_perfiles = $perfiles->fetchAll(PDO::FETCH_ASSOC);
    return $listado_perfiles;
}
?>