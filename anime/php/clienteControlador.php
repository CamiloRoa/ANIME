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

    public function buscarCliente($documento)
    {
          
          
          $usu = "SELECT * FROM clientes WHERE N_Documento='".$documento."'";
          $resTotal = mysqli_query($this->conexion, $usu);
          //echo json_encode($resTotal->result_array());         

          if($resTotal->num_rows <= 0){
                echo json_encode('<div class="alert alert-danger" align="center"><strong>Cliente! </strong>Cliente no encontrado!!</div>');
                exit();
    
          }else{
             echo json_encode ($resTotal->fetch_assoc());
          }         

             /*while ($fila = $resTotal->fetch_assoc()) {                      
                       echo json_encode($fila['usuario']." ".$psw == $fila["psw"])
                    }  */ 
    
    }

    public function EliminarCliente($documento)
    {
          
          
          $usu = "DELETE FROM clientes WHERE N_Documento='".$documento."'";
          $resTotal = mysqli_query($this->conexion, $usu);
          //echo json_encode($resTotal->result_array());         

          if(mysqli_query($this->conexion, $usu)){                
                    echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Cliente Eliminado!!</div>');
            
                  }else{
                     echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Cliente no Eliminado!!</div>');
                  }         

             /*while ($fila = $resTotal->fetch_assoc()) {                      
                       echo json_encode($fila['usuario']." ".$psw == $fila["psw"])
                    }  */ 
    
    }

    //public function saveCliente($documento, $name, $email, $telelfono, $direccion, $ciudad)
   public function saveCliente($documento, $name, $email, $tel, $dir, $ciudad)
    {
           
           if(empty($documento) && isset($documento)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
                      $newCli = "INSERT INTO clientes (Nombres, N_Documento, Email, Tel, Dir, Ciudad) VALUES ('".$name."', '".$documento."', '".$email."', '".$tel."', '".$dir."', '".$ciudad."')";
                         if(mysqli_query($this->conexion, $newCli)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>Registro cliente exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Cliente NO registrado!!</div>');
                         }

           }    
    
    }

    public function ModificarCliente($documento, $name, $email, $tel, $dir, $ciudad)
    {
           
           if(empty($documento) && isset($documento)){
               echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>campos vaciosssssss!!</div>');
               exit();

           }else{
               $newCli = "UPDATE clientes SET Nombres='".$name."', Email='".$email."', Tel='".$tel."', Dir='".$dir."', Ciudad='".$ciudad."' WHERE N_Documento ='".$documento."'";

                         if(mysqli_query($this->conexion, $newCli)){
                             echo json_encode('<div class="alert alert-success" align="center"><strong>Exitoso! </strong>cliente actualizado con exitoso!!</div>');
                         }else{
                            echo json_encode('<div class="alert alert-danger" align="center"><strong>Error! </strong>Cliente NO Actualizado!!</div>');
                         }

           }    
    
    }

   
}

 $db = new BaseDatos();
 $db->conectar();
 switch ($_POST['controle']) {
     case '1':
              $db->saveCliente($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['direccion'], $_POST['ciudad']);
              $db->desconectar();       
         break;

     case '2':
              $db->buscarCliente($_POST['cedula']);
              $db->desconectar(); 
         break; 

     case '3':
              $db->EliminarCliente($_POST['cedula']);
              $db->desconectar(); 
         break;

     case '4':
              $db->ModificarCliente($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['direccion'], $_POST['ciudad']);
              $db->desconectar(); 
         break;        
     
    
 }





