<?php

include '../../config.php';

$nro_venta= $_GET['nro_venta'];
$id_cliente= $_GET['id_cliente'];
$total_pagado= $_GET['total_pagado'];


$pdo->beginTransaction();

$sentencia= $pdo->prepare("INSERT INTO ventas 
(nro_venta,id_cliente,total_pagado, fyh_creacion) 
VALUES (:nro_venta, :id_cliente, :total_pagado,:fyh_creacion);");

$sentencia->bindParam(':nro_venta', $nro_venta);
$sentencia->bindParam(':id_cliente', $id_cliente);
$sentencia->bindParam(':total_pagado', $total_pagado);
$sentencia->bindParam(':fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    
    $pdo->commit();
    $_SESSION['mensaje'] = 'se registro la venta de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas"
    </script>
    <?php

}else{
    $pdo->rollBack();
    
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
    <?php
  ?>
<?php
}
?>

