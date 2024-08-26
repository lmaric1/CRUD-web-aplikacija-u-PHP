<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

$glumac = "";
$film = "";

if ($akcija == "izmjena") {
    $upit = $db->query("SELECT glumci.film, glumci.id, glumci.glumac, filmovi.naziv_filma
        FROM glumci
        INNER JOIN filmovi ON filmovi.id = glumci.film
        WHERE glumci.id = " . $id);
    $rez = $upit->fetch();

    if ($rez) {
        $film = $rez["naziv_filma"];
        $glumac = $rez["glumac"];

    } else {
        $film = "";
        $glumac = "";
    }
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">
        <form method="post" action="glumci_sql.php?akcija=<?php echo $akcija; ?>&id=<?php echo $id; ?>">
        Glumac: <input type="text" name="glumac" value="<?php echo $glumac; ?>"><br>
       
            Film: <br>
            <select name="film">
                <option value="0"> - </option>
                <?php
                $upitfilmovi = $db->query("SELECT * FROM filmovi ORDER BY naziv_filma");
                $rezultatifilmovi = $upitfilmovi->fetchAll();
                foreach ($rezultatifilmovi as $k) {
                    $selected = ($k["naziv_filma"] == $film) ? "selected" : "";
                    echo "<option value='" . $k["id"] . "' $selected>" . $k["naziv_filma"] . "</option>";
                }
                ?>
            </select>
            <br>

            <input type="submit" name="submit" value="Dalje" class="button">
        </form>
    </div>
</div>

<?php
include("template_podnozje.html");
?>
