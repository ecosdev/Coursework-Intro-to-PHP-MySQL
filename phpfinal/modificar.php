<meta charset="utf-8">
<?php
#Conexión
$mysql = new mysqli("localhost","root","","incap");
if ($mysql->connect_error) { 
	die("No se pudo conectar a la base de datos Incap");
}

#Consulta
$documento = $_POST['documento'];
$result = $mysql->query("select * from usuarios where documento='$documento'") or die($mysql->error);

if ($row = $result->fetch_array()) {
	#Info actual
	$documento = $row['documento'];
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$edad = $row['edad'];
	
	#Solicitud nueva info. 
	#Se sale del mundo de PHP para evitar meter <form> en un echo.
	?> 
	<form action="modificar2.php" method="POST">
		<input type="hidden" name="documento" size="15" value=<?php echo $documento; ?> >
		Nombre: <input type="text" name="nombre" size="15" value=<?php echo $nombre; ?> required><br>
		Apellido: <input type="text" name="apellido" size="15" value=<?php echo $apellido; ?> required><br>
		Edad: <input type="text" name="edad" value=<?php echo $edad; ?> required><br>
		<input type="submit" value="Modificar">
	</form>
	<?php
}

#Cerrar conexión
$mysql->close();
?>