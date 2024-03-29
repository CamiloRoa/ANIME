<?php

require_once "config.php";

class BaseDatos
{
    protected $conexion;
    protected $db;

    public function conectar()
    {
        $this->conexion = new mysqli(HOST, USER, PASS, DBNAME);
            if($this->conexion->connect_errno){
                exit("Fallo en la conexión al servidor");
            }
            return true;
              
    }

    public function desconectar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }

    }

    public function buscarProducto($cod_producto)
    {
          
          
          $prod = "SELECT * FROM producto WHERE Cod_producto='".$cod_producto."'";
          $resTotal = mysqli_query($this->conexion, $prod);

          if($resTotal->num_rows <= 0){
                echo json_encode('<div class="alert alert-danger" align="center"><strong>Producto! </strong>Producto no encontrado!!</div>');
                exit();
    
          }else{
             echo json_encode ($resTotal->fetch_assoc());
          }         
    
    }

    public function EliminarProducto($cod_producto)
    {
          
          
          $prod = "DELETE FROM producto WHERE Cod_producto='".$cod_producto."'";
          $resTotal = mysqli_query($this->conexion, $prod);

          if(mysqli_query($this->conexion, $prod)){                
                    echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Producto Eliminado exitoso!!</div>');
            
                  }else{
                     echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Producto no Eliminado!!</div>');
                  }         

             
    
    }

   public function saveProducto($cod_producto, $v_unit, $cost, $c_llegada, $tipo_prod, $nom_tienda, $desc, $img)
    {
           if(empty($cod_producto) && isset($cod_producto)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                $newPro = "INSERT INTO producto (Cod_producto, Valor_uni, Costo, Cantidad_llego, Tipo_producto, Tienda, Descripcion, img) VALUES ('".$cod_producto."', '".$v_unit."', '".$cost."', '".$c_llegada."', '".$tipo_prod."', '".$nom_tienda."', '".$desc."', '".$img."')";
                      if(mysqli_query($this->conexion, $newPro)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro producto exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Producto NO registrado!!</div>');
                         }

           }    
    
    }

    public function ModificarProducto($cod_producto, $v_unit, $cost, $c_llegada, $tipo_prod, $nom_tienda, $desc)
    {
           
           if(empty($cod_producto) && isset($cod_producto)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                  $newPro = "UPDATE producto SET Valor_uni='".$v_unit."', Costo='".$cost."', Cantidad_llego='".$c_llegada."', Tipo_producto='".$tipo_prod."', Tienda='".$nom_tienda."', Descripcion='".$desc."'  WHERE Cod_producto ='".$cod_producto."'";

                         if(mysqli_query($this->conexion, $newPro)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Producto actualizado con exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Producto NO Actualizado!!</div>');
                            //echo json_encode($cod_producto. $t_producto. $c_llegada. $cost. $desc. $v_unit);
                        }

           }    
    
    }
	function getTProducto(){
			
        $query = 'SELECT * FROM `tipo_producto`' ;
        $result = mysqli_query($this->conexion, $query); 			
        $listas = '<option value="0"> Seleccione Producto</option>';
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[Id_Producto]'>$row[Tipo]</option>";
        
        }
        echo $listas;
        
        
}

    function getTienda(){			
        $query = 'SELECT * FROM `tienda`';
        $result = mysqli_query($this->conexion, $query); 			
        $listas = '<option value="0"> Seleccione Tienda</option>';
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[Id_tienda]'>$row[Tienda]</option>";
        
        }
        echo $listas;
}
    function getConn(){
        $query = "SELECT * FROM producto as p inner join tienda as t on p.Tienda = t.Id_tienda inner join tipo_producto as tp on p.Tipo_producto = tp.Id_Producto";
        $resultado = mysqli_query($this->conexion, $query);

    if(!$resultado){
        die ("Error");
}   else{
        while( $data = mysqli_fetch_assoc($resultado)){
        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);
}

   
}

 $db = new BaseDatos();
 $db->conectar();
 switch ($_POST['controle']) {
     case '1':
              $db->saveProducto($_POST['product'], $_POST['uni_prod'], $_POST['cost_prod'], $_POST['cant_lleg'], $_POST['tipop'], $_POST['tienda'], $_POST['des_prod'], $_POST['imagen']);
              $db->desconectar();       
         break;

     case '2':
              $db->buscarProducto($_POST['product']);
              $db->desconectar(); 
         break; 

     case '3':
              $db->EliminarProducto($_POST['product']);
              $db->desconectar(); 
         break;

     case '4':
              $db->ModificarProducto($_POST['product'], $_POST['uni_prod'], $_POST['cost_prod'], $_POST['cant_lleg'], $_POST['tipop'], $_POST['tienda'], $_POST['des_prod']);
              $db->desconectar(); 
         break;        
     
     case '5':
              $db->getTProducto();
              $db->desconectar(); 
         break; 

     case '6':
              $db->getTienda();
              $db->desconectar(); 
         break;  
     case '7':
              $db->getConn();
              $db->desconectar(); 
         break; 
    
}





