<?php
	$dbh="";	/*	database handler variable to be passed to function	*/
	try
	{
		$dbh=new PDO('mysql:host=localhost;dbname=telecom;charset=utf8mb4','root','',
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"));
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die("Sorry database error");
	}
	
?>