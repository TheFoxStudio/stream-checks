<?php

$servername = "your database server address";
$username 	= "your username";
$password 	= "your database password";
$dbname 	= "your database name";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>