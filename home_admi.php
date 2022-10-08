<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Diseño y Publicidad" content="">
        <meta name="Central de Diseño" content="">
        <link rel="icon" href="img/favicon.ico">
        <title>Home Administrador</title>
        <!-- Bootstrap core CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
<body>
    <?php 
    session_start();
    ob_start();
    if(isset($_POST['btn_log_admi'])){
        $_SESSION['sesion_exito']=0;

        $usuario=$_POST['usuario_ad'];
        $pass=$_POST['pass_ad'];

        if($usuario=="" || $pass=="")
        {
            $_SESSION['sesion_exito']=2;
        }
        else{
            include("abrir_conexion.php");
            $_SESSION['sesion_exito']=3;
            $resultados= mysqli_query($conexion,"SELECT * FROM $tabla_login where usuario='$usuario' and contrasena='$pass'");
            while($consulta=mysqli_fetch_array($resultados))
            {
                $_SESSION['sesion_exito']=1;
            }
            include("cerrar_conexion.php");
        }
    }
    
    if($_SESSION['sesion_exito']<>1){
        header('Location:login_admi.php');
    }
    ?>
    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
                    <div class="col-md-8"><font color="#000"><center><strong><h1>BIBLIOTECA</h1></strong><h3>MUSICAL</h3></center></font></div>
                    <div class="col-md-2"></div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="well">
                            <center>
                                <h3><strong>BIENVENIDO ADMINISTRADOR</strong></h3>
                                <img src="usfa.png" class="img-circle" width="150" height="150">
                                <br><br><br>
                                <form class="form-inline" action="home_admi.php" method="POST" name="lista_usu">
                                    
                                <a class="btn btn-info" href="eliminar_cuentas.php" role="button" name="btn_eliminar_cuentas">ELIMINAR CUENTA DE USUARIOS</a></p>
                                <a class="btn btn-info" href="modificar_album.php" role="button" name="btn_modificar_album">MODIFICAR ALBUMES</a></p>
                                <a class="btn btn-info" href="modificar_cancion.php" role="button" name="btn_modificar_cancion">MODIFICAR CANCIONES</a></p>
                                <a class="btn btn-info" href="modificar_paquete.php" role="button" name="btn_modificar_paquete">MODIFICAR PAQUETES EN PROMOCION</a></p>
                                <a class="btn btn-info" href="modificar_interprete.php" role="button" name="btn_modificar_interprete">MODIFICAR INTERPRETES</a></p>
                                <a class="btn btn-info" href="modificar_idioma.php" role="button" name="btn_modificar_idioma">MODIFICAR IDIOMAS DISPONIBLES</a></p>
                                <a class="btn btn-info" href="modificar_pais.php" role="button" name="btn_modificar_pais">MODIFICAR PAISES</a></p>
                                <a class="btn btn-info" href="modificar_actividad.php" role="button" name="btn_modificar_actividad">MODIFICAR ACTIVIDAD DE INTERPRETES</a></p>
                                <a class="btn btn-info" href="modificar_genero.php" role="button" name="btn_modificar_genero">MODIFICAR GENEROS MUSICALES</a></p>
                                     <a class="btn btn-info" href="registros_usu.php" role="button" name="btn_reg_usu">REGISTRO DE USUARIOS REGISTRADOS</a></p>
                                     <a class="btn btn-info" href="registros_reservas.php" role="button" name="btn_reg_reser">RESGISTRO DE RESERVAS</a></p>
                                     <a class="btn btn-info" href="registros_compras.php" role="button" name="btn_reg_comp">REGISTRO DE COMPRAS</a></p>
                                     <a class="btn btn btn-danger" href="index.php" role="button" name="btn_login">CERRAR SESION</a></p>
                                </form>
                            </center>
        </div>
    </div>
</body>
</html>