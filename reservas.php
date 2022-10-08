<html>
<head>
  <title>Reservas</title>
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
        <center><h1>REALIZA TU RESERVA</h1></center>
        <form method="POST" action="reservas.php">
            <div class="form-group">
                <h2>BUSCADOR DE ALBUMES</h2>
                <input type="text" name="buscar" class="form-control" id="buscar">
                <input type="submit" value="Buscar" class="btn btn-info" name="btn2">
            </div>
            <div class="form-group">
            <label for="nombre_alb">Nombre del Album</label>
            <input type="text" name="nombre_alb" class="form-control" id="nombre_alb">
            </div>
            <div class="form-group">
            <label for="nombre_paq">Nombre del Paquete en Promocion</label>
            <input type="text" name="nombre_paq" class="form-control" id="nombre_paq">
            </div>
            <div class="form-group">
            <label for="ci_usu">CI Usuario</label>
            <input type="text" name="ci_usu" class="form-control" id="ci_usu">
            </div>
            <center>
                <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
                <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
                <br><hr>
      <a class="btn btn btn-danger" href="home_usu.php" role="button">ATRAS</a>
                <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>
                </center>
        </form>
        <?php
        include("abrir_conexion.php");
        $nombre_album="";
        $nombre_paquete="";
        $ci_usu="";
        $buscar="";
        if(isset($_POST['btn1']))
        {
      

      $nombre_album = $_POST['nombre_alb'];
      $nombre_paquete = $_POST['nombre_paq'];
      $ci_usu = $_POST['ci_usu'];

      mysqli_query($conexion, "INSERT INTO $tabla_reservas (nombre_reserva_album,nombre_reserva_promocion,ci_usuario) 
      values ('$nombre_album','$nombre_paquete','$ci_usu')");
     
      
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      

        $buscar = $_POST['buscar'];
        if($buscar=="") 
          {echo "Digita el nombre del album";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_album WHERE nombre_album like '%".$buscar."%'    ");
          
            while($consulta = mysqli_fetch_array($resultados))
            {
                echo 
                "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Costo Album</center></b></td>
                  <td><b><center>Disco Album</center></b></td>
                  <td><b><center>Nombre del Album</center></b></td>
                  <td><b><center>Canciones del Album</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['costo_album']."</td>
                  <td>".$consulta['disco_album']."</td>
                  <td>".$consulta['nombre_album']."</td>
                  <td>".$consulta['canciones_album']."</td>
                </tr>
              </table>
                ";
             }
            
                $resultados2 = mysqli_query($conexion,"SELECT * FROM $tabla_paquetes WHERE album like '%.$buscar.%'    ");
                while($consulta = mysqli_fetch_array($resultados2))
            
                echo 
                "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Album</center></b></td>
                  <td><b><center>Paquete Promocion Anual</center></b></td>
                  <td><b><center>Paquete Promocion Semanal</center></b></td>
                  <td><b><center>Album</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['id']."</td>
                  <td>".$consulta['paquete_promocion_anual']."</td>
                  <td>".$consulta['paquete_promocion_semanal']."</td>
                  <td>".$consulta['album']."</td>
                </tr>
              </table>
                ";
             }
            
            
        
      

     
    }
    if(isset($_POST['btn_actualizar']))
    {
        $nombre_album = $_POST['nombre_alb'];
        $nombre_paquete = $_POST['nombre_paq'];
        $ci_usu = $_POST['ci_usu'];

      if($ci_usu=="")
      {
        echo "CI obligatorio";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_reservas Set 
       nombre_reserva_album ='$nombre_album',
       nombre_reserva_promocion='$nombre_paquete',
       ci_usuario='$ci_usu'

        WHERE ci_usuario='$ci_usu'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
        $ci_usu = $_POST['ci_usu'];
        if($ci_usu=="")
        {
          echo "CI obligatorio";
        }
        else
        {
      $_DELETE_SQL =  "DELETE FROM $tabla_reservas WHERE ci_usuario='$ci_usu'";
      mysqli_query($conexion,$_DELETE_SQL);
      echo "Los datos se eliminaron Correctamente"; 
        }
    }

  include("cerrar_conexion.php");

  ?>
    </div>
    </div>

</body>
</html>