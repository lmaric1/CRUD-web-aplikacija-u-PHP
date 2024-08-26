<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");
include("session.php");

$upit = $db->query("SELECT nagrade.film, nagrade.id, nagrade.nagrada, filmovi.naziv_filma
FROM nagrade
INNER JOIN filmovi ON filmovi.id = nagrade.film ORDER BY naziv_filma ASC");
$rezultati = $upit->fetchAll();
?>

<div class="row medium-10 large-8 colums">
<h2>Nagrade</h2> <br>
</div>
<?php
echo "
<table class='striped'>
<thead>
<tr>
<th>Film</th><th>Nagrada</th><th><a href='nagrade_forma.php?akcija=unos'>Novi zapis</a></th>
<tr>
</thead>
<tbody>";

foreach ($rezultati as $uc) {
    echo "<tr><td>" . $uc["naziv_filma"] . "</td><td>" . $uc["nagrada"] . "</td><td nowrap> 
    <a href='nagrade_forma.php?akcija=izmjena&id=" . $uc["id"] . "&naziv_filma=" . $uc["naziv_filma"] . "'> uredi </a> | 
    <a href='nagrade_sql.php?akcija=brisanje&id=" . $uc["id"] . "'> pobriši </a></td></tr>";
    
}
?>
    <?php
    include("template_podnozje.html");
    ?>
