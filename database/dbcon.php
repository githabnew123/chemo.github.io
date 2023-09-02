<?php 

	$host = "localhost";
	$db_name = "chemo";
	$username = "root";
	$password =  "";
	
	try{
		//$connection = new PDO("mysql:host=localhost;dbname=php_db","root","");
		$connection = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection failed ".$e;
	}

 ?>