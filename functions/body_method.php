<?php

session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];

$sql = " INSERT INTO `body_method`( `user_id`, `body_comp`, `bodymassindex`, `waisttohipratio`, `sumofskinfolds`, `methodselected`, `valueofMethod`, `FatWeight`, `LeanBodyWeight`, `MuscleWeight`, `ArmSegmentalMuscleWeight`, `ForearmSegmentalMuscleWeight`, `ThighSegmentalMuscleWeight`, `CalfSegmentalMuscleWeight`, `UpperExtrimitesMuscleWeight`, `LowerExtrimitiesMuscleWeight`, `cr_date`) VALUES ('$user_id','".$_POST['lastinsertid']."','".$_POST['BodyMassIndex']."','".$_POST['WaisttoHipratio']."','".$_POST['Sumofskinfolds']."','".$_POST['methodselected']."','".$_POST['valueofMethod']."','".$_POST['FatWeight']."','".$_POST['LeanBodyWeight']."','".$_POST['MuscleWeight']."','".$_POST['ArmSegmentalMuscleWeight']."','".$_POST['ForearmSegmentalMuscleWeight']."','".$_POST['ThighSegmentalMuscleWeight']."','".$_POST['CalfSegmentalMuscleWeight']."','".$_POST['UpperExtrimitesMuscleWeight']."','".$_POST['LowerExtrimitiesMuscleWeight']."',now())";


if (mysqli_query($conn, $sql)) {
	echo "1";
} else {
    echo "0";
}



?>