<?php
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


  $testname = $_POST["testname"];
 $testdate = $_POST["testdate"];





 $sql = "INSERT INTO `scheduletest`( `user_id`, `date`, `title`, `cr_date`) VALUES ( '$user_id','$testdate','$testname',now())"; 



if (mysqli_query($conn, $sql)) {
    echo '1';
} else {
    echo "0";
}
?>