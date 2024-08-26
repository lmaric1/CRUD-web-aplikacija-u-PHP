<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

$naziv_zanra = "";
$film = "";

if ($akcija == "izmjena") {
    $upit = $db->query("SELECT zanrovi.id, zanrovi.film, filmovi.naziv_filma, zanrovi.naziv_zanra
        FROM zanrovi
        INNER JOIN filmovi ON filmovi.id = zanrovi.film
        WHERE zanrovi.id = " . $id);
    $rez = $upit->fetch();

    if ($rez) {
        $film = $rez["naziv_filma"];
        $naziv_zanra = $rez["naziv_zanra"];
    } else {
        $naziv_zanra = "";
        $film = "";
    }
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">
        <form method="post" action="zanrovi_sql.php?akcija=<?php echo $akcija; ?>&id=<?php echo $id; ?>">
        Naziv žanra: <input type="text" name="naziv_zanra" value="<?php echo $naziv_zanra; ?>"><br>

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
