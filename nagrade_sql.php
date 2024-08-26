<?php
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

if ($akcija == "unos") {
    $unos = $db->query("
        INSERT INTO nagrade (film, nagrada)
        VALUES ('" . $_POST["film"] . "', '" . $_POST["nagrada"] . "')
    ");
} elseif ($akcija == "brisanje") {
    $brisanje = $db->query("
        DELETE FROM nagrade WHERE id = " . $id
    );
}elseif ($akcija == "izmjena") {
    $izmjena = $db->query("
        UPDATE nagrade
        SET  
        film = '" . $_POST["film"] . "',
        nagrada = '" . $_POST["nagrada"] . "'       
        WHERE id = " . $id
    );

}
header("Location: nagrade_admin.php");

?>
