<?php

session_start();

include "dbconfig.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
	
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["fname"] . " " . $row["lname"];
        echo $row["id"];
    }
} else {
    echo "0";
}

?>