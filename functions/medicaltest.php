<?php
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];

$sql = "INSERT INTO `medical_test_data`( `user_id`, `test_name`, `description`, `protocol`, `unit`, `normalvalue`, `male`, `female`, `children`, `highvaluemean`, `lowvaluemean`, `cr_date`) VALUES ('$user_id','".$_POST['name']."','".$_POST['Description']."','".$_POST['Protocol']."','".$_POST['Unit']."','".$_POST['normalvalue']."','".$_POST['Male']."','".$_POST['Female']."','".$_POST['children']."','".$_POST['highvaluemean']."','".$_POST['lowvaluemean']."',now())";


if (mysqli_query($conn, $sql)) {
	echo $conn -> insert_id;
} else {
    echo "0";
}

?>