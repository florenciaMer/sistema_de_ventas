<?php

include '../../config.php';

$codigo= $_POST['codigo'];
$id_categoria= $_POST['id_categoria'];
$nombre= $_POST['nombre'];
$id_usuario= $_POST['id_usuario'];
$descripcion= $_POST['descripcion'];
$stock= $_POST['stock'];
$stock_minimo= $_POST['stock_minimo'];
$stock_maximo= $_POST['stock_maximo'];
$precio_venta= $_POST['precio_venta'];
$precio_compra= $_POST['precio_compra'];
$fecha_ingreso= $_POST['fecha_ingreso'];

$imagen= $_POST['imagen'];
$nombreArchivo = date('Y-m-d-h-i-s');
$fileName = $nombreArchivo."__".$_FILES['imagen']['name'];
$location ="../../../almacen/productos_img/".$fileName;
move_uploaded_file($_FILES['imagen']['tmp_name'],$location);



$sentencia= $pdo->prepare("INSERT INTO almacen 
(codigo, nombre,descripcion, stock,stock_minimo,stock_maximo,precio_compra, 
precio_venta, fecha_ingreso, imagen, id_usuario, id_categoria, fyh_creacion) 
VALUES (:codigo, :nombre,:descripcion, :stock,:stock_minimo, :stock_maximo,
 :precio_compra, :precio_venta, :fecha_ingreso, :imagen , :id_usuario, :id_categoria, :fyh_creacion);");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $fileName);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro el producto de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/almacen');

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    header('Location:'.$URL.'/almacen/create.php');
}
?>