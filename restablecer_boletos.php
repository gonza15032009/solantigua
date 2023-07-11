<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_boletos";

// Datos del formulario
$cedula = $_POST['cedula'];
$boletos = $_POST['boletos'];

// Crear la conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// Actualizar la cantidad de boletos del usuario
$sql = "UPDATE usuarios SET boletos_restantes = '$boletos' WHERE cedula = '$cedula'";

if ($conexion->query($sql) === TRUE) {
    echo "Se han restablecido los boletos correctamente para el usuario con cédula: " . $cedula;
} else {
    echo "Error al restablecer los boletos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
