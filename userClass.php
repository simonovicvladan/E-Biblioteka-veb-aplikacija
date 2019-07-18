<?php

class User {

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

	public function registracijaKorisnika($ime,$username,$password,$telephone) {

		$ime = mysqli_real_escape_string($this->conn,$ime);
		$username = mysqli_real_escape_string($this->conn,$username);
		$password = mysqli_real_escape_string($this->conn,$password);
		$telephone = mysqli_real_escape_string($this->conn,$telephone);

		$data = Array (
    "name" => $ime,
    "username" => $username,
	"password" => $password,
	"telephone"=> $telephone
    );

			$zaSlanje = json_encode($data);

			$curl_zahtev = curl_init("http://localhost/biblioteka/api/ubaciKorisnika.json");
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
	public function login($username,$password) {

		$username = mysqli_real_escape_string($this->conn,$username);
		$password = mysqli_real_escape_string($this->conn,$password);
		$q = mysqli_query($this->conn, "select * from user where  username='$username' and password='$password' limit 1");

		if(mysqli_num_rows($q)>0){
			 while($red = mysqli_fetch_assoc($q)) {
				 $_SESSION['user'] = $red;
			 }
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}
}

?>
