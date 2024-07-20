<?php

include '../../config.php';
$nombre_empresa= $_GET['nombre_empresa'];
$actividad= $_GET['actividad'];
$sucursal= $_GET['sucursal'];
$domicilio= $_GET['domicilio'];
$zona= $_GET['zona'];
$telefono= $_GET['telefono'];
$pais= $_GET['pais'];




$sentencia= $pdo->prepare("INSERT INTO informaciones 
( nombre_empresa, actividad, sucursal, domicilio,zona, telefono,pais, fyh_creacion) 
VALUES (:nombre_empresa, :actividad, :sucursal,:domicilio,:zona,:telefono,:pais, :fyh_creacion);");

$sentencia->bindParam('nombre_empresa', $nombre_empresa);
$sentencia->bindParam('actividad', $actividad);
$sentencia->bindParam('sucursal', $sucursal);
$sentencia->bindParam('domicilio', $domicilio);
$sentencia->bindParam('zona', $zona);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('pais', $pais);
$sentencia->bindParam(':fyh_creacion', $fechahora);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = 'se registro la empresa de la manera correcta';
   // header('Location:'.$URL.'/configuraciones/informaciones.php');

?>
<script>
    location.href = "<?php echo $URL; ?>/configuraciones/informaciones.php"
</script>