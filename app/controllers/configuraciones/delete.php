<?php

include_once('../../config.php');

$id_configuracion= $_GET['id_informacion'];

$pdo->beginTransaction();

$sentencia= $pdo->prepare("DELETE FROM informaciones WHERE id_informacion=:id_configuracion");

$sentencia->bindParam('id_configuracion', $id_configuracion);

if ($sentencia->execute()) {
    session_start();
   
    $pdo->commit();
    $_SESSION['mensaje'] = 'se elimino la empresa de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/configuraciones/informaciones.php"
    </script>
    <?php

}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/configuraciones/informaciones.php"
    </script>
    <?php
  ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
    <?php
}



?>

