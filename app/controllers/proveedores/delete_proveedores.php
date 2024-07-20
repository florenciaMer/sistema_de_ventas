<?php

include_once('../../config.php');

$id_proveedor= $_GET['id_proveedor'];
$sentencia= $pdo->prepare("DELETE FROM proveedores WHERE id_proveedor=:id_proveedor");

$sentencia->bindParam('id_proveedor', $id_proveedor);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'se eliminó al proveedor de la manera correcta';
    $_SESSION['icono'] = 'success';
  //  header('Location:'.$URL.'/proveedores');
  ?>
  <script>
      location.href = "<?php echo $URL; ?>/proveedores"
  </script>
  <?php

}else {
    session_start();
    $_SESSION['mensaje'] = 'no se pudo eliminar el proveedor';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/proveedores/delete_proveedores.php?id='.$id_proveedor);
}
?>