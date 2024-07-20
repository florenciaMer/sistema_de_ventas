<?php

$sql_informaciones = "SELECT * FROM `informaciones`";
$query_informaciones = $pdo->prepare($sql_informaciones);
$query_informaciones->execute();
$informaciones_datos = $query_informaciones->fetchAll(PDO::FETCH_ASSOC);

?>