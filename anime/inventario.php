<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv= "x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloss.css">
    <link rel="icon" type="img/logoico.ico" href="img/logoico.ico">
</head>
    <body  background="img/fondo-solo.jpeg" >
        <div class="container">
            <div class="wrapper">
                <div class="company-info">
                <h3>Inventario</h3>
                </div>
            <form action = "formulario.php" method = "post">
            <div class="row"> 
                <div class="col-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="c_llegada">C. llegada</span>
                        </div>
                        <input type="int" class="form-control" name = "c_llegada"  required ="required">
                    </div>
                </div>
            <div class="col-4">     
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="c_actual">C. Actual</span>
                    </div>
                        <input type="text" class="form-control" name = "c_actual"  required ="required">
                </div>
            </div>
            <div class=" col-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="fecha">Fecha</span>
                    </div>
                        <input type="text" class="form-control" name = "fecha" required ="required">
                </div>    
            </div>  
            <div class="main-container">
                <table>
                    <thead>
                        <tr>
                            <th>Cantidad llegada</th>
                             <th>Cantidad Actual</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                        <?php
                        ?>
                        <tr>
                        <td><?php rtgrtrth ?></td>
                            <td><?php rtgrtrth ?></td>
                             <td><?php rtgrtrth ?></td>
                        </tr>
                        <?php
                        
                        ?>
                </table>     
            </div> 
            </div>
            <div class="clik-crud">
                    <input type=image src="img/buscar.png" width="121.8" height="39.6">
                    <input type=image src="img/save.png" width="121.8" height="39.6"> 
                    <input type=image src="img/modify.png" width="121.8" height="39.6"> 
                    <input type=image src="img/remove.png" width="121.8" height="39.6"> 
                    <input type=image src="img/clean.png" width="121.8" height="39.6">
                    <a href="index.html"><img src="img/pagina-de-inicio.png"/></a> 
                </div>
           
            </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" href="bootstrap.min.js"></script>
 
  </body>
  </html>