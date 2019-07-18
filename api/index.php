<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	echo('Popis ruta: <br>');
	echo('------------ <br>');

	echo('GET zanrovi.json <br>');
	echo('GET knjige.json <br>');
	echo('POST ubaciKorisnika.json <br>');
	echo('POST knjige.json <br>');
});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /zanrovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiZanrove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /knjige.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiKnjige();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});


Flight::route('POST /ubaciKorisnika.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->ubaciKorisnika($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Greska!";

	}

	echo indent(json_encode($response));

});
Flight::route('POST /knjige.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->novaKnjiga($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
