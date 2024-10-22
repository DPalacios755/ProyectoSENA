

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="senaproyecto/css/adminStilos.css?v=1.1">
    <title>Administrador</title>
</head>
<body>
<?php

session_start();

if (!isset($_SESSION['user_admin'])) {
    header("Location: senaproyecto/php/administrativos/perfilAdmin.php");
}

?>
    
<header>  
    <nav class="opciones">
    <ul class="nav-pag">
        <li>
            <a href="">
                <button>Red</button>
            </a>
        </li>
        <li>
            <a href="">
                <button>Gestión</button>
            </a>
        </li>
        <li>
            <a href="">
                <button>Inalambrico</button>
            </a>
        </li>    
        <li>
            <a href="">
                <button>Sistema</button>
            </a>
        </li>
    </ul>
    <div class="menu-toggle" id="menu-toggle">
        &#9776;
    </div>
</nav>

            <a href="" class="tAdmin">
                <button class="badmin">Administrativo
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="35" height="70" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
                </button>
            </a>
</header> 
  
    
    
    <section class="tituloCentro">
        <h1>Portal Web</h1>
        <h1>Administrador Base de Datos</h1>
    </section>
    <section class="baseDatos">
        <div class="bEstudiante">
            <h2>Estudiantes</h2>
        <div class="herramientas">  
                <a href="http://localhost/senaproyecto/php/estudiantes/indexEstudiantes.php">Ver Usuarios</a>
            </div>
        </div>
        <div class="bDocente">
            <h2>Docentes</h2>
            <div class="herramientas">  
                <a href="http://localhost/senaproyecto/php/docentes/indexDocentes.php">Ver Usuarios</a>
               
            </div>
        </div>
        <div class="bAdmin">
            <h2>Administrativos</h2>
        
        <div class="herramientas"> 
            <a href="http://localhost/senaproyecto/php/administrativos/indexAdmin.php">Ver Usuarios </a>
            
            </div>
        </div>
    </section>
    <a href="http://localhost/senaproyecto/index.html">
    <button class="salir">Cerrar Sesión</button>
    </a>
    <script src="http://localhost/senaproyecto/javascript/Funciones.js"></script>
</body>
</html>