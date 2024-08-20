<?php
$conexion = mysqli_connect("localhost", "root", "", "formulario");

//!Comprobar conexion
if (!$conexion) {
    die("Conexion Fallida" . mysqli_connect_error());
}


?>