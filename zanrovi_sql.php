<?php
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

if ($akcija == "unos") {
    $unos = $db->query("
        INSERT INTO zanrovi (naziv_zanra, film)
        VALUES ('" . $_POST["naziv_zanra"] . "', '" . $_POST["film"] . "')
    ");
} elseif ($akcija == "brisanje") {
    $brisanje = $db->query("
        DELETE FROM zanrovi WHERE id = " . $id
    );
} elseif ($akcija == "izmjena") {
    $izmjena = $db->query("
        UPDATE zanrovi
        SET 
        film = '" . $_POST["film"] . "', 
        naziv_zanra = '" . $_POST["naziv_zanra"] . "'
        WHERE id = " . $id
    );
}

header("Location: zanrovi_admin.php");

?>
