<?php 
	require_once 'vendor/autoload.php';
	use Key\Password;
	$password = new Password();
	$password_data = $password->getPassword("snapchate");

	$newData = array(
		"title" => "Snapchat",
		"slug" => strtolower("Snapchat")
	);

	$password->setPasswordData(array("slug" => "snapchate"));
	$password->setNewPasswordData($newData);
	echo '<pre><h1>Updated</h1>';
	print_r($password->updatePassword());