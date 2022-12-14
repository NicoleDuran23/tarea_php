
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
    <center><h1>PAQUETES EN PROMOCION</h1></center>

    <form method="POST" action="modificar_paquete.php" >
    
    <div class="form-group">
      <label for="anual">PAQUETE EN PROMOCION ANUAL</label>
      <input type="text" name="anual" class="form-control" id="anual">
  </div>
  <div class="form-group">
      <label for="mensual">PAQUETE EN PROMOCION MENSUAL</label>
      <input type="text" name="mensual" class="form-control" id="mensual">
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
      <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESI??N</a>
    </center>
</form>
<?php
    include("abrir_conexion.php");
    $anual="";
    $mensual="";
    $nombre_alb="";
    if(isset($_POST['btn1']))
    {

      $anual = $_POST['anual'];
      $mensual = $_POST['mensual']; 
      $nombre_alb = $_POST['nombre_alb'];

      mysqli_query($conexion, "INSERT INTO $tabla_paquetes (paquete_promocion_anual, paquete_promocion_mensual,album) values ('$anual','$mensual','$nombre_alb')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
        $nombre_alb = $_POST['nombre_alb'];
        if($nombre_alb=="")
          {echo "Digita el nombre del album por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_paquetes WHERE album= $nombre_alb");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Paquete</center></b></td>
                  <td><b><center>Paquete en Promocion Anual</center></b></td>
                  <td><b><center>Paquete en Promocion Mensual</center></b></td>
                  <td><b><center>Nombre del Album</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_paquete']."</td>
                  <td>".$consulta['paquete_promocion_anual']."</td>
                  <td>".$consulta['paquete_promocion_mensual']."</td>
                  <td>".$consulta['nombre_alb']."</td>
                </tr>
              </table>
            ";
          }
        }
           
    }
    if(isset($_POST['btn_actualizar']))
    {
        $anual = $_POST['anual'];
        $mensual = $_POST['mensual']; 
        $nombre_alb = $_POST['nombre_alb'];

      if($anual=="" ||  $mensual=="" || $nombre_alb=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_interpretes Set 
       paquete_promocion_anual = '$anual',
       paquete_promocion_mensual = '$mensual',    
       album = '$nombre_alb'  

        WHERE nombre_alb = '$nombre_alb'";

        mysqli_query($conexion,$_UPDATE_SQL);
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_alb = $_POST['nombre_alb'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_paquetes WHERE album = '$nombre_alb'";
      mysqli_query($conexion,$_DELETE_SQL);
      
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>

</body>
</html>