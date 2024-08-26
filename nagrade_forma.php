<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$naziv_filma = isset($_GET["naziv_filma"]) ? $_GET["naziv_filma"] : "";

$nagrada = "";
$film = "";

if ($akcija == "izmjena") {
    $upit = $db->query("SELECT nagrade.film, nagrade.id, nagrade.nagrada, filmovi.naziv_filma
        FROM nagrade
        INNER JOIN filmovi ON filmovi.id = nagrade.film
        WHERE nagrade.id = " . $id);
    $rez = $upit->fetch();

    if ($rez) {
        $film = $rez["naziv_filma"];
        $nagrada = $rez["nagrada"];

    } else {
        $film = "";
        $nagrada = "";
    }
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">
        <form method="post" action="nagrade_sql.php?akcija=<?php echo $akcija; ?>&id=<?php echo $id; ?>">

        Film: <br>
            <select name="film">
                <option value="0"> - </option>
                <?php
                $upitFilmovi = $db->query("SELECT * FROM filmovi ORDER BY naziv_filma");
                $rezultatiFilmovi = $upitFilmovi->fetchAll();
                foreach ($rezultatiFilmovi as $k) {
                    $selected = ($k["naziv_filma"] == $film) ? "selected" : "";
                    echo "<option value='" . $k["id"] . "' $selected>" . $k["naziv_filma"] . "</option>";
                }
                ?>
            </select>
            <br>

        Nagrada: <br>
         <textarea name="nagrada" rows="2"><?php echo $nagrada; ?></textarea><br>

        
            <input type="submit" name="submit" value="Dalje" class="button">
        </form>
    </div>
</div>

<?php
include("template_podnozje.html");
?>
