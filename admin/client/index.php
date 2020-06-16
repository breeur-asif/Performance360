<?php

session_start();

include "config.php";
  $_SESSION["id"] = $_GET['adi'];

 $sql = "SELECT * FROM users WHERE id = '".$_GET['adi']."'";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["fname"] . " " . $row["lname"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["dateofbirth"] = $row["dateofbirth"];
        $_SESSION["sport"] = $row["sport"];
        $_SESSION["username"] = $row["username"];
        // echo $row["id"];
    }
} else {
    echo "0";
}


if($_SESSION["id"] == ""){
	header("Location: ../admindashboard.php");
}
else{
	
	header("Location: dashboard.php");
	
}

?>