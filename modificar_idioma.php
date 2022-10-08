
<html>
<head>
  <title>Modificar Idioma</title>
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
    <center><h1>IDIOMAS DISPONIBLES</h1></center>

    <form method="POST" action="modificar_idioma.php" >
    
  <div class="form-group">
      <label for="nombre_idi">NOMBRE DEL IDIOMA</label>
      <input type="text" name="nombre_idi" class="form-control" id="nombre_idi">
  </div>
  <div class="form-group">
      <label for="cantidad">CANTIDAD DEL IDIOMA</label>
      <input type="number" name="cantidad" class="form-control" id="cantidad">
  </div>
  <div class="form-group">
      <label for="total">TOTAL IDIOMA</label>
      <input type="number" name="total" class="form-control" id="total">
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
    $nombre_idi="";
    $cantidad="";
    $total="";
    if(isset($_POST['btn1']))
    {

      $nombre_idi = $_POST['nombre_idi'];
      $cantidad = $_POST['cantidad']; 
      $total = $_POST['total'];

      mysqli_query($conexion, "INSERT INTO $tabla_idiomas (nombre_idioma, cantidad_idioma,total_idioma) values ('$nombre_idi','$cantidad','$total')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
        $nombre_idi = $_POST['nombre_idi'];
        if($nombre_idi=="")
          {echo "Digita el nombre del idioma por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_idiomas WHERE nombre_idioma = $nombre_idi");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Idioma</center></b></td>
                  <td><b><center>Nombre del Idioma</center></b></td>
                  <td><b><center>Cantidad del Idioma</center></b></td>
                  <td><b><center>Total del Idioma</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_idioma']."</td>
                  <td>".$consulta['nombre_idioma']."</td>
                  <td>".$consulta['cantidad_idioma']."</td>
                  <td>".$consulta['total_idioma']."</td>
                </tr>
              </table>
            ";
          }
        }
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        $nombre_idi = $_POST['nombre_idi'];
        $cantidad = $_POST['cantidad']; 
        $total = $_POST['total'];

      if($nombre_idi=="" ||  $cantidad=="" || $total=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_album Set 
       nombre_idioma = '$nombre_idi',
       cantidad_idioma = '$cantidad',    
       total_idioma = '$total',

        WHERE nombre_idioma = '$nombre_idi'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_idi = $_POST['nombre_idi'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_cancion WHERE nombre_idioma = '$nombre_idi'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>

</body>
</html>