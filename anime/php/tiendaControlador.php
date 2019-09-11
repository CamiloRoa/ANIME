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

    public function buscarTienda($idtienda)
    {
          
          
         $tie = "SELECT * FROM tienda WHERE Id_tienda='".$idtienda."'";
          $resTotal = mysqli_query($this->conexion, $tie);

          if($resTotal->num_rows <= 0){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Tienda! </strong>Tienda no encontrado!!</div>');
                exit();
    
          }else{
             echo json_encode ($resTotal->fetch_assoc());
          }         

            
    
    }

    public function EliminarTienda($idtienda)
    {
          
          
          $tie = "DELETE FROM tienda WHERE Id_tienda='".$idtienda."'";
          $resTotal = mysqli_query($this->conexion, $tie);

          if(mysqli_query($this->conexion, $tie)){                
                    echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro tienda eliminada exitoso!!</div>');
            
                  }else{
                     echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>tienda no Eliminado!!</div>');
                  }         

    
    }

    public function saveTienda($idtienda, $depto, $mun, $tel, $dir)
    {
           if(empty($idtienda) && isset($idtienda)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();


           }else{
                $newTie = "INSERT INTO tienda (Id_tienda, Dept, Municipios, Tel, Direccion) VALUES ('".$idtienda."', '".$depto."', '".$mun."', '".$tel."', '".$dir."')";
                      if(mysqli_query($this->conexion, $newTie)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro tienda exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Tienda NO registrado!!</div>');
                         }
           }    
    
    }

    public function ModificarTienda ($idtienda, $depto, $mun, $tel, $dir)
    {
           
           if(empty($idtienda) && isset($idtienda)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
               $newTie = "UPDATE tienda SET Dept='".$depto."', Municipios='".$mun."', Tel='".$tel."', Direccion='".$dir."' WHERE Id_tienda ='".$idtienda."'";

                         if(mysqli_query($this->conexion, $newTie)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Tienda actualizado con exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Tienda NO Actualizado!!</div>');
                         }

           }    
    
    }
    function getConn(){
            
        $query = "SELECT * FROM tienda /*as p inner join Municipios as t on p.Municipio = t.Municipios*/"; 
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
              $db->saveTienda($_POST['id_tienda'], $_POST['departamento'], $_POST['municipio'], $_POST['tele'], $_POST['direc']);
              $db->desconectar();       
         break;

     case '2':
               //echo json_encode("hhh"); 
              $db->buscarTienda($_POST['id_tienda']);
              $db->desconectar(); 
         break; 

     case '3':
              $db->EliminarTienda($_POST['id_tienda']);
              $db->desconectar(); 
         break;

     case '4':
              $db->ModificarTienda($_POST['id_tienda'],  $_POST['departamento'], $_POST['municipio'], $_POST['tele'], $_POST['direc']);
              $db->desconectar(); 
         break;        
     case '5':
              $db->getConn();
              $db->desconectar(); 
break;    
    
 }
