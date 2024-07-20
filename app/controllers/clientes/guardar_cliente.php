<?php

include '../../config.php';

$nombre_cliente= $_POST['nombre_cliente'];
$nit_ci_cliente= $_POST['nit_ci_cliente'];
$celular_cliente= $_POST['celular_cliente'];
$correo_cliente= $_POST['correo_cliente'];


$pdo->beginTransaction();

$sentencia= $pdo->prepare("INSERT INTO clientes 
(nombre_cliente,nit_ci_cliente,celular_cliente,correo_cliente, fyh_creacion) 
VALUES (:nombre_cliente, :nit_ci_cliente, :celular_cliente, :correo_cliente,:fyh_creacion);");

$sentencia->bindParam(':nombre_cliente', $nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
$sentencia->bindParam(':celular_cliente', $celular_cliente);
$sentencia->bindParam(':correo_cliente', $correo_cliente);
$sentencia->bindParam(':fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    
    $pdo->commit();
    $_SESSION['mensaje'] = 'se registro el cliente de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
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
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
}



?>

