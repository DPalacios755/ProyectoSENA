<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $destinatario = "palaciosdaniel755@gmail.com"; // Reemplaza con la dirección de correo del destinatario
    $asunto = "Solicitud";
    
    $cuerpo = "
    <html>
    <head>
        <title>Nuevo Mensaje de Contacto</title>
    </head>
    <body>
        <h1>Nuevo Mensaje de Contacto</h1>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Correo Electrónico:</strong> $email</p>
        <p><strong>Mensaje:</strong> $mensaje</p>
    </body>
    </html>
    ";

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= "From: $email" . "\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        echo "El correo ha sido enviado.";
    } else {
        echo "El correo no se pudo enviar.";
    }
}
?>
