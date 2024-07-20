<?php
include ('../../config.php');
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['nombre_empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

$sentencia= $pdo->prepare("INSERT INTO proveedores 
(nombre_proveedor, celular, telefono, empresa, email, direccion, fyh_creacion) 
VALUES (:nombre_proveedor, :celular, :telefono, :empresa, :email, :direccion, :fyh_creacion);");

$sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam('celular', $celular);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('empresa', $empresa);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('fyh_creacion', $fechahora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'se registro al proveedor de la manera correcta';
    $_SESSION['icono'] = 'success';
    //header('Location:'.$URL.'/categorias');
    
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores"
    </script>
    <?php

}else{
    session_start();
    $_SESSION['mensaje'] = 'error los datos no pudieron registrarse';
    $_SESSION['icono'] = 'error';
    //header('Location:'.$URL.'/categorias');
    ?>
    <script>
        Location.href = "<?php echo $URL; ?>/proveedores"
    </script>
    <?php
}

?>