<?php 
include_once "config.php";

function usuarios_mysql(){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD); //aqui estoy llamando a la base de datos de MySQL
    $usuarios = $mbd->query('SELECT * FROM usuarios');
    $array_usuarios = $usuarios->fetchAll(PDO::FETCH_ASSOC);
    return($array_usuarios);
}
function login($user, $password){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD); 
    $sql = "SELECT * FROM usuarios WHERE user='" . $user . "' AND password='" . $password . "'";
    $usuarios = $mbd->query($sql);
    if ($usuarios->rowCount() > 0) {
        $usuarios = $usuarios->fetch();
        $id = $usuarios["id"];
        return $id;
    }else {
        return 0;
    }
}
function datos_usuario($id){ 
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
    $sql = "SELECT * FROM usuarios WHERE id='" . $id ."'"; 
    $usuarios = $mbd->query($sql); 
    $usuario = $usuarios->fetch(); 
    return $usuario; 
}
function nuevo_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
	$sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, direccion, localidad, user, password, perfil) VALUES (?,?,?,?,?,?,?,?,?)";
	$mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil]);
}
function eliminar_usuario($id){
    $mbd = new PDO('mysql:host='.SERVIDOR_BBDD.';dbname='.BBDD, USER_BBDD, PASSWORD_BBDD);
    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    $usuarios = $mbd->query($sql);
    $borrado = $usuarios->fetchAll(PDO::FETCH_ASSOC);
    return $borrado;
}
function editar_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id){
    $mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
    $sql = "UPDATE usuarios SET nombre = ? , apellidos = ? , telefono = ? , email = ? , direccion = ? , localidad = ? , user = ? , password = ? , perfil = ? WHERE id = ?";
    $mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id]);

}
?>
