<?php

include('../../config.php');

$email = $_POST['email'];
$password_user = $_POST['password'];


$contador=0;
$sql = "select * from usuarios where email='$email' ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador +1;
    $email_tb = $usuario['email'];
    $nombres_tb = $usuario['nombres'];
    $password_user_tabla = $usuario['password_user'];
    
}
 /*   session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location:'.$URL.'/index.php');
    */
if (($contador > 0) and (password_verify($password_user, $password_user_tabla))) {
    echo 'datos correctos';
    session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location:'.$URL.'/index.php');
}else {
    echo 'datos incorrectos vuelva a intentarlo';
    session_start();
    $_SESSION['mensaje'] = "Error datos incorrectos";
    header('location: '.$URL.'/login');
}

?>