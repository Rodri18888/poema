<?php
if (!empty($_POST["titulo"]) && !empty($_POST["poema"])) {
    $titulo = trim($_POST["titulo"]);
    $poema = trim($_POST["poema"]);
    $linea = $titulo . "||" . $poema . PHP_EOL;
    file_put_contents("poemas.txt", $linea, FILE_APPEND);
}

header("Location: index.php");
exit;
?>
