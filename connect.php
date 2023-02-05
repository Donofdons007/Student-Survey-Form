<?php

$servername = "localhost";
$username = "root";
$password = "";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$currentRole = $_POST['role'];

	// Database connection
	$conn = new mysqli($servername, $username, $password);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into form(Name, email, age, role) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $age, $role);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>