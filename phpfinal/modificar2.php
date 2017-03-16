<meta charset="utf-8">
<?php
#Conexión
$mysql = new mysqli("localhost","root","","incap");
if ($mysql->connect_error) { 
	die("No se pudo conectar a la base de datos Incap");
}

#Modificar
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$mysql->query("update usuarios set nombre='$nombre', apellido='$apellido', edad='$edad' where documento='$documento'")
	or die($mysql->error);
	
echo "El usuario se modificó correctamente.";

#Cerrar conexión
$mysql->close();
?>