<?php

include '../../config.php';
$nombre= $_POST['nombre'];


$sentencia= $pdo->prepare("INSERT INTO roles 
( nombre, fyh_creacion) 
VALUES (:nombre, :fyh_creacion);");
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro al rol de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/roles');

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    header('Location:'.$URL.'/roles/create.php');
}
?>