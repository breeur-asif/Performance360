<?php

session_start();
include "dbconfig.php";

$user_id = $_SESSION['id'];



$ExerciseGro = $_POST['ExerciseGroup'];
$ExerciseGroup = implode(' || ' , $ExerciseGro);


$ExerciseN = $_POST['ExerciseName'];
$ExerciseName = implode(' || ' , $ExerciseN);


$Set = $_POST['Sets'];
$Sets = implode(' || ' , $Set);


$Rep = $_POST['Reps'];
$Reps = implode(' || ' , $Rep);


$Intensi = $_POST['Intensity'];
$Intensity = implode(' || ' , $Intensi);

$Recov = $_POST['Recovery'];
$Recovery = implode(' || ' , $Recov);





$sql = " INSERT INTO `excersice_prescription`( `user_id`, `training_phase`,`check_id`, `number_of_session`,`week_day`, `session_title`, `session_color`, `exercise_group`, `exercise_name`, `sets_1`, `rep_1`, `intensity`, `recovery`, `cr_date`) VALUES ('$user_id','".$_POST['trainingphase']."','".$_POST['check']."','".$_POST['sesion']."','".$_POST['day']."','".$_POST['Title']."','".$_POST['Colour']."','".$ExerciseGroup."','".$ExerciseName."','".$Sets."','".$Reps."','".$Intensity."','".$Recovery."',now())";


if (mysqli_query($conn, $sql)) {
	echo $conn -> insert_id;
} else {
    echo "0";
}


?>