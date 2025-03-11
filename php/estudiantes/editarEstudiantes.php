<?php
echo "<link rel='stylesheet' href='../../css/estilosEditar.css?v=1.1'>";
// Incluir archivo de conexión a la base de datos
include('conexionBase.php');

// Recibir el ID del usuario
$idUsuario = $_GET['correo'];


// Consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM user_estudiante  WHERE correo = '$idUsuario'" ; // Use 'id' instead of 'Email'
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    echo "<h1>Editar Estudiante</h1>";
    echo "<section>";
    echo "<form action='editarEstudiantes.php?  correo='$idUsuario' method='post'>";
    echo "<label for='nombreCompleto'>  Nombre Completo:  </label>";
    echo "<input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "'>";
    echo "<label for='email'>  Email:  </label>";
    echo "<input type='email' id='correo' name='correo' value='" . $row['correo'] . "'>"; 
    echo "<label for='text'>  Documento:  </label>";
    echo "<input type='text' id='contraseña' name='contraseña' value='" . $row['documento'] . "'>";
    echo "<label for='text'>  Colegio:  </label>";
    echo "<input type='text' id='colegio' name='colegio' value='" . $row['Colegio'] . "'>";
    echo "<label for='password'>  Tipo de Usuario:  </label>";
    echo "<input type='text' id='rol' name='rol' value='" . $row['rol'] . "'>";
    echo "<label for='password'>  curso:  </label>";
    echo "<input type='text' id='curso' name='curso' value='" . $row['curso'] . "'>";
    echo "<input class='boton 'type='submit' value='Guardar Cambios'>";
    echo"<a href='indexEstudiantes.php'>
    <button class='volver'> Salir </button>
    </a>";
    echo "</form>";
    
    
    echo "</section>";
} else {
    echo "Usuario no encontrado.";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    
    $correo = $_POST['correo'];
    $username = $_POST['nombre'];
    $password = $_POST['contraseña'];
    $colegio = $_POST['colegio'];
    $rol = $_POST['rol'];
    $curso = $_POST['curso'];
    

    // Prepara la consulta SQL para actualizar los datos
    $sql = "UPDATE user_estudiante SET documento='$password', nombre='$username' , rol='$rol' , Colegio='$colegio' , curso='$curso' WHERE correo='$correo'";

    if ($conn->query($sql) === TRUE) {
        // Si la actualización fue exitosa, redirige a la página principal o muestra un mensaje de éxito
        header('Location: indexEstudiantes.php');
    } else {
        // Si hubo un error en la consulta SQL, muestra un mensaje de error o maneja la situación adecuadamente
        echo "Error updating record: " . $conn->error;
    }
}
?>