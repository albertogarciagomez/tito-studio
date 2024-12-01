<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validación básica
    if (empty($name) || empty($email) || empty($message)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Destinatario
    $to = "albertogarciagomez18@gmail.com";

    // Asunto del correo
    $subject = "Nuevo mensaje de contacto de $name";

    // Contenido del mensaje
    $email_message = "Nombre: $name\n";
    $email_message .= "Correo: $email\n\n";
    $email_message .= "Mensaje:\n$message\n";

    // Encabezados
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Gracias por contactarnos. Te responderemos pronto.";
    } else {
        echo "Lo sentimos, ocurrió un error al enviar tu mensaje.";
    }
} else {
    echo "Método no permitido.";
}
?>
