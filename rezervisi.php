<?php

    include("init.php");
    require('knjigaClass.php');
    $msg = '';


    if(isset($_POST['rezervisi'])) {

    		$knjiga = new Knjiga($mysqli);
    		$knjiga->rezervacija(trim($_POST['knjiga']),trim($_POST['datum']),trim($_POST['days']));
        if($knjiga->getResult()){
          $msg="Uspesno rezervisano";
        }else{
          $msg="Neuspesna rezervacija ";
        }
     }
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
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
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
            <h3>Rezervacija</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="rezervacija" method="post" action="">
                  <div class="form-group">
                      <label for="knjiga" class="cols-sm-2 control-label">Knjiga</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="knjiga" >
                              <?php
                                  $knjiga = new Knjiga($mysqli);
                                  $knjiga->allBooks();
                                  $result = $knjiga->getResult();

                                  foreach ($result as $red ) {
                     			            $id = $red['knjigaID'];
                     			            $naslov = $red['naslov'];
											
                                      ?>
                                      <option value="<?php echo $id;?>"><?php echo $naslov;?></option>
                                      <?php
                                     }
                                     ?>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="date" class="cols-sm-2 control-label">Datum</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                            <input id="datepicker" type="text" class="form-control" name="datum" id="datum"  placeholder="Datum"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="days" class="cols-sm-2 control-label">Broj dana</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></span>
                            <input id="days" type="text" class="form-control" name="days" id="days"  placeholder="Broj dana"/>
                          </div>
                        </div>
                    </div>
                    <div class="form-group ">
                      <input type="submit" name="rezervisi" class="btn btn-danger btn-lg " value="Rezervisi">
                    </div>
                  </form>

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
<script src="assets/js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
</body>

</html>
