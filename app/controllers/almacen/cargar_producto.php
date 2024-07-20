<?php
$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email, u.nombres as usuario,
                  a.imagen
                  FROM almacen as a INNER JOIN categorias as cat ON a.id_categoria = cat.id_categoria
                  INNER JOIN usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = $id_producto_get";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $producto) {
    $codigo =  $producto['codigo'];
    $nombre_categoria =  $producto['nombre_categoria'];
    $nombre =  $producto['nombre'];
    $email =  $producto['email'];
    $descripcion =  $producto['descripcion'];
    $stock =  $producto['stock'];
    $stock_minimo =  $producto['stock_minimo'];
    $stock_maximo =  $producto['stock_maximo'];
    $precio_compra =  $producto['precio_compra'];
    $precio_venta =  $producto['precio_venta'];
    $fecha_ingreso =  $producto['fecha_ingreso'];
    $usuario =  $producto['id_usuario'];
    $imagen =  $producto['imagen'];
   
}
?>