<?php

    include("init.php");
 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Biblioteka</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />


</head>
<body style="background-color:#081d47" data-spy="scroll" data-target="#menu-section">

<?php

    include("meni.php");
 ?>

  
  <style>
.parallax { 
  /* The image used */
  background-image: url("assets/img/biblioteka.jpg");

  /* Full height */
  height: 300px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
.btn-custom-one {
    border-radius: 50%;
}

#map {
    width: 100%;
    height: 400px;
}

</style>
<div class="parallax"></div>



<!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>O nama</h3>
            <hr />

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <h1> Biblioteka</h1>
			  <br>
              <h3>Istorijat</h3>
			  <br>
              <h4>Biblioteka predstavlja jedinstveno svedočanstvo o razvoju društva u celini u jednom istorijskom trenutku i veoma upečatljivo ilustruje stanovište države koja je posle Prvog svetskog rata, svim silama nastojala da nadoknadi propušteno i da stane u red razvijenih zemalja, prepoznajući značaj obrazovanja u tom procesu.</h4>
			  <br>
			  <br>
              <h3>Matična delatnost</h3>
			  <br>
              <h4>Biblioteka brine se o profesionalnom usavršavanju zaposlenih iz sopstvenih redova, ali i iz drugih univerzitetskih, visokoškolskih i biblioteka naučnoistraživačkih instituta. Kredibilitet za konstantno stremljenje ka unapređenju poslovanja biblioteka, pored velikog iskustva, daje i činjenica da je ova biblioteka matična za skoro 250 biblioteka.</h4>
			  <br>
			  <br>
			  <h3>Dokumenti</h3>
			  <br>
              <h4>U radu sa korisnicima, organizaciji poslova, kreiranju planova i težnje ka dostizanju standarda izvrsnosti u misiji koju sprovodi, biblioteka se oslanja na niz dokumenta, kako internih, tako i onih koji su doneseni od strane Univerziteta u Beogradu, resornog ministarstva i međunarodnih stručnih tela.</h4>
			  <br>
			  <br>
			  <h3>Projekti</h3>
			  <br>
              <h4>Kao moderni istraživački centar, biblioteka se upušta u avanture od kojih će mnoge promeniti samu prirodu biblioteka. Tako projekti obuhvataju inovativna partnerstva sa drugim bibliotekama, institucijama i kompanijama, i polaze od fokusa na jačanju postojećih snaga, do poboljšanja akademske saradnje uz korišćenje novih tehnologija.</h4>
			  <br>
			  <br>
			  <h3>Prostori</h3>
			  <br>
              <h4>Znate li za bolje mesto za učenje od čitaonice?
Kod kuće telefon, TV, frižider, peglanje i slični izazovi za tren oka odvuku pažnju, a sati koji su vam preko potrebni prolete u nepovrat. U našim čitaonicama atmosfera motiviše na učenje: okruženi ste drugima koji uče, „uranjate“ u knjigu, upijate znanje i blistate na ispitu!</h4>
            </div>
          </div>
        </div>
      </div>
</section>


<div id="map"></div>


<section id="services" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
<h3>Ponuda</h3>
<hr />
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-document"></i>
<a href="knjige.php" style="color:white"><h3>Knjige</h3>
Pogledajte spisak knjiga koje možete iznajmiti.
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-home"></i>
<a href="galerija.php" style="color:white"><h3>Galerija</h3>
Uverite se u prijatnost i udobnost naše čitaonice.
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-person"></i>
<a href="register.php" style="color:white"><h3>Registracija</h3>
Registrujte se kako biste koristili naše usluge.
</a>
</div>
</div>

</div>
</div>
</section>

<?php
    include("footer.php");

 ?>

     <!-- Skripta za pokretanje mape i setovanje polozaja -->
    <script>
        function initMap() {
        var polozaj = {lat: 44.772841,  lng: 20.475185 };
        var mapa = new   google.maps.Map(document.getElementById('map'), {
              zoom: 14,
              center: polozaj
            });
        var marker = new google.maps.Marker({
        position: polozaj,
        map: mapa
        });
        }
    </script>
    <!-- Odavde se skida mapa sa google api-a -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4xCIapNfTV8lONxfoc4svvKN0SukizIM&callback=initMap">
    </script>
 

<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/source/jquery.fancybox.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>

</html>
