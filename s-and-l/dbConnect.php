<?php
//This file creates a 'connection object' to our database

$database = "s_and_l"; //name of database
$serverName = "localhost"; //most default to localhost
$username = "root"; //username for the database NOT your account
$password = ""; //pw for the database NOT your account

try {
	$conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    error_log($e->getMessage());
	header("location:error.php");
	exit;
};

?>

