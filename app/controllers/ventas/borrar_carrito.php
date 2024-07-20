<?php

include_once('../../config.php');

$id_carrito= $_POST['id_carrito'];



$sentencia= $pdo->prepare("DELETE FROM carrito WHERE id_carrito=:id_carrito");

$sentencia->bindParam('id_carrito', $id_carrito);

if ($sentencia->execute()) {
    session_start();
    

    $_SESSION['mensaje'] = 'se elimino el item del carrito de la manera correcta';
    $_SESSION['icono'] = 'success';
   
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
    <?php

}else{
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

