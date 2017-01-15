<?php 
	require 'vendor/autoload.php';
	use DAO\Access;

	$ac = new Access();
	$query = "SELECT email, password FROM users WHERE email = 'midia.matheus@gmail.com' AND password = 12345";
	$ac->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$ac->execute();
	echo '<pre>';
	print_r($ac->fetchAll());
	echo '</pre>';
?>