<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");
$error = '';
?>
 


 <div class="row">
<div class="medium-12 large-12 columns">

<h4>Prijava</h4>
<form action="" method="post">
 <span style="color:#990000">
<p align="center"><strong><?php echo $error; ?>   </strong></p>
 </span>
Korisničko ime:
<input type="text" name="korisnicko_ime"  /><br />
Lozinka:
<input type="password" name="lozinka" /><br />
<input type="submit" name="submit" value="Ulaz" class="button" />
</form>

<?php
if(isset($_POST["submit"])){
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $lozinka = $_POST["lozinka"];
    $upit = $db->query("SELECT * FROM administratori WHERE korisnicko_ime = '$korisnicko_ime' ");
    $rez = $upit->fetchAll();
    if(count($rez) > 0){
        if($lozinka == $rez[0]["lozinka"]){
            $error = ""; 
            session_start();
            $_SESSION["ulogiran"] = "da";
            header("Location:filmovi_admin.php");
            exit();
        }
        else{
            $error = "Pogrešna lozinka! Pokušajte ponovno!";
        }
    }else{
        $error = "Pogrešno korisničko ime! Pokušajte ponovno!";
    }
}else{
    $error = "";
}
?>
 
<?php
include("template_podnozje.html");
?>