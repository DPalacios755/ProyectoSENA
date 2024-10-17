<?php
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

$nombre = $_POST["nombre"];
$correo= $_POST["correo"];
$Contraseña = $_POST["documento"];
$Colegio = $_POST["Colegio"];
$rol = $_POST["rol"];

    
$query = mysqli_query ($conn," INSERT INTO user_docente VALUES ( '".$nombre."','".$correo."','".$Contraseña."','".$Colegio."','".$rol."')");


echo "<script> alert('Bienvenido: Su Registro ha sido Exitoso!!!');window.location= 'http://localhost/senaproyecto/php/docentes/indexDocentes.php' </script>";


// Cerrar la conexión
mysqli_close($conn);

?>