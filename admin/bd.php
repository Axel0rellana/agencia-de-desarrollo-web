<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "website";

try{
	$conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
}catch(Exception $e){
	echo "Error de conexion: ".$e->getMessage();
}

?>