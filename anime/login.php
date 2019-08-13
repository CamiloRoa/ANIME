<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv= "x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloss.css">
    <link rel="icon" type="img/logoico.ico" href="img/logoico.ico">
  </head>
  <body background="img/fondo-solo.jpeg">

    <div class="cont">
      <div class="logininicio">
      <img src="img/loginsi.png"> 
        <form action = "formulario.php" method = "post"> 
          <div class="input-group mb-3">
            <input type="text" class="form---control" name = "usuario" placeholder="Usuario" required ="required"> 
          </div>     
          <div class="input-group mb-3">
            <input type="pass" class="form---control" name = "pass" placeholder="*********" required ="required">
          </div>
            <input type="submit" value="Ingresar" class="ingresar"> 
              
        </form>      
      </div>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </div>
    <script type="text/javascript" href="bootstrap.min.js"></script>
  </body>
</html>