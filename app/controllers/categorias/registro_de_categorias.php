<?php
include ('../../config.php');
echo $nombre_categoria = $_GET['nombre_categoria'];

$sentencia= $pdo->prepare("INSERT INTO categorias 
( nombre_categoria, fyh_creacion) 
VALUES (:nombre_categoria, :fyh_creacion);");
$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro a la categoria de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias"
    </script>
    <?php

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/categorias"
    </script>
    <?php
}

?>