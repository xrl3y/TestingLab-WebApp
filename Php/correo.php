<?php 
ini_set('SMTP', 'smtp.gmail.com'); 
ini_set('smtp_port', '587'); 
ini_set('sendmail_from', 'jsgarcia72217@universidadean.edu.co');

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);

if (!empty($email) && !empty($nombre) && !empty($texto)) {
    $destino = 'jsgarcia72217@universidadean.edu.co';
    $asunto = 'Email de prueba';

    $cuerpo = '
    <html>
        <head>
            <title>Prueba de correo</title>
        </head>
        <body>
            <h1>Email de: ' . $nombre . '</h1>
            <p>' . $texto . '</p>
            <p>' .$email .' </p>
        </body>
    </html>
    ';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $nombre <$email>\r\n";
    $headers .= "Return-path: $destino\r\n";

    $mail = mail($destino, $asunto, $cuerpo, $headers);

    if ($mail) {
        echo "<script>
                alert('Email enviado correctamente');
                window.location.href = '../index.html';
              </script>";
    } else {
        $error = error_get_last()['message'];
        echo "<script>
                alert('Error al enviar el email: $error');
              </script>";
    }
} else {
    echo "<script>
            alert('Error al enviar el email: Campos vacíos');
          </script>";
}
?>
