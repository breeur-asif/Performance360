<?php

session_start();

include "dbconfig.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["email"];
$password = md5($_POST["password"]);

$sql = "INSERT INTO users (fname, lname, username, password) VALUES ('$fname', '$lname', '$username', '$password')";
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "0";
}

?>