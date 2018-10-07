<?php
  session_start();
  $servername = "localhost";
  $username = "shreyanshkuls";
  $password = "";
  $newTable = $_SESSION['newTable'];
  $newDatabase = $_SESSION['newDatabase'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $conn = mysqli_connect($servername, $username, $password);

  if (mysqli_connect_error())
  {
      die("Database error: " . mysqli_connect_error());
  }

  $sql = "USE ".$newDatabase;
  if (!mysqli_query($conn, $sql))
  {
      echo "Database Error: " . mysqli_error($conn);
  }

  $sql = "INSERT INTO ".$newTable." (name, email, contact, address)
  VALUES
  (\"".$name."\",
  \"".$email."\",
  ".$contact.", \"".$address."\")";

  if (!mysqli_query($conn, $sql))
  {
      echo "Database Error: " . mysqli_error($conn);

  }

  mysqli_close($conn);
  header("Location: http://localhost/dataForm.html");
?>
