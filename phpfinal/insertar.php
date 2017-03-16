<meta charset="utf-8">
<?php
#Conexión
$mysql = new mysqli("localhost","root","","incap");
if ($mysql->connect_error) { 
	die("No se pudo conectar a la base de datos Incap");
}

#Insertar
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$mysql->query("insert into usuarios (documento, nombre, apellido, edad) 
	values ('$documento','$nombre','$apellido','$edad')")
	or die($mysql->error);
	
echo "El nuevo usuario se ingresó correctamente.";

#Cerrar conexión
$mysql->close();
?>