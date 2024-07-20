<?php

$id_compra_get = $_GET['id'];
    $sql_compras = "SELECT * FROM `compras` 
    INNER JOIN proveedores ON compras.id_proveedor = proveedores.id_proveedor 
    INNER JOIN usuarios ON compras.id_usuario = usuarios.id_usuario
    INNER JOIN almacen ON almacen.id_producto = compras.id_producto 
    INNER JOIN categorias ON categorias.id_categoria = almacen.id_categoria
    INNER JOIN comprobantes ON comprobantes.id_comprobante = compras.id_comprobante
    WHERE compras.id_compra ='$id_compra_get'
    ";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

foreach ($compras_datos as $value) {
    $id_compra = $value['id_compra'];
    $nro_compra = $value['nro_compra'];
    $fecha_compra = $value['fecha_compra'];
    $id_producto = $value['id_producto'];
    $codigo = $value['codigo'];
    $id_comprobante = $value['id_comprobante'];
    $nombre_comprobante = $value['nombre_comprobante'];
    $id_proveedor = $value['id_proveedor'];
    $celular = $value['celular'];
    $telefono = $value['telefono'];
    $direccion = $value['direccion'];
    $empresa = $value['empresa'];
    $email = $value['email'];
    $id_usuario = $value['id_usuario'];
    $id_categoria = $value['id_categoria'];
    $nombre_categoria = $value['nombre_categoria'];
    $cantidad = $value['cantidad']; 
    $nombre_proveedor = $value['nombre_proveedor'];
    $codigo_compra = $value['codigo'];
    $precio_compra = $value['precio_compra'];
    $total_compra = $value['total_compra'];
    $precio_venta = $value['precio_venta'];
    $fecha_ingreso = $value['fecha_ingreso'];
    $nombre = $value['nombre'];
    $descripcion = $value['descripcion'];
    $stock = $value['stock'];
    $stock_minimo = $value['stock_minimo'];
    $stock_maximo = $value['stock_maximo'];
    $stock = $value['stock'];
    $nombre_usuario = $value['nombres'];
    $imagen = $value['imagen'];
    $stock_actual = $value['stock'];
}
?>