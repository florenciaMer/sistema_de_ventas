<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','ventas');
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\k2');
try {
    $pdo= new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
   // echo 'la conexion fue exitosa';
} catch (PDOException $e) {
   // print_r($e);
   echo 'error al conectar a la base de datos';
}
$URL= "/sistemaventas";

//time zone php en el buscador de google
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechahora = date('Y-m-d H:i:s');


?>