<?php

    $sql_ventas = "SELECT * FROM `ventas` inner join clientes where clientes.id_cliente =ventas.id_cliente
    ";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

?>