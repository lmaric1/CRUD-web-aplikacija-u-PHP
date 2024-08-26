<?php
session_start();
if(isset($_SESSION["ulogiran"]) && $_SESSION["ulogiran"] == "da"){

}else{
    header("Location:login.php");
    exit;
}
?>