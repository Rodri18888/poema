<?php
$poemas = [];

if (file_exists("poemas.txt")) {
    $contenido = file("poemas.txt", FILE_IGNORE_NEW_LINES);
    $poemas = $contenido;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Poemas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container py-4">

    <h1 class="mb-4">Galería de Poemas</h1>

    <form action="agregar.php" method="POST" class="mb-4">
        <textarea name="poema" class="form-control mb-3" placeholder="Escribe tu poema aquí..." required></textarea>
        <button class="btn btn-primary">Agregar poema</button>
    </form>

    <div class="row">
        <?php foreach ($poemas as $p): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($p)); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>
