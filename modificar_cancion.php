
<html>
<head>
  <title>Modificar Cancion</title>
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
    <center><h1>CANCION</h1></center>

    <form method="POST" action="modificar_cancion.php" >
    
    <div class="form-group">
      <label for="nombre_can">NOMBRE DE LA CANCION</label>
      <input type="text" name="nombre_can" class="form-control" id="nombre_can">
  </div>
  <div class="form-group">
      <label for="duracion_can">DURACION DE LA CANCION</label>
      <input type="number" name="duracion_can" class="form-control" id="duracion_can">
  </div>
  <div class="form-group">
      <label for="color_genero">COLOR DEL GENERO MUSICAL</label>
      <input type="text" name="color_genero" class="form-control" id="color_genero">
  </div>
  <div class="form-group">
      <label for="nombre_alb">NOMBRE DEL ALBUM</label>
      <input type="text" name="nombre_alb" class="form-control" id="nombre_alb">
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
    $nombre_can="";
    $duracion="";
    $color="";
    $nombre_alb="";
    if(isset($_POST['btn1']))
    {

      $nombre_can = $_POST['nombre_can'];
      $duracion = $_POST['duracion_can']; 
      $color = $_POST['color_genero'];
      $nombre_alb = $_POST['nombre_alb'];

      mysqli_query($conexion, "INSERT INTO $tabla_cancion (nombre_c, duracion_c,genero_musical,album) values ('$nombre_can','$duracion','$color','$nombre_alb')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      
        $nombre_can = $_POST['nombre_can'];
        if($nombre_alb=="")
          {echo "Digita el nombre de la cancion por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_cancion WHERE nombre_c = $nombre_can");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Cancion</center></b></td>
                  <td><b><center>Nombre de la Cancion</center></b></td>
                  <td><b><center>Duracion de la Cancion</center></b></td>
                  <td><b><center>Color del Genero Musical</center></b></td>
                  <td><b><center>Nombre del Album</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_c']."</td>
                  <td>".$consulta['nombre_c']."</td>
                  <td>".$consulta['duracion_c']."</td>
                  <td>".$consulta['genero_musical']."</td>
                  <td>".$consulta['album']."</td>
                </tr>
              </table>
            ";
          }
        }
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        $nombre_can = $_POST['nombre_can'];
        $duracion = $_POST['duracion_can']; 
        $color = $_POST['color_genero'];
        $nombre_alb = $_POST['nombre_alb'];

      if($nombre_can=="" || $duracion=="" || $color=="" || $nombre_alb=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_album Set 
       nombre_c = '$nombre_can',
       duracion_c = '$duracion',    
       genero_musical = '$color',
       album = '$nombre_alb'

        WHERE nombre_c = '$nombre_can'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_can = $_POST['nombre_can'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_cancion WHERE nombre_cancion='$nombre_can'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>


</body>
</html>