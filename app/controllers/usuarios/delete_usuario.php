<?php

include '../../config.php';

$id_usuario = $_POST['id_usuario'];

$sentencia= $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->execute();
session_start();

$_SESSION['mensaje'] = 'se eliminó al usuario de la manera correcta';
$_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/usuarios');


//echo $password_user.'<br>';
//echo md5($password_user).'<br>';
//echo sha1($password_user).'<br>';
 //password_hash("password_user", PASSWORD_DEFAULT)."\n";
?>