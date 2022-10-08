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
        <center><h1>REGISTRO DE USUARIOS REGISTRADOS</h1></center>
        <form method="POST" action="registros_usu.php">
            
        
        <?php
        include("abrir_conexion.php");
        

     
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_usuario    ");
          
            while($consulta = mysqli_fetch_array($resultados))
            {
                echo 
                "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>CI</center></b></td>
                  <td><b><center>Nombre y Apellido</center></b></td>
                  <td><b><center>Direccion</center></b></td>
                  <td><b><center>Nombre de Usuario</center></b></td>
                  <td><b><center>Email</center></b></td>
                  <td><b><center>Contraseña</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['CI']."</td>
                  <td>".$consulta['nombre_y_apellido']."</td>
                  <td>".$consulta['direccion']."</td>
                  <td>".$consulta['nombre_usuario']."</td>
                  <td>".$consulta['email']."</td>
                  <td>".$consulta['contrasena']."</td>
                </tr>
              </table>
                ";
             
            
            
            
        }
      

     
    
    

  include("cerrar_conexion.php");

  ?>
  <CENTer> 
      <br>
      <a class="btn btn btn-danger" href="home_admi.php" role="button">ATRAS</a>
      <br><br>
      <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>
    </CENTer>
  </form>
    </div>
    </div>

</body>
</html>