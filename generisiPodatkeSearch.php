<?php
include("init.php");
require('knjigaClass.php');
$knjigaID=$_GET['knjigaID'];
$knjiga = new Knjiga($mysqli);
$knjiga->allReservationBySearch($knjigaID);
$result = $knjiga->getResult();
$niz = array();
$iterator = 0;
while($red = mysqli_fetch_assoc($result)) {
      $niz[$iterator] = $red;
      $iterator++;
   }

   echo(json_encode($niz));


 ?>
