<?php

    include("init.php");
    require('knjigaClass.php');
    $msg = '';


    if(isset($_POST['izmeni'])) {

    		$knjiga = new Knjiga($mysqli);
    		$knjiga->izmenaNaslova(trim($_POST['knjiga']),trim($_POST['naslov']));
        if($knjiga->getResult()){
          $msg="Uspesno izmenjen naslov knjige! ";
        }else{
          $msg="Neuspesno izmenjen naslov knjige. ";
        }
     }

     if(isset($_POST['unosKnjige'])) {

     		$knjiga = new Knjiga($mysqli);
     		$knjiga->unosKnjige(trim($_POST['naslov']),trim($_POST['autor']),trim($_POST['opis']));
         if($knjiga->getResult()){
           $msg="Uspesno uneta nova knjiga!";
         }else{
           $msg="Neuspesno unosenje nove knjige.";
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
            <h3>Admin panel</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3> Izmena naslova knjige </h3>
            <div class="services-wrapper">
              <form name="izmenaNaslova" method="post" action="">
                  <div class="form-group">
                      <label for="knjiga" class="cols-sm-2 control-label">Knjiga</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="knjiga" >
                              <?php
							  
                                  $knjiga = new knjiga($mysqli);
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
                      <label for="naslov" class="cols-sm-2 control-label">Nov naslov knjige:</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="naslov" id="naslov"  placeholder="Nov naslov knjige"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group ">
                      <input type="submit" name="izmeni" class="btn btn-danger btn-lg " value="Izmeni naslov knjige">
                    </div>
                  </form>
                  <hr />

                     <div class="form-group">
                      <label for="knjigaSearch" class="cols-sm-2 control-label">Knjiga</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="knjigaSearch"  id="knjigaSearch" onchange="search()">
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
                    <div id="tabela"> </div>
                    <hr/>
                      <form name="galerija" method="post" action="novaSlikaGalerija.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="file" class="cols-sm-2 control-label">Nova slika za galeriju:</label>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="file" placeholder="Ubacite sliku za galeriju"/>
                              </div>
                            </div>
                        </div>
                        <div class="form-group ">
                          <input type="submit" name="file" class="btn btn-danger btn-lg " value="Ubaci">
                        </div>
                      </form>
                      <hr/>
                      <h3> Unos knjige </h3>
                      <form name="unosKnjige" method="post" action="">
                          <div class="form-group">
                              <label for="naslov" class="cols-sm-2 control-label">Naslov knjige</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="naslov" id="naslov"  placeholder="Naslov knjige"/>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="autor" class="cols-sm-2 control-label">Autor</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-flag fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="autor" id="autor"  placeholder="Autor"/>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="opis" class="cols-sm-2 control-label">Opis</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="opis" id="opis"  placeholder="Opis"/>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group ">
                              <input type="submit" name="unosKnjige" class="btn btn-danger btn-lg " value="Unesi knjigu">
                            </div>
                          </form>
                          <br>
                          <hr>
                          <div id="divGrafik"></div>
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

		function search(){

			var event = $("#knjigaSearch").val();
			$.ajax({
				url: "generisiPodatkeSearch.php",
				data: "knjigaID="+event,
				success: function(result){
				var text = '<table class="table"><thead><tr><th>Korisnik</th><th>Datum rezervacije</th><th>Broj dana</th><th>Brisanje</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					text += '<tr>';
					
					text += '<td>'+val.name+'</td>';
					text += '<td>'+val.datum+'</td>';
					text += '<td>'+val.brojdana+'</td>';
					text += '<td><a href="obrisi.php?id='+val.rezervacijaID+'">Obrisi</a></td>';
					text += '</tr>';

					});

					text+='</tbody></table>';
					$('#tabela').html(text);
			}});
		}

</script>
<script>
		$( document ).ready(function() {
			search();
		});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(grafik);

    function grafik() {
      var jsonData = $.ajax({
      url: "podaciGrafik.php",
      dataType:"json",
      async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {'title':'Broj rezervacija po knjigama',
     backgroundColor: { fill:'transparent' },
	    titleTextStyle: {
		textAlign: 'center',
        color: 'white',
				fontSize: 18},
	  		'width':800,
      	'height':500,
        is3D:true,
	  legend: {
        textStyle: {
			color: 'white'
        }
    },
	  };

 var chart = new google.visualization.PieChart(document.getElementById('divGrafik'));
 function selectHandler() {
				var selectedItem = chart.getSelection()[0];
				if (selectedItem) {
					alert( data.getValue(selectedItem.row,0));
				}
			}
			google.visualization.events.addListener(chart, 'select', selectHandler);

    chart.draw(data,  options);

  }



</script>
</body>

</html>
