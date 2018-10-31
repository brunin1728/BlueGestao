<?php
include ( 'config_db.php');

try{
	$conn = new PDO(
    	'mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS
	);	
	 $conn -> exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
	echo "Erro: " . $e->getMessage() . "<br />";
	die();
}

function getConnection() {
	global $conn;

	return $conn;
}