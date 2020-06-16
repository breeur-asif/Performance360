<?php
//$servername = "localhost";
//$username = "P360";
//$password = "MHYAHZn4MyDtTmpi";
//$dbname = "P360";

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "P360";



$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>