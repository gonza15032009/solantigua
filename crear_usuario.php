<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
		<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="guardar_usuario.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required><br><br>
        <input type="text" name="cedula" placeholder="Cédula" required><br><br>
        <input type="number" name="boletosIniciales" placeholder="Boletos Iniciales" required><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>


