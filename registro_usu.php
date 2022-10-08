<html>
<html>
<head>
  <title>Programando Ando</title>
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
    <center><h1>REGISTRO USUARIOS</h1></center>

    <form method="POST" action="registro_usu.php" >
    <div class="form-group">
      <label for="ci">CI</label>
      <input type="number" name="ci" class="form-control" id="ci">
  </div>
    <div class="form-group">
      <label for="nombre">NOMBRE Y APELLIDO</label>
      <input type="text" name="nombre" class="form-control" id="nombre">
  </div>
  <div class="form-group">
      <label for="dir">DIRECCION</label>
      <input type="text" name="dir" class="form-control" id="dir">
  </div>
  <div class="form-group">
      <label for="nombre_u">NOMBRE USUARIO</label>
      <input type="text" name="nombre_u" class="form-control" id="nombre_u">
  </div>
  <div class="form-group">
      <label for="email">EMAIL</label>
      <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
      <label for="pass">CONTRASEÑA</label>
      <input type="text" name="pass" class="form-control" id="pass" typesize="4">
  </div>
  <center>
      <input type="submit" value="Enviar" class="btn btn-success" name="btn_registrar">
      <br><hr>
      <a button type="button" class="btn btn-danger" href="cerrar_sesion.php" role="button" name="btn_salir">SALIR</a>
    </center>
</form>
<?php
    include('abrir_conexion.php');
    $nombre="";
    $ci="";
    $dir="";
    $nombre_u="";
    $email="";
    $pass="";
    if(isset($_POST['btn_registrar']))
    {
      $ci = $_POST['ci'];
      $nombre = $_POST['nombre'];
      $dir = $_POST['dir'];
      $nombre_u = $_POST['nombre_u'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      if($nombre=="" || $ci=="" || $dir=="" || $nombre_u=="" || $email==""|| $pass=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
        mysqli_query($conexion,"INSERT INTO $tabla_usuario (CI, nombre_y_apellido,direccion, nombre_usuario, email, contrasena)  VALUES 
         ('$ci','$nombre','$dir','$nombre_u','$email','$pass')");
         echo "Se registro correctamente";
        
        
      }
    }


  include('cerrar_conexion.php');

  ?>


</body>
</html>