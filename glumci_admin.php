<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");
include("session.php");

$upit = $db->query("SELECT glumci.film, glumci.id, filmovi.naziv_filma, glumci.glumac
FROM glumci
INNER JOIN filmovi ON filmovi.id = glumci.film ORDER BY naziv_filma ASC");
$rezultati = $upit->fetchAll();
?>

<div class="row medium-10 large-8 colums">
<h2>Glumci</h2> <br>
</div>
<?php
echo "
<table class='striped'>
<thead>
<tr>
<th style='white-space: nowrap;'>Glumac</th><th>Film</th><th><a href='glumci_forma.php?akcija=unos'>Novi glumac</a></th>
<tr>
</thead>
<tbody>";

foreach ($rezultati as $glumac) {
    echo "<tr><td style='white-space: nowrap;'>" . $glumac["glumac"] . "</td><td>" . $glumac["naziv_filma"] . "</td><td nowrap> 
    <a href='glumci_forma.php?akcija=izmjena&id=" . $glumac["id"] . "&naziv_filma=" . $glumac["naziv_filma"] . "'> uredi </a> | 
    <a href='glumci_sql.php?akcija=brisanje&id=" . $glumac["id"] . "'> pobriši </a></td></tr>";
    
}
?>
    <?php
    include("template_podnozje.html");
    ?>
