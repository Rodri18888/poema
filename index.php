<?php
$poemas = [];

if (file_exists("poemas.txt")) {
    $contenido = file("poemas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($contenido as $linea) {
        $partes = explode("||", $linea);
        $titulo = $partes[0] ?? '';
        $poema = $partes[1] ?? '';
        $poemas[] = ["titulo" => $titulo, "poema" => $poema];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Galería de Poemas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script>
        function togglePoema(id) {
            const poema = document.getElementById('poema-' + id);
            poema.classList.toggle('d-none');
        }
    </script>
</head>

<body class="bg-light">
    <div class="container py-4">

        <h1 class="mb-4">Galería de Poemas</h1>

        <form action="agregar.php" method="POST" class="mb-4">
            <input type="text" name="titulo" class="form-control mb-3" placeholder="Título del poema" required>
            <textarea name="poema" class="form-control mb-3" placeholder="Escribe tu poema aquí..." required></textarea>
            <button class="btn btn-primary">Agregar poema</button>
        </form>

        <div class="row">
            <?php foreach ($poemas as $index => $p): ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($p["titulo"]); ?></h5>
                            <p id="poema-<?php echo $index; ?>" class="card-text d-none">
                                <?php echo nl2br(htmlspecialchars($p["poema"])); ?>
                            </p>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                onclick="togglePoema(<?php echo $index; ?>)">Ver más</button>

                            <form action="eliminar.php" method="POST" class="mt-2">
                                <input type="hidden" name="id" value="<?php echo $index; ?>">
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>

</html>