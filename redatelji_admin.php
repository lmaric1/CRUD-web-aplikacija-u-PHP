<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");
include("session.php");

$upit = $db->query("SELECT redatelji.film, redatelji.id, filmovi.naziv_filma, redatelji.redatelj
FROM redatelji
INNER JOIN filmovi ON filmovi.id = redatelji.film ORDER BY redatelj ASC");
$rezultati = $upit->fetchAll();
?>

<div class="row medium-10 large-8 colums">
<h2>Redatelji</h2> <br>
</div>
<?php
echo "
<table class='striped'>
<thead>
<tr>
<th>Redatelj</th><th>Film</th><th><a href='redatelji_forma.php?akcija=unos'>Novi redatelj</a></th>
<tr>
</thead>
<tbody>";

foreach ($rezultati as $redatelj) {
    echo "<tr><td>" . $redatelj["redatelj"] . "</td><td>" . $redatelj["naziv_filma"] . "</td><td nowrap> 
    <a href='redatelji_forma.php?akcija=izmjena&id=" . $redatelj["id"] . "&naziv_filma=" . $redatelj["naziv_filma"] . "'> uredi </a> | 
    <a href='redatelji_sql.php?akcija=brisanje&id=" . $redatelj["id"] . "'> pobriši </a></td></tr>";
    
}
?>
    <?php
    include("template_podnozje.html");
    ?>
