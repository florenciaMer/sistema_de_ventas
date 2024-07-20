<?php

include '../../config.php';
$nombres= $_POST['nombres'];
$email= $_POST['email'];
$id_rol= $_POST['rol'];

$password_user= $_POST['password_user'];
$password_repeat= $_POST['password_repeat'];

if ($password_user == $password_repeat) {
   $password_user = password_hash($password_user, PASSWORD_DEFAULT);

$sentencia= $pdo->prepare("INSERT INTO usuarios 
( nombres, email, id_rol, password_user, fyh_creacion) 
VALUES (:nombres, :email, :id_rol,:password_user,:fyh_creacion);");

$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('id_rol', $id_rol);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('fyh_creacion', $fechahora);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = 'se registro al usuario de la manera correcta';
    header('Location:'.$URL.'/usuarios');
}
else{
    //echo 'error las contrasenas no son iguales';
    session_start();
    $_SESSION['mensaje']= 'Error las contrasenas no son iguales';
    header('location:'.$URL.'/usuarios/create.php');
}

//echo $password_user.'<br>';
//echo md5($password_user).'<br>';
//echo sha1($password_user).'<br>';
 //password_hash("password_user", PASSWORD_DEFAULT)."\n";
?>