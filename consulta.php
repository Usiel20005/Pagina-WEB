<?php
//!conexion base de datos 
include 'PHP/conectionBD.php';

//?Consultamos todos los registros de la tabla

$query = "SELECT*FROM datos";
$result = mysqli_query($conexion, $query);

//*recorrer los registros y mostrarlos
if($result->num_rows>0){
    //*formato a la tabla, encabezado
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Telefono</th>
    <th>Email</th>
    </tr>";
    while($row = $result -> fetch_assoc()){
        echo "<tr>
            <td> ". $row["id"]. " </td>
            <td> ". $row["nombre"]. "</td>
            <td> ".$row["telefono"]. "</td>
            <td> ". $row["correo"] . "</td>
            </tr>";
    }
}

?>

