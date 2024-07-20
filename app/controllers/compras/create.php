<?php

include '../../config.php';

$id_producto= $_GET['id_producto'];
$nro_compra= $_GET['numero_compra'];
$fecha_compra= $_GET['fecha_compra'];
$id_proveedor= $_GET['id_proveedor'];
$id_comprobante= $_GET['id_comprobante'];
$total_compra= $_GET['total_compra'];
$cantidad= $_GET['cantidad'];
$id_usuario= $_GET['id_usuario'];
$stock_total= $_GET['stock_total'];

$pdo->beginTransaction();

$sentencia= $pdo->prepare("INSERT INTO compras 
(id_producto,nro_compra,fecha_compra,id_proveedor,id_comprobante,id_usuario, total_compra,cantidad
, fyh_creacion) 
VALUES (:id_producto, :nro_compra, :fecha_compra, :id_proveedor,:id_comprobante, :id_usuario, 
:total_compra, :cantidad,:fyh_creacion);");

$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':nro_compra', $nro_compra);
$sentencia->bindParam(':fecha_compra', $fecha_compra);
$sentencia->bindParam(':id_proveedor', $id_proveedor);
$sentencia->bindParam(':id_comprobante', $id_comprobante);
$sentencia->bindParam(':total_compra', $total_compra);
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->bindParam(':fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $sentencia= $pdo->prepare("UPDATE almacen SET 
    stock=:stock
    
    WHERE id_producto=:id_producto");
    $sentencia->bindParam(':id_producto', $id_producto);
    $sentencia->bindParam(':stock', $stock_total);
    $sentencia->execute();

    $pdo->commit();
    $_SESSION['mensaje'] = 'se registro la compra de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php

}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
  ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
}



?>

