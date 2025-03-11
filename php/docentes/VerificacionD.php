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
    

    $consulta = "SELECT * FROM user_docente WHERE correo = '$Correo' AND documento = '$Documento' ";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado->num_rows > 0) 
    {
       // Usuario encontrado, iniciar sesión
       session_start();
       $_SESSION['user_docente'] = $Correo;
       $row = $resultado->fetch_assoc();
       $_SESSION['rol'] = $row['rol'];
   
       // Redirigir según el rol
       if ($_SESSION['rol'] == 'Docente') {
        echo "<script>alert('Conexión al WiFi exitosa. Debes verificar la conexión semanalmente.'); window.location.href = '../../index.html';</script>";
       } else {
        echo "<script>alert('Rol no reconocido.'); window.location.href = '../../index.html';</script>";
       }
   } else {
       // Usuario o contraseña incorrectos
       echo "Usuario o contraseña incorrectos.";
   }
   
}

   $conn->close();
   ?>