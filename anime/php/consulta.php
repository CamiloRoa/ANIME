<?php

require_once 'conexion.php';

function getListas(){
    $mysqli = getConn();
    $query = 'SELECT * FROM `tipo_producto`';
    $result = $mysqli->query($query);
    $listas = '<option value="0"> Seleccione Producto</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[Id_Producto]'>$row[Tipo]</option>";
    }
    return $listas;
}
echo getListas(); 


function getTienda(){
    $mysql = getConn();
    $querty = 'SELECT * FROM `tienda`';
    $resultado = $mysqli->querty($querty);
    $tiendas = '<option value="0"> Seleccione Tienda</option>';
    while($rows = $resultado->fetch_array(MYSQLI_ASSOC)){
        $tiendas .= "<option value='$rows[Id_tienda]'>$rows[Id_tienda]</option>";
    }
    return $tiendas;
}
echo getTienda(); 
?>