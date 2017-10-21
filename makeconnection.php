<?php
//THIS IS THE PORTION THAT LOADS THE DB

$servername = "localhost";
$username = "todb";
$password = "prodsupp5";
$dbname = "Checklist";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

?>
