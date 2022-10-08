<html>
<html>
<head>
  <title>Modificar Album</title>
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
    <center><h1>ALBUM</h1></center>

    <form method="POST" action="modificar_album.php" >
    
    <div class="form-group">
      <label for="costo_alb">COSTO DEL ALBUM</label>
      <input type="text" name="costo_alb" class="form-control" id="costo_alb">
  </div>
  <div class="form-group">
      <label for="disco">DISCO DEL ALBUM</label>
      <input type="text" name="disco" class="form-control" id="disco">
  </div>
  <div class="form-group">
      <label for="nombre_alb">NOMBRE DEL ALBUM</label>
      <input type="text" name="nombre_alb" class="form-control" id="nombre_alb">
  </div>
  <div class="form-group">
      <label for="canciones_alb">NUMERO DE CANCIONES DEL ALBUM</label>
      <input type="number" name="canciones_alb" class="form-control" id="canciones_alb">
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
    $costo="";
    $disco="";
    $nombre_alb="";
    $canciones_alb="";
    if(isset($_POST['btn1']))
    {
      

      $costo = $_POST['costo_alb'];
      $disco = $_POST['disco']; 
      $nombre_alb = $_POST['nombre_alb'];
      $canciones_alb = $_POST['canciones_alb'];

      mysqli_query($conexion, "INSERT INTO $tabla_album (costo_album, disco_album,nombre_album,canciones_album) values ('$costo','$disco','$nombre_alb','$canciones_alb')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      
        $nombre_alb = $_POST['nombre_alb'];
        if($nombre_alb=="")
          {echo "Digita el nombre del album por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_album WHERE nombre_album = $nombre_alb");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Album</center></b></td>
                  <td><b><center>Costo Album</center></b></td>
                  <td><b><center>Disco del Album</center></b></td>
                  <td><b><center>Nombre del Album</center></b></td>
                  <td><b><center>Numero de Canciones del Album</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_album']."</td>
                  <td>".$consulta['costo_album']."</td>
                  <td>".$consulta['disco_album']."</td>
                  <td>".$consulta['nombre_album']."</td>
                  <td>".$consulta['canciones_album']."</td>
                </tr>
              </table>
            ";
          }
        }
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        
        $costo = $_POST['costo_alb'];
        $disco = $_POST['disco']; 
        $nombre_alb = $_POST['nombre_alb'];
        $canciones_alb = $_POST['canciones_alb'];

      if($costo=="" || $disco=="" || $nombre_alb=="" || $canciones_alb=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_album Set 
       costo_album = '$costo',
       disco_album = '$disco',    
       nombre_album = '$nombre_alb',
       canciones_album = '$canciones_alb'

        WHERE nombre_album='$nombre_alb'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_alb = $_POST['nombre_alb'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_album WHERE nombre_album='$nombre_alb'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>


</body>
</html>