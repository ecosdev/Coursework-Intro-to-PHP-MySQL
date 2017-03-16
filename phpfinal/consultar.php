<meta charset="utf-8">
<?php
#Conexión
$mysql = new mysqli("localhost","root","","incap");
if ($mysql->connect_error) { 
	die("No se pudo conectar a la base de datos Incap");
}

#Consulta 1
$documento = $_POST['documento'];
$result = $mysql->query("select * from usuarios where documento='$documento'") or die($mysql->error);

if ($row = $result->fetch_array()) {
	echo "El usuario del documento consultado es:<br>";
	echo "Documento: ".$row['documento']."<br>";
	echo "Nombre: ".$row['nombre']."<br>";
	echo "Apellido: ".$row['apellido']."<br>";
	echo "Edad: ".$row['edad']."<br>";
}

#Consulta 2
$result2 = $mysql->query("select * from usuarios") or die($mysql->error);

echo "<hr>";
echo "La tabla de todos los usuarios es:<br>";

echo "<table border=2 bordercolor=blue>
		<tr>
			<td>Documento</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Edad</td>
		</tr>";
while($row = $result2->fetch_array()) {
	echo "<tr>
		<td>".$row['documento']."</td>
		<td>".$row['nombre']."</td>
		<td>".$row['apellido']."</td>
		<td>".$row['edad']."</td>
	</tr>";
}
echo "</table>";

#Cerrar conexión
$mysql->close();
?>

	