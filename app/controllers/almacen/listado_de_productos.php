<?php

$sql_productos = 
"SELECT pr.id_producto, pr.codigo,pr.nombre, pr.stock, pr.stock_minimo, pr.stock_maximo, pr.precio_compra, pr.precio_venta,
pr.fecha_ingreso, pr.imagen, cat.nombre_categoria, u.email, pr.descripcion
FROM almacen as pr 
INNER JOIN categorias as cat ON cat.id_categoria = pr.id_categoria
INNER JOIN usuarios as u on u.id_usuario = pr.id_usuario";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
?>

