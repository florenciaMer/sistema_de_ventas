<?php
$id_producto_get = $_GET['id'];


$sql_usuarios = "SELECT * FROM almacen 
WHERE id_producto = $id_producto_get";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $dato_producto) {
   $nombre = $dato_producto['nombre'];
   $codigo = $dato_producto['codigo'];
   $imagen = $dato_producto['imagen'];
   
}

?>