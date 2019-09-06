<?php

/*include("conexion.php");


$mysqli = getConn();

$query = "SELECT * FROM producto as p inner join tienda as t on p.Tienda = t.Id_tienda inner join tipo_producto as tp on p.Tipo_producto = tp.Id_Producto";
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
*/
?>