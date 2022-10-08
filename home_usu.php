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
        <title>Home Usuario</title>
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
    if(isset($_POST['btn_log_usu'])){
        $_SESSION['sesion_exito']=0;

        $usuario=$_POST['usuario'];
        $pass=$_POST['pass'];

        if($usuario=="" || $pass=="")
        {
            $_SESSION['sesion_exito']=2;
        }
        else{
            include("abrir_conexion.php");
            $_SESSION['sesion_exito']=3;
            $resultados= mysqli_query($conexion,"SELECT * FROM $tabla_usuario where nombre_usuario='$usuario' and contrasena='$pass'");
            while($consulta=mysqli_fetch_array($resultados))
            {
                $_SESSION['sesion_exito']=1;
            }
            include("cerrar_conexion.php");
        }
    }
    if($_SESSION['sesion_exito']<>1){
        header('Location:login_usu.php');
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
                                <h3><strong>BIENVENIDO</strong></h3>
                                <img src="usfa.png" class="img-circle" width="150" height="150">
                                <br><br><br>
                                <form class="form-inline" action="home_usu.php" method="POST" name="lista_usu">
                                    
                                <a class="btn btn-info" href="modificar_cuenta.php" role="button" name="btn_modificar_cuenta">MODIFICAR CUENTA</a></p>
                                     <!---<a class="btn btn-info" href="reservas.php" role="button" name="btn_reservas">RESERVAS</a></p>-->
                                     <a class="btn btn-info" href="compras.php" role="button" name="btn_compras">COMPRAS</a></p>
                                     <a class="btn btn btn-danger" href="index.php" role="button" name="btn_login">SALIR</a></p>
                                </form>
                            </center>
        </div>
    </div>
</body>
</html>