<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

$redatelj = "";
$film = "";

if ($akcija == "izmjena") {
    $upit = $db->query("SELECT redatelji.id, redatelji.redatelj, filmovi.naziv_filma, redatelji.film
                        FROM redatelji
                        INNER JOIN filmovi ON filmovi.id = redatelji.film
                        WHERE redatelji.id = " . $id);
    $rez = $upit->fetch();

    if ($rez) {
        $film = $rez["naziv_filma"];
        $redatelj = $rez["redatelj"];
    } else {
        $film = "";
        $redatelj = "";
    }
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">
        <form method="post" action="redatelji_sql.php?akcija=<?php echo $akcija; ?>&id=<?php echo $id; ?>">
        Redatelj: <input type="text" name="redatelj" value="<?php echo $redatelj; ?>"><br>
        

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
