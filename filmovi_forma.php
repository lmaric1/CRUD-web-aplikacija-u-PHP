<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";

if($akcija == "izmjena"){
$upit = $db->query("SELECT * FROM filmovi WHERE id = " . $id);
$rez = $upit->fetchAll();

$naziv_filma = $rez[0]["naziv_filma"];
$godina = $rez[0]["godina"];
}else{
    $naziv_filma = "";
    $godina = "";
}
?>
 
<div class="row">
<div class="medium-12 large-12 columns">


<form method="post" action="filmovi_sql.php?akcija=<?php echo $akcija; ?>&id=<?php echo $id; ?>">

Naziv filma: <input type="text" name="naziv_filma" value="<?php echo $naziv_filma; ?>"><br>

Godina: <input type="text" name="godina" value="<?php echo $godina; ?>"> <br>

<input type="submit" name="submit" value="Dalje" class="button">
</form>

<?php
include("template_podnozje.html");
?>
