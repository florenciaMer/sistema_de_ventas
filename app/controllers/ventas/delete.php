<?php

include_once('../../config.php');

$nro_venta= $_GET['nro_venta'];
$id_cliente= $_GET['id_cliente'];

//$pdo->beginTransaction();
$sentencia= $pdo->prepare("DELETE FROM `ventas` WHERE ventas.nro_venta=:nro_venta");

$sentencia->bindParam(':nro_venta', $nro_venta);

if ($sentencia->execute()) {
    session_start();
    $carrito = "DELETE FROM carrito WHERE nro_venta=:nro_venta";
    $sentencia= $pdo->prepare("DELETE FROM carrito WHERE nro_venta=:nro_venta");
    $sentencia->bindParam(':nro_venta', $nro_venta);
    $sentencia->execute();

    $pdo->commit();
    $_SESSION['mensaje'] = 'se elimino la venta de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    session_start();
    $_SESSION['mensaje'] = 'se eliminó al producto de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/almacen');
}else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'no se pudo eliminar la venta';
    $_SESSION['icono'] = 'error';
    header('Location:'.$URL.'/ventas');
}

?>

