<?php
if (!empty($_POST["poema"])) {
    $poema = trim($_POST["poema"]);
    $archivo = fopen("poemas.txt", "a");
    fwrite($archivo, $poema . PHP_EOL);
    fclose($archivo);
}

header("Location: index.php");
exit;
