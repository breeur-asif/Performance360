<?php

session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];

$sql = "INSERT INTO `body_method_1`( `user_id`, `body_comp`, `afcselect`, `TotalEnergyExpanditure`, `TotalEnergyExpanditureMean`, `MEnergyTotal`, `ratiovalueselected`, `CarbsRequirement`, `ProteinRequirement`, `FatsRequirement`, `MinFluidRequiremen`, `MaxFluidRequirement`, `HeightWeightRatio`, `Endomorphy`, `Mesomorphy`, `Ectomorphy`,  `cr_date`) VALUES ('$user_id','".$_POST['lastinsertid']."','".$_POST['afcselect']."','".$_POST['TotalEnergyExpanditure']."','".$_POST['TotalEnergyExpanditureMean']."','".$_POST['MEnergyTotal']."','".$_POST['ratiovalueselected']."','".$_POST['CarbsRequirement']."','".$_POST['ProteinRequirement']."','".$_POST['FatsRequirement']."','".$_POST['MinFluidRequiremen']."','".$_POST['MaxFluidRequirement']."','".$_POST['HeightWeightRatio']."','".$_POST['Endomorphy']."','".$_POST['Mesomorphy']."','".$_POST['Ectomorphy']."',now()) ";


if (mysqli_query($conn, $sql)) {
	echo "1";
} else {
    echo "0";
}



?>