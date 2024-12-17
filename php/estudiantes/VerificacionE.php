<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'proyectosena';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

if (isset($_POST['Correo']) && isset($_POST['Documento'])) {
    $Correo = $_POST['Correo'];
    $Documento = $_POST['Documento'];
    $rol = $_POST['rol'];
    

    $consulta = "SELECT * FROM user_estudiante WHERE correo = '$Correo' AND documento = '$Documento' ";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado->num_rows > 0) 
    {
       // Usuario encontrado, iniciar sesión
       session_start();
       $_SESSION['user_estudiante'] = $Correo;
       $row = $resultado->fetch_assoc();
       $_SESSION['rol'] = $row['rol'];
   
       // Redirigir según el rol
       if ($_SESSION['rol'] == 'Estudiante') {
         echo "<script>alert('Conexión al WiFi exitosa. Tienes 2 horas de navegación por día.'); window.location.href = 'http://localhost/senaproyecto/index.html';</script>";
       } else {
        echo "<script>alert('Rol no reconocido.'); window.location.href = 'http://localhost/senaproyecto/index.html';</script>";
       }
   } else {
       // Usuario o contraseña incorrectos
       echo "Usuario o contraseña incorrectos.";
   }
   
}

   $conn->close();
   ?>