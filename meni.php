<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<style>
  ul li:hover {
    background-color: rgb(228, 79, 79);
  }

  a:active {
    background-color: rgb(228, 79, 79);
  }
</style>
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php">

BIBLIOTEKA

</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="index.php">HOME</a></li>
<li><a href="onama.php">O NAMA</a></li>
<li><a href="knjige.php">KNJIGE</a></li>
<li><a href="galerija.php">GALERIJA</a></li>
<li><a href="prognoza.php">VREMENSKA PROGNOZA</a></li>
<?php
  if(!empty($_SESSION['user'])){
    ?>
    <li><a href="rezervisi.php">REZERVISI</a></li>
    <?php
    if($_SESSION['user']['isAdmin']){
      ?>
      <li><a href="admin.php">ADMIN PANEL</a></li>
      <?php
    }
    ?>
    <li><a href="logout.php">LOGOUT</a></li>
    <?php
  }else{
    ?>
    <li><a href="register.php">REGISTRACIJA</a></li>
    <li><a href="login.php">LOGIN</a></li>
    <?php
  }
 ?>

</ul>
</div>
<script type = "text/javascript">
  $("a").click(function(){
      $("a").css("background-color","");
      $(this).css("background-color","rgb(228, 79, 79)");
  });
</script>
</div>

</div>

