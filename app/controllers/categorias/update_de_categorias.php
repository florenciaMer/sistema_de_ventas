<?php
    include '../../config.php';
    $nombre_categoria= $_GET['nombre_categoria'];
    $id_categoria= $_GET['id_categoria'];

        $sentencia= $pdo->prepare("UPDATE categorias SET
        nombre_categoria=:nombre_categoria, 
        fyh_actualizacion=:fyh_actualizacion
        WHERE id_categoria=:id_categoria");

        $sentencia->bindParam('nombre_categoria', $nombre_categoria);
        $sentencia->bindParam('fyh_actualizacion', $fechahora);
        $sentencia->bindParam('id_categoria', $id_categoria);
        
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = 'se actualizó la categoría de la manera correcta';
            $_SESSION['icono'] = 'success';
    ?>
            <script>
                location.href = "<?php echo $URL; ?>/categorias"
            </script>
    <?php }else{
            session_start();
            $_SESSION['mensaje'] = 'Error no se pudo actualizar en la base de datos.';
            $_SESSION['icono'] = 'error';
    ?>
        <script>
            location.href = "<?php echo $URL; ?>/categorias"
        </script>
    <?php }; ?>
        
