<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");
$id = isset($_GET["id"]) ? $_GET["id"] : 0;

$upit = $db->query("
    SELECT
    filmovi.naziv_filma, filmovi.godina, redatelji.redatelj, zanrovi.naziv_zanra, glumci.glumac, nagrade.nagrada
    FROM 
    filmovi 
    LEFT JOIN redatelji ON filmovi.id = filmovi.naziv_filma
    LEFT JOIN zanrovi ON zanrovi.film = filmovi.id
    LEFT JOIN glumci ON glumci.film = filmovi.id
    LEFT JOIN nagrade ON nagrade.film = filmovi.id
    WHERE filmovi.id = $id
");
$rez = $upit->fetchAll();
?>
<html>
<div class="row">
<div class="medium-12 large-12 columns">

<div class="row medium-10 large-8 columns">
<h2><?php echo $rez[0]["naziv_filma"]?></h2>
</div>
<div class="row medium-10 large-8 columns"> <br>
<h5>Godina:  <?php echo $rez[0]["godina"]; ?> </h5>

<div class="row medium-10 large-8 columns"> <br>
<h5>Redatelji:</h5>
<?php 
    $upitRedatelj = $db->query("
        SELECT DISTINCT redatelj
        FROM redatelji
        WHERE film = $id
    ");
    $rezRed = $upitRedatelj->fetchAll();

    if (count($rezRed) > 0) {
        foreach ($rezRed as $Redatelj) {
            echo $Redatelj["redatelj"] . "<br>"; 
        }
    } else {
        echo " -  <br>";
    }
    ?>  <br>

<h5>Žanrovi:</h5>
<?php 
if (isset($rez[0]["naziv_zanra"])) {
    echo $rez[0]["naziv_zanra"] . "<br><br>";
} else {
    echo " - <br><br>";
}
?> 

<h5>Glumci:</h5>
<?php
$upitglumci = $db->query("
    SELECT glumac
    FROM glumci
    WHERE film = $id
");
$rezglumci = $upitglumci->fetchAll();

if (count($rezglumci) > 0) {
    foreach ($rezglumci as $glumac) {
        echo $glumac["glumac"] . " " . "<br>" . "<br>";
    }
} else {
    echo " - <br><br>";
}
?>
</div>

<h5>Nagrada:</h5>
<?php
$upitnagrade = $db->query("
    SELECT DISTINCT nagrada
    FROM nagrade
    WHERE film = $id
");
$rezNag = $upitnagrade->fetchAll();

if (count($rezNag) > 0) {
    foreach($rezNag as $nagrade) {
        echo $nagrade["nagrada"] . "<br>";
    }
} else {
    echo " - <br>";
}
?>


</div> <br>


<div class="row medium-10 large-8 columns" style="text-align:center">
<a href="filmovi.php">&lt;&lt; povratak </a></div>
</html>
<?php
include("template_podnozje.html");
?>