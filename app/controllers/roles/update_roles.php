<?php
$id_rol_get = $_GET['id'];

$sql_roles = "SELECT * FROM roles where id_rol = $id_rol_get;";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach ($roles_datos as $dato_rol) {
   $rol = $dato_rol['nombre'];
  
}

?>