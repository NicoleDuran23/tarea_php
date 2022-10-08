<html>
<head>
  <title>Compras</title>
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
        <center><h1>REALIZA TU COMPRA</h1></center>
        <form method="POST" action="compras.php">
            <div class="form-group">
                <h2>BUSCADOR DE RESERVAS</h2>
                <input type="text" name="buscar" class="form-control" id="buscar">
                <input type="submit" value="Buscar" class="btn btn-info" name="btn2">
            </div>
            <div class="form-group">
            <label for="numero_c">NUMERO DE COMPRAS</label>
            <input type="number" name="numero_c" class="form-control" id="numero_c">
            </div>
            <div class="form-group">
            <label for="color">COLOR DEL ALBUM</label>
            <input type="text" name="color" class="form-control" id="color">
            </div>
            <div class="form-group">
            <label for="tarjeta">TARJETA DE CREDITO</label>
            <input type="number" name="tarjeta" class="form-control" id="tarjeta">
            </div>
            <div class="form-group">
            <label for="id_reser">ID DE RESERVA</label>
            <input type="number" name="id_reser" class="form-control" id="id_reser">
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
        $numero="";
        $color="";
        $tarjeta="";
        $id_reser="";
        if(isset($_POST['btn1']))
        {
      

        $numero = $_POST['numero_c'];
        $color = $_POST['color'];
        $tarjeta = $_POST['tarjeta'];
        $id_reser = $_POST['id_reser'];

      mysqli_query($conexion, "INSERT INTO $tabla_compras (nro_compras,color_genero_album,tarjeta_compras,id_reserva) 
      values ('$numero','$color','$tarjeta','$id_reser')");
     
      
      
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {

        $buscar = $_POST['buscar'];
        if($buscar=="") 
          {echo "Digite su CI";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_reservas WHERE  ci_usuario='$buscar'    ");
          
            while($consulta = mysqli_fetch_array($resultados))
            {
              echo 
              "
            <table width=\"100%\" border=\"1\">
              <tr>
                <td><b><center>Id Reserva</center></b></td>
                <td><b><center>Nombre de Reserva de Album</center></b></td>
                <td><b><center>Nombre de Reserva de Paquete</center></b></td>
                <td><b><center>CI de Usuario</center></b></td>
              </tr>
              <tr>
                <td>".$consulta['id_reserva']."</td>
                <td>".$consulta['nombre_reserva_album']."</td>
                <td>".$consulta['nombre_reserva_promocion']."</td>
                <td>".$consulta['ci_usuario']."</td>
              </tr>
            </table>
              ";
             }
         
            
            }
     }
      

     
    
    if(isset($_POST['btn_actualizar']))
    {
      $numero = $_POST['numero'];
      $color = $_POST['color'];
      $tarjeta = $_POST['tarjeta'];
      $id_reser = $_POST['id_reser'];

      if($numero=="" || $color=="" || $tarjeta=="" || $id_reser=="")
      {
        echo "Campos obligatorios";
      }
      else
      {
       $_UPDATE_SQL="UPDATE $tabla_compras Set 
       nro_compras ='$numero',
       color_genero_album='$color',
       tarjeta_compras='$tarjeta',
       id_reserva='$id_reser'

        WHERE id_reserva='$id_reser'";

        mysqli_query($conexion,$_UPDATE_SQL); 
        echo "Los datos se actualizaron Correctamente"; 
      }
    }

    if(isset($_POST['btn_eliminar']))
    {
      $id_reser = $_POST['id_reser'];
        if($id_reser=="")
        {
          echo "Id de reserva obligatorio";
        }
        else
        {
      $_DELETE_SQL =  "DELETE FROM $tabla_compras WHERE id_reserva='$id_reser'";
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