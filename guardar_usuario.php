<?php
// Realizar la conexión a la base de datos y guardar los detalles del usuario
$conexion = mysqli_connect("localhost", "root", "", "sistema_boletos");

// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
    exit();
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$boletosIniciales = $_POST['boletosIniciales'];

// Consulta para guardar el usuario en la base de datos
$query = "INSERT INTO usuarios (nombre, cedula, boletos_restantes, boletos_iniciales) VALUES ('$nombre', '$cedula', $boletosIniciales, $boletosIniciales)";
$resultado = mysqli_query($conexion, $query);

// Verificar si la consulta se ejecutó correctamente
if ($resultado) {
    // Generar código QR
    require_once('phpqrcode/qrlib.php');

    $contenidoQR = 'Usuario: ' . $cedula;
    $nombreQR = 'qrcodes/' . $cedula . '.png'; // Ruta y nombre del archivo QR
    QRcode::png($contenidoQR, $nombreQR);

    echo "Usuario guardado correctamente.";

    // Mostrar el código QR
    echo "<h2>Código QR:</h2>";
    echo "<img src='$nombreQR' alt='Código QR'>";
} else {
    echo "Error al guardar el usuario: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>





