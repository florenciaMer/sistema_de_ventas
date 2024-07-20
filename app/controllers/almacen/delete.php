<?php

include_once('../../config.php');

$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$imagen = $_POST['imagen'];

$sentencia= $pdo->prepare("DELETE FROM almacen WHERE id_producto=:id_producto");

$sentencia->bindParam('id_producto', $id_producto);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'se eliminó al producto de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/almacen');
}else {
    session_start();
    $_SESSION['mensaje'] = 'no se pudo eliminar el producto';
    $_SESSION['icono'] = 'error';
    header('Location:'.$URL.'/almacen/delete.php?id='.$id_producto);
}
?>