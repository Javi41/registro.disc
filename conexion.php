<?php
$conexion = new mysqli("localhost","root","","disc_tuxpan");
if($conexion->connect_error){
    die("Error de conexión");
}
?>
