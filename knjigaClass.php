<?php

class Knjiga {

	private $conn;
	private $result;


	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($res){
			$this->result = $res;
	}

	public function allBooks() {

		$curl_zahtev = curl_init("http://localhost/biblioteka/api/knjige.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$this->setResult($json_objekat);
	}

	

	public function allReservationBySearch($knjigaID) {
		$knjigaID = mysqli_real_escape_string($this->conn,$knjigaID);

		$q = mysqli_query($this->conn, "SELECT * FROM rezervacija r join knjiga k on r.knjigaID = k.knjigaID join user u on u.userID = r.userID where r.knjigaID = $knjigaID");
		$this->setResult($q);
	}


	public function rezervacija($knjigaID,$datum,$dani) {

			$knjigaID = mysqli_real_escape_string($this->conn,$knjigaID);
		
			$datum = mysqli_real_escape_string($this->conn,$datum);
			$dani = mysqli_real_escape_string($this->conn,$dani);
			$userID=$_SESSION["user"]["userID"];
			$timestamp = date('Y-m-d H:i:s', strtotime($datum));
			$sql = "INSERT INTO rezervacija (datum,userID,knjigaID, brojDana) VALUES ('$timestamp',$userID,$knjigaID,'$dani')";

		if(mysqli_query($this->conn, $sql)){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}

	public function unosKnjige($naslov,$autor, $opis) {

			$naslov = mysqli_real_escape_string($this->conn,$naslov);
			$autor = mysqli_real_escape_string($this->conn,$autor);
			$opis = mysqli_real_escape_string($this->conn,$opis);
			

			$data = Array (
	    "naslov" => $naslov,
	    "autor" => $autor,
	    "opis" => $opis
	    );

				$zaSlanje = json_encode($data);

				$curl_zahtev = curl_init("http://localhost/biblioteka/api/knjige.json");
				curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
				curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
				curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				$curl_odgovor = curl_exec($curl_zahtev);
				$json_objekat=json_decode($curl_odgovor, true);
				curl_close($curl_zahtev);

				if($json_objekat == "Uspesno!") {
					$this->setResult(true);
				}
				else {
					$this->setResult(false);
				}

	}


	public function izmenaNaslova($knjigaID,$naslov) {

		$knjigaID = mysqli_real_escape_string($this->conn,$knjigaID);
		$naslov = mysqli_real_escape_string($this->conn,$naslov);

		if(mysqli_query($this->conn, "UPDATE knjiga SET naslov='$naslov' where knjigaID=$knjigaID")){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}



}

?>