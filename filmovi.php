<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");

$upit = $db->query("SELECT * FROM filmovi ORDER BY naziv_filma ASC");
$rezultati = $upit->fetchAll();
?>
 
<div class="row medium-10 large-8 columns">
<h2>Filmovi</h2>

</div>

<?php
foreach($rezultati as $film){
    echo "
    <div class=\"row medium-10 large-8 columns\">
    <a href=\"film.php?id=" . $film["id"] . "\">"
    . $film["naziv_filma"] . " </a></div>";
}

include("template_podnozje.html");
?>
