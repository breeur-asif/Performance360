<?php
session_start();
include "dbconfig.php";

$user_id = $_SESSION['id'];

if($_POST['Unit_grams']){
 $units =array($_POST['Unit_input'],$_POST['Unit_grams']); 
$meaure = $_POST['Unit_grams'];

}else {
$units =array($_POST['Unit_input'],$_POST['Unit_distance']);  
$meaure = $_POST['Unit_distance'];
}
 $unit = implode('/',$units );



$sql = "INSERT INTO `sports_event`( `user_id`, `sport_name`, `event`, `parameter`, `unit`, `input_unit`, `unit_measuring`, `cr_date`) VALUES ('$user_id','".$_POST['sport']."','".$_POST['event']."','".$_POST['Parameter']."','$unit', '".$_POST['Unit_input']."','$meaure' ,now())";


if (mysqli_query($conn, $sql)) {
	echo $conn -> insert_id;
} else {		
    echo "0";
}

?>