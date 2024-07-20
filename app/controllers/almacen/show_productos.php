<?php
$id_producto_get = $_GET['id'];


$sql_productos = "SELECT almacen.id_producto, almacen.codigo, almacen.nombre, almacen.descripcion,
 almacen.stock, almacen.stock_minimo, almacen.stock_maximo, almacen.precio_compra, 
 almacen.precio_venta, almacen.imagen, almacen.id_usuario, almacen.id_categoria, almacen.fecha_ingreso,
 usuarios.email 
FROM almacen 
INNER JOIN categorias on almacen.id_categoria = almacen.id_categoria
INNER JOIN usuarios on almacen.id_usuario = usuarios.id_usuario  
WHERE almacen.id_producto = $id_producto_get";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $dato_producto) {
   $codigo = $dato_producto['codigo'];
   $nombre = $dato_producto['nombre'];
   $descripcion = $dato_producto['descripcion'];
   $stock = $dato_producto['stock'];
   $stock_minimo = $dato_producto['stock_minimo'];
   $stock_maximo = $dato_producto['stock_maximo'];
   $precio_compra = $dato_producto['precio_compra'];
   $precio_venta = $dato_producto['precio_venta'];
   $imagen = $dato_producto['imagen'];
   $id_usuario = $dato_producto['id_usuario'];
   $id_categoria = $dato_producto['id_categoria'];
   $fecha_ingreso = $dato_producto['fecha_ingreso'];
   $email = $dato_producto['email'];
}

?>