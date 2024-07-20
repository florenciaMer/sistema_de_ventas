<?php

include '../../config.php';
$nombres= $_POST['nombres'];
$email= $_POST['email'];
$id_usuario = $_POST['id_usuario'];
$id_rol= $_POST['id_rol'];
$password_user= $_POST['password_user'];
$password_repeat= $_POST['password_repeat'];

if ($password_user == '') {
    $sentencia= $pdo->prepare("UPDATE usuarios SET
    nombres=:nombres, 
    email=:email,
    id_rol=:id_rol,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('id_rol', $id_rol);
    $sentencia->bindParam('fyh_actualizacion', $fechahora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'se actualizó al usuario de la manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.$URL.'/usuarios');
}else
    if($password_user == $password_repeat){
   $password_user = password_hash($password_user, PASSWORD_DEFAULT);

    $sentencia= $pdo->prepare("UPDATE usuarios SET
    nombres=:nombres, 
    email=:email,
    id_rol=:id_rol,
    password_user=:password_user, 
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('id_rol', $id_rol);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('fyh_actualizacion', $fechahora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'se actualizó al usuario de la manera correcta';
    $_SESSION['icono'] = 'success';
        header('Location:'.$URL.'/usuarios');
}
else{
    //echo 'error las contrasenas no son iguales';
    session_start();
    $_SESSION['mensaje']= 'Error las contrasenas no son iguales';
    $_SESSION['icono'] = 'error';

    header('location:'.$URL.'/usuarios/update.php?id='.$id_usuario);
}

//echo $password_user.'<br>';
//echo md5($password_user).'<br>';
//echo sha1($password_user).'<br>';
 //password_hash("password_user", PASSWORD_DEFAULT)."\n";
?>