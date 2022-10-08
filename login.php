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
            $_SESSION['sesion_exito']=3;
            if($usuario=="nicole" & $pass=="1234"){
                $_SESSION['sesion_exito']=1;
            }
            else{$_SESSION['sesion_exito']=1;}
        }
    }
    if($_SESSION['sesion_exito']<>1){
        header('Location:login.php');
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
                               
                            </center>
        </div>
    </div>
</body>
</html>
