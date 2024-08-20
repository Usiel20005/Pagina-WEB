<?php
include 'conectionBD.php';

//!Variables para almacenar resultados
$nombre = '';
$telefono = '';
$correo = '';

//!INDICAR EL METODO DE CONEXION
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    //*CONSULTAR DATOS
    if (isset($_POST['consultar'])) {
        $query = "SELECT nombre, telefono, correo FROM datos WHERE id =?";
        //*EJECUTAR LA CONSULTA
        if ($stmt = $conexion->prepare($query)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result-> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nombre = $row['nombre'];
                    $telefono = $row['telefono'];
                    $correo = $row['correo'];
                }
            } else {
                echo "No hay datos para consultar,";
            }
            //!CERRAR LA DECLARACION
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }
    }
}

//!Actualizar datos
if(isset($_POST['actualizar'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $query= 'UPDATE datos SET nombre=?, telefono=?, correo=? WHERE id = ? ';

    if($stmt = $conexion->prepare($query)){
        $stmt -> bind_param("sssi",$nombre,$telefono,$correo,$id);
        //*EJECUTAMOS LA DECLARACION
        if($stmt->execute()){
            echo "Datos actualizados correctamente";
        }else{
            echo "Error al ejecutar datos: ". $stmt->error;
        }
        $stmt->close(); //!Cerrar la ceclaracion
    }else{
        echo "Error preparando la consulta: ". $conexion->error;
    }
}   


?>

<!DOCTYPE html>
<html>

<head>
    <title>Mi Página</title>
    <link rel="stylesheet" href="../Estilos/Principal-Diceños.css">
    <link rel="stylesheet" href="../Estilos/Menu.css">
    <link rel="stylesheet" href="../Estilos/fontello.css">
    <link rel="stylesheet" href="../Estilos/banner002.css">
    <link rel="stylesheet" href="../Estilos/blog.css">
    <link rel="stylesheet" href="../Estilos/info.css">
    <link rel="stylesheet" href="../Estilos/footer.css">
    <link rel="stylesheet" href="../Estilos/formulario.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h1 class="icon-infinito">Inteligencia Artificial</h1>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="index.html">Inicio</a>
                <a href="catalogos.html">Catálogos</a>
                <a href="galeria.html">Proyectos</a>
                <a href="contacto.html">Contactanos</a>
            </nav>
        </div>
    </header>
    <main>
        <section id="banner">
            <img src="../Imagenes/banner 001.jpg" width="800">
            <div id="contenedor">
                <h2>Inteligencia Artificial</h2>
                <p>La ciencia ficción se está convirtiendo en realidad</p>
                <a href="mas.html">Leer más</a>
            </div>
        </section>
        <section>
            <h2>Contacto</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
                <fieldset>
                    <legend>Contactanos llamando los siguientes campos </legend>
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label>ID</label>
                            <input type="text" placeholder="Ingresa un id" class="input-text" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        </div>
                        <div class="campo">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nombre" class="input-text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                        </div>
                        <div class="campo">
                            <label>Telefono</label>
                            <input type="tel" class="input-text" placeholder="Telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>">
                        </div>
                        <div class="campo">
                            <label>Correo </label>
                            <input type=" email" class="input-text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($correo); ?>">
                        </div>
                        <div class="campo">
                            <label>Mensaje</label>
                            <textarea class="input-text"></textarea>
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="boton" value="Consultar" name="consultar">
                        <input type="submit" class="boton" value="Actualizar" name="actualizar">
                    </div>
                </fieldset>
            </form>
        </section>
    </main>
    <<footer>
        <div class="contenedor">
            <p class="pie">Copyright &copy; Angel AMS</p>
            <div class="sociales">
                <a href="https://www.instagram.com/ams_.angel/" class="icon-instagram" aria-label="Instagram"></a>
                <a href="https://www.facebook.com/ams.angel750" class="icon-facebook" aria-label="Facebook"></a>
                <a href="https://twitter.com/Gary_ams750" class="icon-twitter" aria-label="Twitter"></a>
            </div>
        </div>
        </footer>
</body>

</html>