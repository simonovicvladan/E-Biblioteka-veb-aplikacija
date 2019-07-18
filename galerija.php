<?php

    include("init.php");
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
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
</style>
<div class="parallax"></div>
 
 <!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Galerija</h3>
            <hr />

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
                <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                  <?php

                      $files = glob("assets/galerija/*.*");
                      //var_dump($files);
                      foreach ($files as $file) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html">
                              <div class="work-wrapper">

                                <a class="fancybox-media" title="Biblioteka" href="<?php echo $file; ?>">

                                  <img src="<?php echo $file; ?>" class="img-responsive img-rounded" alt="" />
                                </a>
                              </div>
                          </div>

                        <?php
                      }
                   ?>

                </div>

            </div>
          </div>
        </div>
      </div>
</section>
 
 

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
