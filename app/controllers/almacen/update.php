<?php

include '../../config.php';

$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo= $_POST['stock_minimo'];
$stock_maximo= $_POST['stock_maximo'];
$precio_compra= $_POST['precio_compra'];
$precio_venta= $_POST['precio_venta'];
$fecha_ingreso= $_POST['fecha_ingreso'];
$email= $_POST['email'];
$id_categoria= $_POST['id_categoria'];
$id_usuario= $_POST['id_usuario'];
$image_text = $_POST['image_text'];

if($_FILES['imagen']['name'] !=null){
    $nombreArchivo = date('y-m-a-i-s');
    $image_text = $nombreArchivo."__".$_FILES['imagen']['name'];
    $location ="../../../almacen/productos_img/".$image_text;
    move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
}else{
    echo "no hay imagen";
}
    $sentencia= $pdo->prepare("UPDATE almacen SET 
    nombre=:nombre, 
    descripcion=:descripcion, 
    stock=:stock, 
    stock_minimo=:stock_minimo, 
    stock_maximo=:stock_maximo, 
    precio_compra=:precio_compra, 
    precio_venta=:precio_venta, 
    id_categoria=:id_categoria,
    id_usuario= :id_usuario,
    fyh_actualizacion=:fyh_actualizacion,
    imagen=:imagen

    WHERE id_producto=:id_producto");
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('descripcion', $descripcion);
    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maximo', $stock_maximo);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('fyh_actualizacion', $fechahora);
    $sentencia->bindParam('imagen', $image_text);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'se actualizó al producto de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/almacen');

?>