<?php

include '../../config.php';

$id_producto= $_GET['id_producto'];
$stock = $_GET['stock_calculado'];


$sentencia= $pdo->prepare("UPDATE almacen set 
stock=:stock,
fyh_actualizacion=:fyh_actualizacion
WHERE id_producto=:id_producto");

$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':fyh_actualizacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    

    $_SESSION['mensaje'] = 'se actualizo el stock del producto de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas"
    </script>
    <?php

}else{
    
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/ventas"
    </script>
    <?php
  ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
}



?>

