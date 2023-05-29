<?php
// Establecer la conexión con la base de datos
$host = '192.168.1.137';
$port = 3306;
$username = 'laptop';
$password = 'dakar';
$dbname = 'datero';

$conexion = mysqli_connect($host, $username, $password, $dbname, $port);

// Comprobar si la conexión se estableció correctamente
if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Recuperar los datos de la tabla
$sql = 'SELECT * FROM bus1';
$resultado = mysqli_query($conexion, $sql);

// Construir la tabla HTML dinámicamente
echo '<table>';
echo '<tr><th>ID</th><th>Fecha</th><th>Nombre</th></tr>';

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $fila['id'] . '</td>';
    echo '<td>' . $fila['fecha'] . '</td>';
    echo '<td>' . $fila['nombre'] . '</td>';
    echo '</tr>';
}

echo '</table>';

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>