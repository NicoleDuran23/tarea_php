
<html>
<head>
  <title>Modificar Actividad</title>
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
    <center><h1>ACTIVIDAD INTERPRETE</h1></center>

    <form method="POST" action="modificar_actividad.php" >
    
  <div class="form-group">
      <label for="actividad">NOMBRE DEL ACTIVO</label>
      <input type="text" name="actividad" class="form-control" id="actividad">
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
    $activo="";
    if(isset($_POST['btn1']))
    {
      $activo = $_POST['actividad'];

      mysqli_query($conexion, "INSERT INTO $tabla_activo (nombre_activo) values ('$activo')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      
        $activo = $_POST['actividad'];
        if($activo=="")
          {echo "Digita el nombre del activo por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_activo WHERE doc = $nombre_alb");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Activo</center></b></td>
                  <td><b><center>Nombre Activo</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_activo']."</td>
                  <td>".$consulta['nombre_activo']."</td>
                </tr>
              </table>
            ";
          }
        }
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        $activo = $_POST['actividad'];

      if($activo=="" )
      {
        echo "Digita el nombre del activo por favor.";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_activo Set 
       nombre_activo = '$activo'

        WHERE nombre_activo = '$activo'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $activo = $_POST['actividad'];

      $_DELETE_SQL =  "DELETE FROM $tabla_activo WHERE nombre_activo='$activo'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>


</body>
</html>