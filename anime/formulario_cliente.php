
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv= "x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloss.css">
    <link rel="icon" type="img/logoico.ico" href="img/logoico.ico">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" href="bootstrap.min.js"></script>
    <script src="js/cliente.js"></script>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    

    
</head>
    <body background="img/fondo-solo.jpeg">
        <div class="container">
        <div class="wrapper">
        <div class="company-info">
            <h3>Formulario de clientes</h3>  
        </div>
            <div class="row"> 
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="documento">Documento</span>
                        </div>
                        <input type="int" class="form-control" id="documentoText" name ="documento" placeholder="1075273670" required ="required">
                    </div>
                </div>
                <div class="col-6">     
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="nombre">Nombre</span>
                        </div>
                            <input type="text" class="form-control" id="nombreText" name ="nombre" placeholder="pepe" required ="required">
                    </div>
                </div>
                <div class=" col-6">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="email">Email</span>
                        </div>
                            <input type="text" class="form-control" id="emailText" name ="documento" placeholder="nombre@gmail.com" required ="required">
                    </div>  
                </div>
                <div class= "col-6">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="telefono">Telefono</span>
                        </div>
                        <input type="int" class="form-control" id="telefonoText" name="telefono" placeholder="3138080953" required ="required">
                    </div>  
                </div>
                <div class="col-6">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="direccion">Direccion</span>
                        </div>
                        <input type="text" class="form-control" id="direccionText" name="direccion" placeholder="calle 4 N 2-84" required ="required">
                    </div>  
                </div>
                <div class="col-6">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="ciudad">Ciudad</span>
                        </div>
                        <input type="text" class="form-control" id="ciudadText" name="ciudad" placeholder="Neiva" required ="required">
                    </div>  
                </div>
            </div>
                <div class="clik-crud">
                    <input type=image src="img/buscar.png" width="121.8" height="39.6" onclick="Buscar();"> 
                    <input type=image src="img/save.png" width="121.8" height="39.6" onclick="Registrar();"> 
                    <input type=image src="img/modify.png" id="btnModificar" width="121.8" height="39.6" onclick="Modificar();" disabled="disabled"> 
                    <input type=image src="img/remove.png" id="btnEliminar" width="121.8" height="39.6"  onclick="EliConfir();" disabled="disabled"> 
                    <input type=image src="img/clean.png" width="121.8" height="39.6" onclick="Modificar();">
                    <a href="index.php"><img src="img/pagina-de-inicio.png"/></a>
                </div>  
                <div id="respuesta"></div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive"> 
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                        </tr>
                    </thead>
                    </div>
                    </div>
    </div> 
    </div>
    </div>
        <script type="text/javascript">
            $(document).ready(function(){     
                  $("#documentoText").keypress(function(e) {
                    if(e.which == 13) {
                      Buscar();
                         }
                  });                              
            });
        </script>
  </body>
  </html>
    </body>
</html>
        
        
       