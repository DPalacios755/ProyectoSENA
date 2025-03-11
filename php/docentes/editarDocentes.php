<?php
echo "<link rel='stylesheet' href='http://localhost/senaproyecto/css/estilosEditar.css?v=1.1'>";
// Incluir archivo de conexión a la base de datos
include('conexionBase.php');

// Recibir el ID del usuario
$idUsuario = $_GET['correo'];


// Consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM user_docente  WHERE correo = '$idUsuario'" ; // Use 'id' instead of 'Email'
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    echo "<h1>Editar Docente</h1>";
    echo "<section class='formulario'>";
    echo "<form action='editarDocentes.php?  correo='$idUsuario' method='post'>";
    echo "<label for='nombreCompleto'>  Nombre Completo:  </label>";
    echo "<input type='text' id='nombreCompleto' name='nombreCompleto' value='" . $row['nombre'] . "'>";
    echo "<label for='email'>  Email:  </label>";
    echo "<input type='email' id='email' name='email' value='" . $row['correo'] . "'>"; 
    echo "<label for='text'>  Documento:  </label>";
    echo "<input type='text' id='password' name='password' value='" . $row['documento'] . "'>";
    echo "<label for='text'>  Colegio:  </label>";
    echo "<input type='text' id='colegio' name='colegio' value='" . $row['Colegio'] . "'>";
    echo "<label for='password'>  Tipo de Usuario:  </label>";
    echo "<input type='text' id='rol' name='rol' value='" . $row['rol'] . "'>";
    echo "<br></br>";
    echo "<input class='boton 'type='submit' value='Guardar Cambios'>";
    echo"<a href='indexDocentes.php'>
    <button class='volver'> Salir </button>
    </a>";
    echo "</form>";
    echo "</section>";
} else {
    echo "Usuario no encontrado.";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    
    $email = $_POST['email'];
    $username = $_POST['nombreCompleto'];
    $password = $_POST['password'];
    $colegio = $_POST['colegio'];
    $rol = $_POST['rol'];
    

    // Prepara la consulta SQL para actualizar los datos
    $sql = "UPDATE user_docente SET documento='$password', nombre='$username' , rol='$rol' , Colegio='$colegio' WHERE correo='$email'";

    if ($conn->query($sql) === TRUE) {
        // Si la actualización fue exitosa, redirige a la página principal o muestra un mensaje de éxito
        header('Location: http://localhost/senaproyecto/php/docentes/indexDocentes.php');
    } else {
        // Si hubo un error en la consulta SQL, muestra un mensaje de error o maneja la situación adecuadamente
        echo "Error updating record: " . $conn->error;
    }
}
?>