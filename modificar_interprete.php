
<html>
<head>
  <title>Modificar Interprete</title>
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
    <center><h1>INTERPRETES</h1></center>

    <form method="POST" action="modificar_interprete.php" >
    
    <div class="form-group">
      <label for="valor">VALOR DEL INTERPRETE</label>
      <input type="number" name="valor" class="form-control" id="valor">
  </div>
  <div class="form-group">
      <label for="costo_inter">COSTO DEL INTERPRETE</label>
      <input type="number" name="costo_inter" class="form-control" id="costo_inter">
  </div>
  <div class="form-group">
      <label for="nombre_inter">NOMBRE DEL INTERPRETE</label>
      <input type="text" name="nombre_inter" class="form-control" id="nombre_inter">
  </div>
  <div class="form-group">
      <label for="alias">ALIAS DEL INTEPRETE</label>
      <input type="text" name="alias" class="form-control" id="alias">
  </div>
  <div class="form-group">
      <label for="actividad">ACITIVIDAD DEL INTERPRETE</label>
      <input type="number" name="actividad" class="form-control" id="actividad">
  </div>
  <div class="form-group">
      <label for="pais">PAIS DEL INTEPRETE</label>
      <input type="number" name="pais" class="form-control" id="pais">
  </div>
  <div class="form-group">
      <label for="cancion_inter">CANCION INTERPRETADA</label>
      <input type="number" name="cancion_inter" class="form-control" id="cancion_inter">
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
    $valor="";
    $costo="";
    $nombre_inter="";
    $alias="";
    $actividad="";
    $pais="";
    $cancion_inter="";
    if(isset($_POST['btn1']))
    {

      $valor = $_POST['valor'];
      $costo = $_POST['costo_inter']; 
      $nombre_inter = $_POST['nombre_inter'];
      $alias = $_POST['alias'];
      $actividad = $_POST['actividad']; 
      $pais = $_POST['pais'];
      $cancion_inter = $_POST['cancion_inter'];

      mysqli_query($conexion, "INSERT INTO $tabla_interpretes (valor_inter, costo_inter,nombre_inter,alias_inter,activo,id_pais,cancion) values ('$valor','$costo','$nombre_inter','$alias','$actividad','$pais','$cancion_inter')");
         
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
        $nombre_inter = $_POST['nombre_inter'];
        if($nombre_inter=="")
          {echo "Digita el nombre del interprete por favor.";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_interpretes WHERE nombre_inter = $nombre_inter");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Id Interprete</center></b></td>
                  <td><b><center>Valor del Interprete</center></b></td>
                  <td><b><center>Costo del Interprete</center></b></td>
                  <td><b><center>Nombre del Interprete</center></b></td>
                  <td><b><center>Alias del Interprete</center></b></td>
                  <td><b><center>Actividad del Interprete</center></b></td>
                  <td><b><center>Pais del Interprete</center></b></td>
                  <td><b><center>Cancion Interpretada</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id_inter']."</td>
                  <td>".$consulta['valor_inter']."</td>
                  <td>".$consulta['costo_inter']."</td>
                  <td>".$consulta['nombre_inter']."</td>
                  <td>".$consulta['alias_inter']."</td>
                  <td>".$consulta['activo']."</td>
                  <td>".$consulta['id_pais']."</td>
                  <td>".$consulta['cancion']."</td>
                </tr>
              </table>
            ";
          }
        }
           
    }
    if(isset($_POST['btn_actualizar']))
    {
        $valor = $_POST['valor'];
        $costo = $_POST['costo_inter']; 
        $nombre_inter = $_POST['nombre_inter'];
        $alias = $_POST['alias'];
        $actividad = $_POST['actividad']; 
        $pais = $_POST['pais'];
        $cancion_inter = $_POST['cancion_inter'];

      if($valor=="" ||  $costo=="" || $nombre_inter=="" ||  $alias=="" ||$actividad=="" ||  $pais=="" || $cancion_inter=="")
      {
        echo "los campos son obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_interpretes Set 
       valor_inter = '$valor',
       costo_inter = '$costo',    
       nombre_inter = '$nombre_inter',
       alias_inter = '$alias',
       activo = '$actividad', 
       id_pais = '$pais',
       cancion = '$cancion_inter'    

        WHERE nombre_inter = '$nombre_inter'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $nombre_inter = $_POST['nombre_inter'];
      
      $_DELETE_SQL =  "DELETE FROM $tabla_interpretes WHERE nombre_inter = '$nombre_inter'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
    }

  include("cerrar_conexion.php");

  ?>

</body>
</html>