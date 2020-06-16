<?php
error_reporting(0);
session_start();
//print_r($_POST);
//die;
include "dbconfig.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["email"];

$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$datepicker = $_POST["datepicker"];
$medications = $_POST["medications"];

$password = md5($_POST["password"]);

$sql1 = "SELECT * FROM users WHERE username = '$username'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result1)) {
// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
$userstatus = $row["id"];
}
} else {
$userstatus = "0";
}

if($userstatus == 0 ){

$sql = "INSERT INTO `users`( `fname`, `lname`, `username`, `password`, `dateofbirth`, `mobile`, `gender`,`sport`,`image`, `status`,`last_login`) VALUES ('$fname','$lname','$username', '$password','$datepicker','$mobile','$gender','$medications','','1',now())";

if (mysqli_query($conn, $sql)) {
echo "1";
} else {
echo "0";
}
}else{

echo "present";
}



?>
