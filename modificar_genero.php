
<html>
<head>
  <title>Modificar Generos Musicales</title>
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
    <center><h1>GENEROS MUSICALES</h1></center>

    <form method="POST" action="modificar_genero.php" >
    
  <div class="form-group">
      <label for="nombre_genero">NOMBRE DEL GENERO MUSICAL</label>
      <input type="text" name="nombre_genero" class="form-control" id="nombre_genero">
  </div>
  <div class="form-group">
      <label for="color_genero">COLOR DEL GENERO MUSICAL</label>
      <input type="text" name="color_genero" class="form-control" id="color_genero">
  </div>
  <div class="form-group">
      <label for="idioma">IDIOMA DISPONIBLE DEL GENERO MUSICAL</label>
      <input type="text" name="idioma" class="form-control" id="idioma">
  </div>
  <center>
      <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
      <br><hr>
      <a class="btn btn btn-danger" href="home_admi.php" role="button">ATRAS</a>
      <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>
    </center>
</form>
<?php
    include("abrir_conexion.php");
    $nombre_gen="";
    $color_gen="";
    $idioma="";
    if(isset($_POST['btn1']))
    {

      $nombre_gen = $_POST['nombre_genero'];
      $color_gen = $_POST['color_genero']; 
      $idioma = $_POST['idioma'];

      mysqli_query($conexion, "INSERT INTO $tabla_generos_m (nombre_gm, color_genero,idioma_disponible) values ('$nombre_gen','$color_gen','$idioma')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
        $nombre_gen = $_POST['nombre_genero'];
        if($nombre_gen=="")
          {echo "Digita el nombre de la cancion por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_generos_m WHERE nombre_gm = $nombre_gen");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Genero Musical</center></b></td>
                  <td><b><center>Nombre Genero Musical</center></b></td>
                  <td><b><center>Color del Genero Musical</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_g']."</td>
                  <td>".$consulta['nombre_gm']."</td>
                  <td>".$consulta['color_genero']."</td>
                  <td>".$consulta['idioma_disponible']."</td>
                </tr>
              </table>
            ";
          }
        }
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        $nombre_gen = $_POST['nombre_genero'];
        $color_gen = $_POST['color_genero']; 
        $idioma = $_POST['idioma'];

      if($nombre_gen=="" ||  $color_gen=="" || $idioma=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_generos_m Set 
       nombre_gm = '$nombre_gen',
       color_genero = '$color_gen',    
       idioma_disponible = '$idioma',

        WHERE nombre_gm = '$nombre_gen'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_gen = $_POST['nombre_genero'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_generos_m WHERE nombre_gm = '$nombre_gen'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>

</body>
</html>