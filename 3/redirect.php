<?php
	session_start();
	$servername = "localhost";
	$username = "shreyanshkuls";
	$password = "";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	$_SESSION['newTable'] = $_POST["table"];
	$_SESSION['newDatabase'] = $_POST["database"];

	$comm1 = ' (id INT(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,';
	$comm2 = " name VARCHAR(30) NOT NULL,";
	$comm3 = " email VARCHAR(30),";
	$comm4 = " contact INT(11), address VARCHAR(200))";

	mysqli_query($conn, "CREATE DATABASE ". $_SESSION['newDatabase']);
	mysqli_query($conn, "USE " . $_SESSION['newDatabase']);
	mysqli_query($conn, "CREATE TABLE ". $_SESSION['newTable'] . $comm1 . $comm2 . $comm3 . $comm4 . ';');

	mysqli_close($conn);
	header("Location: http://localhost/dataForm.html");

?>
