<?php

include '../../config.php';

$nro_venta= $_GET['nro_venta'];
$id_producto= $_GET['id_producto'];
$cantidad= $_GET['cantidad'];
;

//$pdo->beginTransaction();

$sentencia= $pdo->prepare("INSERT INTO carrito 
(nro_venta, id_producto,cantidad_carrito
, fyh_creacion) 
VALUES (:nro_venta, :id_producto, :cantidad, :fyh_creacion);");

$sentencia->bindParam(':nro_venta', $nro_venta);
$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    

    //$pdo->commit();
    $_SESSION['mensaje'] = 'se registro la venta de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
    <?php

}else{
   // $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/ventas/create"
    </script>
    <?php
  ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
}



?>

