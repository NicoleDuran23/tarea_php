<?php
$host="localhost";
$basededatos="biblioteca_musical";
$usuariodb="root";
$clave="";


$tabla_usuario="usuario";
$tabla_reservas="reservas";
$tabla_paquetes="paquetes_promocion";
$tabla_pais="pais";
$tabla_login="login";
$tabla_interpretes="interpretes";
$tabla_idiomas="idiomas_disponibles";
$tabla_generos_m="generos_musicales";
$tabla_compras="compras";
$tabla_cancion="cancion";
$tabla_album="album";
$tabla_activo="activo";


$conexion= new mysqli($host,$usuariodb,$clave,$basededatos);

if($conexion->connect_errno)
{
    echo "Fallo de conexion";
    exit();
}

?>