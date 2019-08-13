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

   public function saveProducto($cod_producto, $v_unit, $c_llegada, $cost, $desc, $img)
    {
           if(empty($cod_producto) && isset($cod_producto)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                $newPro = "INSERT INTO producto (Cod_producto, Valor_uni, Cantidad_llego, Costo, Descripcion, img) VALUES ('".$cod_producto."', '".$v_unit."', '".$c_llegada."', '".$cost."', '".$desc."', '".$img."')";
                      if(mysqli_query($this->conexion, $newPro)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro producto exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Producto NO registrado!!</div>');
                         }

           }    
    
    }

    public function ModificarProducto($cod_producto, $v_unit, $c_llegada, $cost, $desc)
    {
           
           if(empty($cod_producto) && isset($cod_producto)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                  $newPro = "UPDATE producto SET Cantidad_llego='".$c_llegada."', Costo='".$cost."', Descripcion='".$desc."', Valor_uni='".$v_unit."'  WHERE Cod_producto ='".$cod_producto."'";

                         if(mysqli_query($this->conexion, $newPro)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Producto actualizado con exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Producto NO Actualizado!!</div>');
                            //echo json_encode($cod_producto. $t_producto. $c_llegada. $cost. $desc. $v_unit);
                        }

           }    
    
    }

   
}

 $db = new BaseDatos();
 $db->conectar();
 switch ($_POST['controle']) {
     case '1':
              $db->saveProducto($_POST['product'], $_POST['uni_prod'], $_POST['cost_prod'], $_POST['cant_lleg'], $_POST['des_prod'], $_POST['imagen']);
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
              $db->ModificarProducto($_POST['product'], $_POST['uni_prod'], $_POST['cost_prod'], $_POST['cant_lleg'], $_POST['des_prod']);
              $db->desconectar(); 
         break;        
     
    
 }





