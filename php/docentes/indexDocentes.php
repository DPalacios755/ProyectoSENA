<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/senaproyecto/css/indexs.css?v=1.1">
    <title>CRUD Docentes</title>
</head>
<body>
    <h1>Docentes</h1>

    <?php
    
    //Incluir archivo de conexión a la base de datos
    include('conexionBase.php');

        // Consulta SQL para seleccionar todos los datos
        $sql = "SELECT * FROM user_docente ";
        $result = $conn -> query ($sql);

        if ($result->num_rows > 0) {
            echo "<table border 8>";
            echo "<tr><th>Nombre Completo</th><th>Email</th><th>Documento</th><th>Tipo de Usuario</th><th>Colegio</th><th>Funciones</th></tr>";

            // Mostrar cada fila de datos
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>". $row['correo'] . "</td>";
                echo "<td>" . $row['documento'] . "</td>";
                echo "<td>" . $row['Colegio'] . "</td>";
                echo "<td>" . $row['rol'] . "</td>";
                echo "<td>";
                echo"<a href='http://localhost/senaproyecto/php/docentes/editarDocentes.php? correo=" . $row['correo'] ." '>
                <button class='beditar'> Editar </button>
                </a>";
                 // Botón de editar
                
                echo "<a href='http://localhost/senaproyecto/php/docentes/eliminarDocente.php?  correo=" . $row['correo'] ."'> 
                <button class='beliminar'>Eliminar </button>
                </a>";
                echo "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            echo "<section>";
            echo"<a href='http://localhost/senaproyecto/html/crearDocente.html'>
            <button class='bcrear'> Crear </button>
            </a>";
            
            
            echo"<a href='http://localhost/senaproyecto/php/perfilAdmin.php'>
            <button class='volver'> Salir </button>
            </a>";
            echo "</section>";
           
            
        } else {
            echo "No hay usuarios creados.";
        }
        

    ?> 

</body>
</html>