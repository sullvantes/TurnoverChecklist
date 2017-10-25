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
echo "Connected successfully";
$AcqClients = $conn->query("SELECT * FROM Data_Parms");
echo $AcqClients
//if ($AcqClients->num_rows > 0) {
//    // output data of each row
//    while($data_parms_row_tester = $result1->fetch_assoc()) {
//        $overnight = $data_parms_row_tester;
//    	}
//} else {
//    echo "0 results<br><br>";
?>
