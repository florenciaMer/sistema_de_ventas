<?php

$sql_comprobantes = "SELECT * FROM comprobantes";
$query_comprobantes = $pdo->prepare($sql_comprobantes);
$query_comprobantes->execute();
$comprobantes_datos = $query_comprobantes->fetchAll(PDO::FETCH_ASSOC);
?>