<?php
//*Conexion a la base de datos incluyendo el archivo conectionBD.php
include 'conectionBD.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //?Crear variables ára insertar datos a la BD desde PHP
    //$id = 1;
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["email"];

    //*sentencia SQL para insertar datos
    $sql = "INSERT INTO datos (nombre, telefono, correo)
        VALUES ('$nombre','$telefono','$correo')";

    if ($conexion->query($sql) == TRUE) {
        echo " datos insertados correctamente";
    } else {
        echo "Datos no insertados", $conexion->error;
    }
}
//*Cerrar la conexion
$conexion->close();

?>
