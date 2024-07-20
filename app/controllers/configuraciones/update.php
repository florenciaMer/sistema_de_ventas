<?php

include '../../config.php';
$id_informacion = $_GET['id_informacion'];
$nombre_empresa= $_GET['nombre_empresa'];
$actividad= $_GET['actividad'];
$sucursal= $_GET['sucursal'];
$domicilio= $_GET['domicilio'];
$zona= $_GET['zona'];
$telefono= $_GET['telefono'];
$pais= $_GET['pais'];


$sentencia= $pdo->prepare("UPDATE informaciones set 
nombre_empresa=:nombre_empresa, actividad=:actividad, sucursal=:sucursal,
domicilio=:domicilio, zona=:zona, telefono=:telefono,pais=:pais, fyh_actualizacion=:fyh_actualizacion
WHERE id_informacion=:id_informacion");


$sentencia->bindParam(':id_informacion', $id_informacion);
$sentencia->bindParam(':nombre_empresa', $nombre_empresa);
$sentencia->bindParam(':actividad', $actividad);
$sentencia->bindParam(':sucursal', $sucursal);
$sentencia->bindParam(':domicilio', $domicilio);
$sentencia->bindParam(':zona', $zona);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':pais', $pais);
$sentencia->bindParam(':fyh_actualizacion', $fechahora);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = 'se actualizo la empresa de la manera correcta';
   // header('Location:'.$URL.'/configuraciones/informaciones.php');

?>
<script>
    location.href = "<?php echo $URL; ?>/configuraciones/informaciones.php"
</script>