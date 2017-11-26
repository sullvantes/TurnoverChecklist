<?php
//THIS IS THE PORTION THAT LOADS THE DB
$servername = "localhost";
$username = "todb";
$password = "0r1gam1Melt5";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
