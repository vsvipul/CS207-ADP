<?php 

	if($_POST["fname"] && $_POST["lname"] && $_POST["email"] && $_POST["comm"]) {
		echo "Email sent to abhinavchoudhury.04@gmail.com";
	}

	$to = 'abhinavchoudhury.04@gmail.com';
	$subject = "Assignment 2";
	$message = "Form details below.\n\nFirst Name: " . $_POST['fname'] . "\nLast Name: " . $_POST['lname'] . "\nEmail: " . $_POST['email'] . "\nTelephone: " . $_POST['tele'] . "\nComments: " . $_POST['comm'];

	mail($to, $subject, $message);

	$data = file_get_contents('wizard.json');
	$json = json_decode($data, true);

	echo "<br>";

	for($i = 0; $i < 6; $i++) {
		echo "<br>" . $json[$i]['name'] . '\'s wand is ' . $json[$i]['wand'][0]['wood'] . ', ' . $json[$i]['wand'][0]['length'] . ', with a ' . $json[$i]['wand'][0]['core'] . " core.";
	}

?>