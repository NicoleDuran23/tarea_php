
<html>
<head>
  <title>Eliminar Cuentas</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <center><h1>CUENTAS A ELIMINAR</h1></center>

    <form method="POST" action="eliminar_cuentas.php" >
    
  <div class="form-group">
      <label for="canciones_alb">EMAIL DEL USUARIO</label>
      <input type="text" name="canciones_alb" class="form-control" id="canciones_alb">
  </div>
  <center>
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
      <br><hr>
      
      <a class="btn btn btn-danger" href="home_admi.php" role="button">ATRAS</a>
      <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>
    </center>
</form>
<?php
include("abrir_conexion.php");
$email="";
if(isset($_POST['btn_eliminar']))
    {
        $email = $_POST['email'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_usuario WHERE email='$email_u'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
      
    }

  include("cerrar_conexion.php");
  ?>
</body>
</html>