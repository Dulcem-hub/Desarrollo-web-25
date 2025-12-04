<?php
// Handler simple para formulario POST
function s($v){ return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // redirigir al ejemplo si se accede por otro método
    header('Location: forms_get_post.html');
    exit;
}

$name = s($_POST['name'] ?? '');
$email = s($_POST['email'] ?? '');
$message = s($_POST['message'] ?? '');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resultado POST</title>
    <style>body{font-family:Arial;padding:20px}</style>
</head>
<body>
    <h2>Datos recibidos (POST)</h2>
    <ul>
        <li><strong>Nombre:</strong> <?php echo $name; ?></li>
        <li><strong>Email:</strong> <?php echo $email; ?></li>
        <li><strong>Mensaje:</strong> <?php echo nl2br($message); ?></li>
    </ul>

    <p><a href="forms_get_post.html">Volver</a></p>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: forms_get_post.html');
    exit;
}

function sanitize($v){ return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8'); }

$name = sanitize($_POST['name'] ?? '');
$email_raw = $_POST['email'] ?? '';
$email = sanitize($email_raw);
$comment = sanitize($_POST['comment'] ?? '');

$email_ok = filter_var($email_raw, FILTER_VALIDATE_EMAIL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resultado POST</title>
    <style>body{font-family:Arial, sans-serif;padding:20px}</style>
</head>
<body>
    <h2>Resultado del formulario (POST)</h2>
    <?php if (!$email_ok): ?>
        <p style="color:darkorange">El email proporcionado no es válido.</p>
    <?php endif; ?>

    <ul>
        <li><strong>Nombre:</strong> <?php echo $name ?: '<em>(vacío)</em>'; ?></li>
        <li><strong>Email:</strong> <?php echo $email; ?></li>
        <li><strong>Comentario:</strong> <?php echo nl2br($comment); ?></li>
    </ul>

    <p><a href="forms_get_post.html">Volver</a></p>
</body>
</html>
