<?php
error_reporting(0);


session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


$abc  = array($_POST['first_name']);
$list_of_all_medicine = implode("--",$abc[0]);

$abc1  = array($_POST['Times']);
$Times = implode("--",$abc1[0]);

$abc2  = array($_POST['Dosage']);
$Dosage = implode("--",$abc2[0]);

$Smoking = array($_POST['Smoking_Habit'], $_POST['Smoking_Habit1']);
$Smoking_Hab = array($Smoking);
$Smoking_Habit = implode('--',$Smoking_Hab[0]);

$drinking = array($_POST['Drinking_Habit'], $_POST['Drinking_Habit1']);
$drinking_Hab = array($drinking);
$drinking_Habit = implode('--',$drinking_Hab[0]);



$sql1 ="SELECT * FROM `nutrition_habit` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {

 $sql = "UPDATE `nutrition_habit` SET `nutrition_preferences`='".$_POST['nutrition1']."',`foodallergy/restriction`='".$_POST['Food_Alleragy']."',`reason_for_food_restriction`='".$_POST['food_Restriction']."',`list_of_medication`='".$_POST['Medications']."',`list_of_all_medicine`='$list_of_all_medicine',`dosage`='$Dosage',`times_inday`='$Times',`smoking_habit`='$Smoking_Habit',`drinking_habit`='$drinking_Habit',`cr_date`=now() WHERE user_id = $user_id ";
}else{


 $sql = "INSERT INTO `nutrition_habit`( `user_id`, `nutrition_preferences`, `foodallergy/restriction`, `reason_for_food_restriction`,`list_of_medication`, `list_of_all_medicine`, `dosage`, `times_inday`, `smoking_habit`, `drinking_habit`, `cr_date`) VALUES ('$user_id','".$_POST['nutrition1']."','".$_POST['Food_Alleragy']."','".$_POST['food_Restriction']."','".$_POST['Medications']."','$list_of_all_medicine','$Dosage','$Times','$Smoking_Habit','$drinking_Habit', now())";

}

if (mysqli_query($conn, $sql)) {
	// echo $conn -> insert_id;
	echo "1";
} else {	
    echo "1";
}

?>
