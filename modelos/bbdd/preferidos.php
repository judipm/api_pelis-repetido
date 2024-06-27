<?php
include_once "config.php";

function preferidos_listado(){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD); 
    $usuarios = $mbd->query('SELECT * FROM preferidos');
    $array_preferidos = $usuarios->fetchAll(PDO::FETCH_ASSOC);
    return($array_preferidos);
}
function nuevo_preferido($id, $recurso){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
	$sql = "INSERT INTO preferidos (id_usuario, recurso) VALUES (?,?)";
	$mbd->prepare($sql)->execute([$id, $recurso]);

}
?>