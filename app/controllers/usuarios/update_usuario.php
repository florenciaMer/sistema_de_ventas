<?php
$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT usuarios.id_rol, usuarios.nombres, usuarios.email, usuarios.password_user, roles.nombre 
                 FROM usuarios 
                 INNER JOIN roles on usuarios.id_rol = roles.id_rol 
                 WHERE usuarios.id_usuario = $id_usuario_get";
//$sql_usuarios = "SELECT us.id_usuario, us.password_user, us.nombres, us.email, rol.nombre 
//FROM usuarios as us 
//INNER JOIN roles as rol ON id_usuario = $id_usuario_get;";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $dato_usuario) {
   $nombres = $dato_usuario['nombres'];
   $email = $dato_usuario['email'];
   $rol_db = $dato_usuario['nombre'];
   $password_user = $dato_usuario['password_user'];
}

?>