<?php

include("conexion.php");

$mysqli = getConn();
$query = "SELECT * FROM producto WHERE  Cod_producto;";
$resultado = mysqli_query($mysqli, $query);

if(!$resultado){
    die ("Error");
}else{
    while( $data = mysqli_fetch_assoc($resultado)){
        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);
mysqli_close($mysqli);

?>