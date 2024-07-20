<?php

include '../../config.php';
$nombre= $_POST['rol'];
$id_rol= $_POST['id_rol'];

    $sentencia= $pdo->prepare("UPDATE roles SET
    nombre=:nombre, 
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_rol=:id_rol");

    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('fyh_actualizacion', $fechahora);
    $sentencia->bindParam('id_rol', $id_rol);
    
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'se actualizó al rol de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location: '.$URL.'/roles');
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error no se pudo actualizar en la base de datos.';
        $_SESSION['icono'] = 'error';
        header('Location:'.$URL.'/roles/update.php?='.$id_rol);
    }
?>