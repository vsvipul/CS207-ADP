<?php
	session_start();
	$servername = "localhost";
	$username = "shreyanshkuls";
	$password = "";

	$_SESSION['newTable'] = $_POST["table"];
	$_SESSION['newDatabase'] = $_POST["database"];

	$conn = new PDO('mysql:host='.$servername.';dbname='.$newDatabase, $username, $password);

	$comm1 = ' (id INT(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,';
	$comm2 = " name VARCHAR(30) NOT NULL,";
	$comm3 = " email VARCHAR(30),";
	$comm4 = " contact INT(11), address VARCHAR(200))";

	$conn->query("CREATE DATABASE ". $_SESSION['newDatabase']);
	$conn->query("USE " . $_SESSION['newDatabase']);
	$conn->query("CREATE TABLE ". $_SESSION['newTable'] . $comm1 . $comm2 . $comm3 . $comm4 . ';');

	$conn = null;
	
	header("Location: http://localhost/dataForm.html");
?>