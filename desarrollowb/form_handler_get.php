<?php
// Handler simple para formulario GET
// Muestra todas las query params recibidas
function s($v){ return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8'); }

$method = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resultado GET</title>
    <style>body{font-family:Arial;padding:20px}</style>
</head>
<body>
    <h2>Datos recibidos (<?php echo s($method); ?>)</h2>
    <?php if (!empty($_GET)): ?>
        <ul>
        <?php foreach($_GET as $k => $v): ?>
            <li><strong><?php echo s($k); ?>:</strong> <?php echo s($v); ?></li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se recibieron parámetros por GET.</p>
    <?php endif; ?>

    <p><a href="forms_get_post.html">Volver</a></p>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('Location: forms_get_post.html');
    exit;
}

function s($v){ return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8'); }

$q = s($_GET['q'] ?? '');
$cat = s($_GET['cat'] ?? 'all');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resultado GET</title>
    <style>body{font-family:Arial, sans-serif;padding:20px}</style>
</head>
<body>
    <h2>Resultados de búsqueda (GET)</h2>
    <p><strong>Consulta:</strong> <?php echo $q ?: '<em>(vacía)</em>'; ?></p>
    <p><strong>Categoría:</strong> <?php echo $cat; ?></p>
    <p><a href="forms_get_post.html">Volver</a></p>
</body>
</html>
