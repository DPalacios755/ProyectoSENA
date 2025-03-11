<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/indexs.css?v=1.0">
    <title>CRUD Administrativos</title>
</head>
<body>
    <h1>Administrativos</h1>

    <?php
    
    //Incluir archivo de conexión a la base de datos
    include('conexionBase.php');

        // Consulta SQL para seleccionar todos los datos
        $sql = "SELECT * FROM user_admin ";
        $result = $conn -> query ($sql);

        if ($result->num_rows > 0) {
            echo "<table border 8>";
            echo "<tr><th>Nombre Completo</th>
            <th>Email</th><th>Documento</th>
            <th>Tipo de Usuario</th>
            <th>Colegio</th>
            <th>Funciones</th>
            </tr>";

            // Mostrar cada fila de datos
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>". $row['correo'] . "</td>";
                echo "<td>" . $row['documento'] . "</td>";
                echo "<td>" . $row['Colegio'] . "</td>";
                echo "<td>" . $row['rol'] . "</td>";
                echo "<td>";
                echo"<a href='editarAdmin.php? correo=" . $row['correo'] ." '>
                <button> Editar </button>
                </a>";
                 // Botón de editar
                
                echo "<a href='eliminarAdmin.php?  correo=" . $row['correo'] ."'> 
                <button>Eliminar </button>
                </a>";
                echo "</td>";
                echo "</tr>";
                
            }
            echo "</table>";
            echo "<section>";
            echo"<a href='../../html/CrearAdmin.html'>
            <button class='crear'> Crear </button>
            </a>";
            
            
            echo"<a href='../perfilAdmin.php'>
            <button class='volver'> Salir </button>
            </a>";
            echo "</section>";
           
            
        } else {
            echo "No hay usuarios creados.";
        }
        

    ?> 

</body>
</html>