<?php
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

if ($akcija == "unos") {
    $unos = $db->query("
        INSERT INTO glumci (film, glumac)
        VALUES ('" . $_POST["film"] . "', '" . $_POST["glumac"] . "')
    ");
} elseif ($akcija == "brisanje") {
    $brisanje = $db->query("
        DELETE FROM glumci WHERE id = " . $id
    );
} elseif ($akcija == "izmjena") {
    $izmjena = $db->query("
        UPDATE glumci
        SET 
        film = '" . $_POST["film"] . "',
        glumac = '" . $_POST["glumac"] . "'        
        WHERE id = " . $id
    );
}

header("Location: glumci_admin.php");
?>
