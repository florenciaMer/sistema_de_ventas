<?php

$sql_ventas = "SELECT * FROM `ventas` inner join clientes on clientes.id_cliente =ventas.id_cliente
 WHERE ventas.id_venta =  '$id_venta_get' ";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $venta) {
    $nro_venta = $venta['nro_venta'];
    $id_cliente = $venta['id_cliente'];
    $nombre_cliente = $venta['nombre_cliente'];
    $nit_ci_cliente = $venta['nit_ci_cliente'];
    $celular_cliente = $venta['celular_cliente'];
    $correo_cliente = $venta['correo_cliente'];
}
?>