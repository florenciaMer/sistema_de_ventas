
<?php
    include_once '../../config.php';
    
    $nro_venta = $_GET['nro_venta'];
        $sql_carrito = "SELECT * FROM carrito 
        INNER JOIN almacen ON almacen.id_producto = carrito.id_producto
        WHERE nro_venta = $nro_venta;";

        $query_carrito = $pdo->prepare($sql_carrito);
        $query_carrito->execute();
        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
    ?>
   
   

<?php 
echo json_encode($carrito_datos); //haciendo este echo estas respondiendo la solicitud ajax

?>

 
