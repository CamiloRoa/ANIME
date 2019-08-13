<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv= "x-ua-compatible" content="ie=edge"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloss.css">
    <link rel="icon" type="img/logoico.ico" href="img/logoico.ico">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" href="bootstrap.min.js"></script>
    <script src="js/producto.js"></script>
    <script src="js/consulta.js"></script>

    
</head> 
<body background="img/fondo-solo.jpeg">
    <div class="container">
        <div class="wrapper">
            <div class="company-info">
            <h3>Productos</h3>
            </div>
            <div class="row"> 
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-danger" id="producto">codigo</span>
                        </div>
                        <input type="int" class="form-control" id="CodPro" name="producto"  required ="required">
                        <input type=image src="img/buscar.png" width="121.8" height="39.6" onclick="Buscar();">
                    </div>
                </div>
                <div class=" col-6">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                    <span class="btn btn-danger" id="v_unitario">valor unitario</span>
                    </div>
                <input type="text" class="form-control" id="VUPro" name="v_unitario" required ="required">
                </div>  
            </div>
            <div class= "col-6">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="costo">Costo</span>
                    </div>
                <input type="int" class="form-control" id="CostoPro" name="costo"  required ="required">
                </div> 
            </div>
            <div class="col-6">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="c_actual">C. actual</span>
                    </div>
                <input class="form-control" id="cantidad" name="c_llegada" required ="required" disabled=disabled>
                </div>  
            </div> 
            <div class="col-6">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="c_llegada">C. llegada</span>
                    </div>
                <input type="text" class="form-control" id="CllegadaPro" name="c_llegada" required ="required">
                </div>
            </div>
            <div class=" col-5">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="tienda">Tienda</span>    
                        <select name="select" id="SelTienda">
                            
                        </select>
                    </div>
                </div> 
            </div>  
            <div class=" col-5">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="btn btn-danger" id="t-productos">T. Producto</span>    
                        <select name="select" id="TipPro">                
                        </select>
                    </div>
                </div> 
            </div> 
            <div class="col-2">
                <div class="input-group mb-4">
                    <div class="subir_imagen">
                        <span class="btn btn-danger btn-file">Subir Imagen <input type="file"></span>
                    </div>
                </div>
            </div>
            <div class="col-12">  
                <div class="input-group mb-4">
                    <textarea id="DesPro" placeholder="Realice aqui una breve Descripción ..."name="comentarios" rows="5" cols="150"></textarea>
                </div>
            </div>
            </div>
            <div class="clik-crud col-12"> 
                <input type=image src="img/save.png" width="121.8" height="39.6"onclick="Registrar();"> 
                <input type=image src="img/modify.png" id="btnModificar" width="121.8" height="39.6" onclick="Modificar();" disabled="disabled"> 
                <input type=image src="img/remove.png" id="btnEliminar" width="121.8" height="39.6"  onclick="EliConfir();" disabled="disabled"> 
                <input type=image src="img/clean.png" width="121.8" height="39.6" onclick="Limpiar();">
                <a href="index.php"><img src="img/pagina-de-inicio.png"/></a>
            </div>
            <div id="respuesta"></div>
        </div>
    </div> 
  </body>
  <script src="js/consulta.js"></script>

  </html>
