<?php
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

if ($akcija == "unos") {
    $unos = $db->query("
        INSERT INTO redatelji (redatelj, film)
        VALUES ('" . $_POST["redatelj"] . "', '" . ($_POST["film"]) . "')
    ");
} elseif ($akcija == "brisanje") {
    $brisanje = $db->query("
        DELETE FROM redatelji WHERE id = " . $id
    );
}elseif ($akcija == "izmjena") {
    $izmjena = $db->query("
        UPDATE redatelji
        SET 
        redatelj = '" . $_POST["redatelj"] . "', 
        film = '" . $_POST["film"] . "'
        WHERE id = " . $id
    );

}
header("Location: redatelji_admin.php");

?>
