<?php
include("init2.php");

	$array['cols'][] = array('label' => 'Knjiga','type' => 'string');
    $array['cols'][] = array('label' => 'Broj rezervacija po knjigama', 'type' => 'number');

		$sql="SELECT k.naslov, COUNT(r.rezervacijaID) AS Broj FROM knjiga k INNER JOIN rezervacija r ON k.knjigaID = r.knjigaID GROUP BY k.knjigaID";
			if (!$q=$mysqli->query($sql)){
					echo '{"greska":"Nastala je greška pri izvršavanju upita."}';
					exit();
			} else {
			if ($q->num_rows>0){

			$niz[] = array();
			while ($red=$q->fetch_object()){
			 $array['rows'][] = array('c' => array( array('v'=>$red->naslov),array('v'=>(int)$red->Broj)) );

			}

			$niz_json = json_encode ($array);
			print ($niz_json);
			} else {
			//ako nema rezultata u bazi
			echo '{"greska":"Nema rezultata."}';
			}
		}


?>
