<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");
include("session.php");

$upit = $db->query("SELECT zanrovi.film, zanrovi.id, filmovi.naziv_filma, zanrovi.naziv_zanra
FROM zanrovi
INNER JOIN filmovi ON filmovi.id = zanrovi.film ORDER BY naziv_zanra ASC");
$rezultati = $upit->fetchAll();
?>

<div class="row medium-10 large-8 colums">
<h2>Žanrovi</h2> <br>
</div>
<?php
echo "
<table class='striped'>
<thead>
<tr>
<th>Naziv žanra</th><th>Film</th><th><a href='zanrovi_forma.php?akcija=unos'>Novi žanr</a></th>
<tr>
</thead>
<tbody>";

foreach ($rezultati as $zanr) {
    echo "</td><td>" . $zanr["naziv_zanra"] . "</td><td>" . $zanr["naziv_filma"] . "</td><td nowrap> 
    <a href='zanrovi_forma.php?akcija=izmjena&id=" . $zanr["id"] . "&naziv_filma=" . $zanr["naziv_filma"] . "'> uredi </a> | 
    <a href='zanrovi_sql.php?akcija=brisanje&id=" . $zanr["id"] . "'> pobriši </a></td></tr>";
    
}
?>
    <?php
    include("template_podnozje.html");
    ?>
