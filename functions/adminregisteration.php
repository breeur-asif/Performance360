<?php

session_start();
// print_r($_POST);
// die;	
include "dbconfig.php";

$fname = $_POST["fname"];
$designation = $_POST["designation"];
$username = $_POST["email"];

$mobile = $_POST["mobile"];
// $gender = $_POST["gender"];
// $datepicker = $_POST["datepicker"];


$password = md5($_POST["password"]);




// $sql = "INSERT INTO `users`( `fname`, `lname`, `username`, `password`, `dateofbirth`, `mobile`, `gender`, `status`) VALUES ('$fname','$lname','$username', '$password','$datepicker','$mobile','$gender','1')";

$sql = "INSERT INTO `admin`( `name`, `email`, `password`, `designation`, `phone`) VALUES ('$fname','$username','$password','$designation','$mobile')";



if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "0";
}

?>