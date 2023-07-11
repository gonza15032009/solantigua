<!DOCTYPE html>
<html>
<head>
    <title>Restar Boleto</title>
</head>
<body>
    <h1>Restar Boleto</h1>

    <?php
    // Realizar la conexión a la base de datos y obtener la información del usuario
    $conexion = mysqli_connect("localhost", "root", "", "sistema_boletos");

    // Verificar la conexión
    if (mysqli_connect_errno()) {
        echo "Error al conectar con la base de datos: " . mysqli_connect_error();
        exit();
    }

    // Obtener la cédula del usuario desde la solicitud
    $cedula = $_GET['cedula'];

    // Consulta para obtener la información del usuario
    $query = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si se encontró un usuario con la cédula proporcionada
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener la información del usuario
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificar si hay boletos restantes para restar
        if ($usuario['boletos_restantes'] > 0) {
            // Restar un boleto
            $boletosRestantes = $usuario['boletos_restantes'] - 1;

            // Actualizar la cantidad de boletos restantes en la base de datos
            $actualizarQuery = "UPDATE usuarios SET boletos_restantes = $boletosRestantes WHERE cedula = '$cedula'";
            $actualizarResultado = mysqli_query($conexion, $actualizarQuery);

            // Verificar si la actualización se realizó correctamente
            if ($actualizarResultado) {
                echo "Boleto restado exitosamente. Boletos restantes: $boletosRestantes";
            } else {
                echo "Error al restar el boleto: " . mysqli_error($conexion);
            }
        } else {
            echo "El usuario no tiene boletos restantes.";
        }
    } else {
        echo "No se encontró ningún usuario con esa cédula.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
</body>
</html>



