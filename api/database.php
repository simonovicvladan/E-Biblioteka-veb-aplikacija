<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "biblioteka";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function novaKnjiga($data) {
		$mysqli = new mysqli("localhost", "root", "", "biblioteka");
		
		
		$naslov = mysqli_real_escape_string($mysqli,$data["naslov"]);
		$autor = mysqli_real_escape_string($mysqli,$data["autor"]);
		$opis = mysqli_real_escape_string($mysqli,$data["opis"]);

		$sql = "INSERT INTO knjiga (naslov, autor, opis) VALUES ('$naslov','$autor', '$opis')";

		if($mysqli->query($sql))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}


		function ubaciKorisnika($data) {
			$mysqli = new mysqli("localhost", "root", "", "biblioteka");
			$cols = '(name, username, password, isAdmin, telephone)';

			$name = mysqli_real_escape_string($mysqli,$data['name']);
			$username = mysqli_real_escape_string($mysqli,$data['username']);
			$password = mysqli_real_escape_string($mysqli,$data['password']);
			$telephone = mysqli_real_escape_string($mysqli,$data['telephone']);

			$query = "INSERT into user (name, username, password, isAdmin, telephone) VALUES ('$name','$username','$password','0','$telephone')";

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}

	function vratiKnjige() {
		$mysqli = new mysqli("localhost", "root", "", "biblioteka");
		$q = 'SELECT * FROM knjiga';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function vratiZanrove() {
		$mysqli = new mysqli("localhost", "root", "", "biblioteka");
		$q = 'SELECT * FROM zanr';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}


	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
