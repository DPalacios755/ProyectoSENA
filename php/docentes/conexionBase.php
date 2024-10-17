<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'proyectosena';

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión    
if (!$conn) 
{
    die("La conexión ha fallado: " .mysqli_connect_error());
}

?>
