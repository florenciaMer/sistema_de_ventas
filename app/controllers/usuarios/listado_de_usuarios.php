<?php

$sql_usuarios = 
"SELECT us.id_usuario, us.nombres, us.email, rol.nombre 
FROM usuarios as us 
INNER JOIN roles as rol ON us.id_rol = rol.id_rol;";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>