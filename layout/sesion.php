<?php

session_start();
if (isset($_SESSION['sesion_email'])) {
 $emailSesion = $_SESSION['sesion_email'];
 $sql = "SELECT us.id_usuario, us.nombres, us.email, rol.nombre 
 FROM usuarios as us 
 INNER JOIN roles as rol ON us.id_rol = rol.id_rol where email= '$emailSesion'";
 $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($usuarios as $usuario) {
      $nombresSesion = $usuario['nombres'];
      $rolSesion = $usuario['nombre'];
      $id_usuarioSesion = $usuario['id_usuario'];
      $emailSesion = $usuario['email'];
  }

  } else {
   echo 'no existe la session';
   header('Location:' .$URL.'/login/index.php');
  }

  ?>