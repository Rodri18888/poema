<?php
if (isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    if (file_exists("poemas.txt")) {
        $poemas = file("poemas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (isset($poemas[$id])) {
            unset($poemas[$id]);
            file_put_contents("poemas.txt", implode(PHP_EOL, $poemas) . PHP_EOL);
        }
    }
}

header("Location: index.php");
exit;
?>
