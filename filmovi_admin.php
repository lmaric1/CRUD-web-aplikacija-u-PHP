<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");
include("session.php");

$upit = $db->query("SELECT naziv_filma, godina, id FROM filmovi ORDER BY naziv_filma ASC");
$rezultati = $upit->fetchAll();
?>

<div class="row medium-10 large-8 colums">
<h2>Filmovi</h2> <br>
</div>

<?php
echo "
<table class='striped'>
<thead>
<tr>
<th>Naziv filma</th><th>Godina</th><th><a href='filmovi_forma.php?akcija=unos'>Novi film</a></th>
</tr>
</thead>
<tbody>";

foreach ($rezultati as $film) {
    echo "<tr>
            <td>" . $film["naziv_filma"] . "</td>
            <td>" . $film["godina"] . "</td>
            <td nowrap> 
                <a href='filmovi_forma.php?akcija=izmjena&id=" . $film["id"] . "'>uredi</a> | 
                <a href='filmovi_sql.php?akcija=brisanje&id=" . $film["id"] . "'>pobriši</a>
            </td>
          </tr>";
}

echo "</tbody></table>";
?>

<?php
include("template_podnozje.html");
?>
