<?php 
include("pdo.php");
$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";

if($akcija == "unos"){
    $unos = $db->query("
    INSERT INTO filmovi
    (naziv_filma,godina)
    VALUES
    ('" . $_POST["naziv_filma"] . "',
    '" . $_POST["godina"] . "');
    ");
}elseif($akcija == "brisanje"){
    $brisanje = $db->query("
    DELETE FROM filmovi WHERE id= " . $id);
}elseif($akcija == "izmjena"){
    $izmjena = $db->query("
    UPDATE filmovi SET
    naziv_filma = '" . $_POST["naziv_filma"] . "',
    godina = '" . $_POST["godina"] . "'
    WHERE id = " . $id);
}

header("Location:filmovi_admin.php");
?>