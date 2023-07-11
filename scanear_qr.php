// Obtener el contenido del código QR escaneado
$contenidoEscaneado = $_GET['codigo'];

// Extraer la cédula del usuario del contenido del código QR
$cedulaUsuario = substr($contenidoEscaneado, 9);

// Realizar la actualización de la cantidad de boletos en la base de datos
$sql = "UPDATE usuarios SET boletos_restantes = boletos_restantes - 1 WHERE cedula = '$cedulaUsuario'";

// Resto del código para ejecutar la consulta y manejar posibles errores
// ...

