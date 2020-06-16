<?php

session_start();

include "dbconfig.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);

  $sql = "SELECT * FROM admin WHERE email='$username' AND password='$password'";

 $result = mysqli_query($conn, $sql);
 


if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    

        $_SESSION["adminid"] = $row["id"];
        $_SESSION["adminname"] = $row["name"];
        // $_SESSION["admingender"] = $row["gender"];

        echo $row["id"];
      
    }
} else {

    echo "0";
}

?>  