<?php
// Procesador sencillo y seguro para el formulario de ejemplo
// Asegurarse de que solo se procese mediante POST para evitar exponer datos en la URL
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_example.html');
    exit;
}

function sanitize($v) {
    return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8');
}

$name = sanitize($_POST['name'] ?? '');
$email_raw = $_POST['email'] ?? '';
$email = sanitize($email_raw);
$message = sanitize($_POST['message'] ?? '');
$subscribe = isset($_POST['subscribe']) ? 'Sí' : 'No';

$email_valid = filter_var($email_raw, FILTER_VALIDATE_EMAIL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resultado del Formulario</title>
    <style>body{font-family:Arial, sans-serif;padding:20px}</style>
</head>
<body>
    <h2>Resultados del formulario</h2>

    <?php if (!$email_valid): ?>
        <p style="color:darkorange"><strong>Advertencia:</strong> El email proporcionado no parece válido.</p>
    <?php endif; ?>

    <ul>
        <li><strong>Nombre:</strong> <?php echo $name; ?></li>
        <li><strong>Email:</strong> <?php echo $email; ?></li>
        <li><strong>Mensaje:</strong> <?php echo nl2br($message); ?></li>
        <li><strong>Suscripción:</strong> <?php echo $subscribe; ?></li>
    </ul>

    <p><a href="form_example.html">Volver al formulario</a></p>
</body>
</html>
