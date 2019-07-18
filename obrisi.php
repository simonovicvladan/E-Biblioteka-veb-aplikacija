<?php
include("init.php");

$id=mysqli_real_escape_string($mysqli,$_GET["id"]);


if(mysqli_query($mysqli, "delete from rezervacija  where rezervacijaID=$id")){
  header("Location: index.php");
}else{
  echo("Doslo je do greske prilikom brisanja");
};



 ?>
