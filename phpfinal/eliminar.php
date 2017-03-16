<meta charset="utf-8">
<?php
#Conexión
$mysql = new mysqli("localhost","root","","incap");
if ($mysql->connect_error) { 
	die("No se pudo conectar a la base de datos Incap");
}

#Eliminar
$documento = $_POST['documento'];
$mysql->query("delete from usuarios where documento='$documento'") or die($mysql->error);

echo "El usuario se eliminó correctamente.";

#Cerrar conexión
$mysql->close();
?>
