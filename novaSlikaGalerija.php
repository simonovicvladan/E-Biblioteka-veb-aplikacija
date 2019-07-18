<?php
        ini_set('display_errors', 1);

		include("init.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'assets'. DIRECTORY_SEPARATOR.'galerija' . DIRECTORY_SEPARATOR. $name;
            move_uploaded_file($tmpName,$targetPath);
            header( 'Location: galerija.php' ) ;
            exit;
          }

        ?>
