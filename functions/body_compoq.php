<?php 
error_reporting(0);
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


$diabetes1= array($_POST['diabetes'], $_POST['diabetes1']);
$diabetes12 = array($diabetes1);
$diabetes = implode('--',$diabetes12[0]);




$sql1 ="SELECT * FROM `questio_bodycompo` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {

$sql = "UPDATE `questio_bodycompo` SET `happy`='".$_POST['happy']."',`appeatance`='".$_POST['appearance']."',`opinion`='".$_POST['opinion_appearance']."',`discriminated`='".$_POST['discriminated']."',`height`='".$_POST['happy_height']."',`fat`='".$_POST['body_fat']."',`gain`='".$_POST['gain']."',`diet`='".$_POST['diet']."',`diabetes`='$diabetes',`habit`='".$_POST['loose']."',`loose`='".$_POST['physical']."',`comfortable`='".$_POST['comfortable']."',`happiness`='".$_POST['physical']."',`training`='".$_POST['training']."',`cr_date`=now() WHERE user_id = $user_id ";


}else{


$sql = "INSERT INTO `questio_bodycompo`(`user_id`, `happy`, `appeatance`, `opinion`, `discriminated`, `height`, `fat`, `gain`, `diet`, `diabetes`, `habit`, `loose`, `comfortable`, `happiness`, `training`,  `cr_date`) VALUES ('$user_id','".$_POST['happy']."','".$_POST['appearance']."','".$_POST['opinion_appearance']."','".$_POST['discriminated']."','".$_POST['happy_height']."','".$_POST['body_fat']."','".$_POST['gain']."','".$_POST['diet']."','$diabetes','".$_POST['loose']."','".$_POST['comfortable']."','".$_POST['physical']."','".$_POST['competitions']."','".$_POST['training']."',now())";

}

if (mysqli_query($conn, $sql)) {
	// echo $conn -> insert_id;
	echo "1";
} else {
    echo "1";
}

?>