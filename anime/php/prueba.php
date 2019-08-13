<?php

require_once "modelo.php";

$db = new BaseDatos();

if($db->conectar()){
    $db->pruebadb('dino', '123456');
    $db->desconectar();
}

?>