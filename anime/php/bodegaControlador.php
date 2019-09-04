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

    public function buscarBodega($id_bodega)
    {
          
          
          $usu = "SELECT * FROM bodega WHERE Id_bodega='".$id_bodega."'";
          $resTotal = mysqli_query($this->conexion, $usu);

          if($resTotal->num_rows <= 0){
                echo json_encode('<div class="alert alert-danger" align="center"><strong>Bodega! </strong>Bodega no encontrado!!</div>');
                exit();
    
          }else{
             echo json_encode ($resTotal->fetch_assoc());
          }         

            
    
    }

    public function EliminarBodega($id_bodega)
    {
          
          
          $usu = "DELETE FROM bodega WHERE Id_bodega='".$id_bodega."'";
          $resTotal = mysqli_query($this->conexion, $usu);

          if(mysqli_query($this->conexion, $usu)){                
                    echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>RegistroBodega eliminada exitoso!!</div>');
            
                  }else{
                     echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Bodega no Eliminado!!</div>');
                  }         

    
    }

   public function saveBodega($id_bodega, $dept, $muni, $tel, $dir)
    {
           
           if(empty($id_bodega) && isset($id_bodega)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                      $newCli = "INSERT INTO bodega (Id_bodega, Dept, Municipio, Tel, Direccion) VALUES ('".$id_bodega."', '".$dept."', '".$muni."', '".$tel."', '".$dir."')";
                         if(mysqli_query($this->conexion, $newCli)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro en bodega exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Dato de bodega NO registrado!!</div>');
                         }

           }    
    
    }

    public function ModificarBodega ($id_bodega, $dept, $muni, $tel, $dir)
    {
           
           if(empty($id_bodega) && isset($id_bodega)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
               $newCli = "UPDATE bodega SET Dept='".$dept."', Municipio='".$muni."', Tel='".$tel."', Direccion='".$dir."' WHERE Id_bodega ='".$id_bodega."'";

                         if(mysqli_query($this->conexion, $newCli)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Bodega actualizado con exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Bodega NO Actualizado!!</div>');
                         }

           }    
    
    }
function getConn(){
    $query = "SELECT * FROM bodega";
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
              $db->saveBodega($_POST['idbodega'], $_POST['depart'], $_POST['mun'], $_POST['tele'], $_POST['dire']);
              $db->desconectar();       
         break;

     case '2':
              $db->buscarBodega($_POST['idbodega']);
              $db->desconectar(); 
         break; 

     case '3':
              $db->EliminarBodega($_POST['idbodega']);
              $db->desconectar(); 
         break;

     case '4':
              $db->ModificarBodega($_POST['idbodega'], $_POST['depart'], $_POST['mun'], $_POST['tele'], $_POST['dire']);
              $db->desconectar(); 
         break;        
     case '5':
              $db->getConn();
              $db->desconectar(); 
    break; 
     
    
 }
