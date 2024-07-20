<?php

include_once('../../config.php');

$id_compra= $_GET['id_compra'];
$id_producto= $_GET['id_producto'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_actual = $_GET['stock_actual'];

$pdo->beginTransaction();

$sentencia= $pdo->prepare("DELETE FROM compras WHERE id_compra=:id_compra");

$sentencia->bindParam('id_compra', $id_compra);

if ($sentencia->execute()) {
    session_start();
    $stock = $stock_actual - $cantidad_compra;
    $sentencia= $pdo->prepare("UPDATE almacen SET 
    stock=:stock
    
    WHERE id_producto=:id_producto");
    $sentencia->bindParam(':id_producto', $id_producto);
    $sentencia->bindParam(':stock', $stock);
    $sentencia->execute();

    $pdo->commit();
    $_SESSION['mensaje'] = 'se elimino la compra de la manera correcta';
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

