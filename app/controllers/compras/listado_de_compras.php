<?php

    $sql_compras = "SELECT * FROM `compras` 
    INNER JOIN proveedores ON compras.id_proveedor = proveedores.id_proveedor 
    INNER JOIN usuarios ON compras.id_usuario = usuarios.id_usuario INNER JOIN almacen ON almacen.id_producto = compras.id_producto 
    INNER JOIN categorias ON categorias.id_categoria = almacen.id_categoria;";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

?>