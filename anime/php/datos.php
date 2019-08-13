<?php
	
$conexion=mysqli_connect('localhost','root','','anime');

$departamento=$_POST['departamento'];

	$sql="SELECT id_municipio,
			     id_departamento,
			     Municipio 
		    FROM Municipios 
				WHERE id_departamento='$departamento'";


$result=mysqli_query($conexion,$sql);


while ($ver=mysqli_fetch_row($result)) {
	$cadena = $cadena."<option value=$ver[0]>".utf8_encode($ver[2]);
}

echo ($cadena);

?>
