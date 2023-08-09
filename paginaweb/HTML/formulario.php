
<?php
    $servidor = "localhost"; // Variable que almacena el nombre del servidor de la base de datos
    $usuario = "root"; // Variable que almacena el nombre del usuario de la base de datos
    $clave = ""; // Variable que almacena la contraseña del usuario de la base de datos
    $bd = "registro"; // Variable que almacena el nombre de la base de datos

    $coneccion = mysqli_connect($servidor, $usuario, $clave, $bd); // Establece la conexión con la base de datos utilizando las variables anteriores
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../CSS/ESTILOS.CSS"> <!--Incluye el archivo de estilos CSS-->
</head>
<body>
    <div class="contenedor1">
        <header>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li> <!-- enlace al archivo de inicio-->
                    <li><a href="ejemplo.html">Menú</a></li> <!--Enlace al archivo de menú-->
                    <li><a href="http://localhost/paginaweb/HTML/formulario.php#">Contacto</a></li> <!--Enlace al archivo de contacto-->
                    <li><a href="contacto.html">Ubicación</a></li> <!--Enlace al archivo de ubicación-->
                </ul>
            </nav>
        </header>

        <h1>Contáctanos</h1>
        <p>¿Tienes alguna pregunta, sugerencia o simplemente quieres seguirnos?</p>
        <form action="#" method="post"> <!--Formulario para enviar los datos del contacto-->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br> <!--Campo de entrada de texto para el nombre (obligatorio)-->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br> <!--Campo de entrada de texto para el email (obligatorio)-->

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto"><br> <!--Campo de entrada de texto para el asunto-->

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje"></textarea><br> <!--Campo de entrada de texto multilínea para el mensaje-->

            <input type="submit" name="Enviar"> <!--Botón de envío del formulario-->
        </form>
        
        <p>O si lo prefieres, síguenos en:</p>
        <ul class="facebook">
            <li><a href="https://www.facebook.com/PozoleriaSantaRosa?mibextid=ZbWKwL">Facebook</a></li> <!-- Enlace a la página de Facebook-->
        </ul>

        <?php
        if(isset($_POST['Enviar'])){
            $nombre = $_POST['nombre']; // Almacena el nombre ingresado en el formulario
            $email = $_POST['email']; // Almacena el email ingresado en el formulario
            $asunto = $_POST['asunto']; // Almacena el asunto ingresado en el formulario
            $mensaje = $_POST['mensaje']; // Almacena el mensaje ingresado en el formulario

            $insertar = "INSERT INTO contacto Values ('','$nombre','$email','$asunto', '$mensaje')"; // Consulta SQL para insertar los datos del contacto en la base de datos
            $resultado = mysqli_query($coneccion, $insertar); // Ejecuta la consulta SQL

            if ($resultado) {
                echo "¡Mensaje enviado correctamente!"; // Muestra un mensaje si el insert en la base de datos fue exitoso
            } else {
                echo "Error al enviar el mensaje."; // Muestra un mensaje de error si el insert en la base de datos falló
            }
        }
        ?>
    </div>
</body>
</html