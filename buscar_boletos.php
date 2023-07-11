<!DOCTYPE html>
<html>
<head>
    <title>Resultado de la búsqueda</title>
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <?php
        // Conectarse a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "sistema_boletos");

        // Verificar la conexión
        if (mysqli_connect_errno()) {
            echo "Error al conectar con la base de datos: " . mysqli_connect_error();
            exit();
        }

        // Obtener la cédula del formulario
        $cedula = $_POST['cedula'];

        // Consultar la información del usuario en la base de datos
        $query = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
        $resultado = mysqli_query($conexion, $query);

        // Verificar si se encontraron resultados
        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            echo "<h2>Información del usuario</h2>";
            echo "<p>Cédula: " . $usuario['cedula'] . "</p>";
            echo "<p>Nombre: " . $usuario['Nombre'] . "</p>";
            echo "<p>Abono: " . $usuario['abono'] . "</p>";
            echo "<p>Boletos Restantes: " . $usuario['boletos_restantes'] . "</p>";
        } else {
            echo "<h2>No se encontró ningún usuario con esa cédula.</h2>";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>

