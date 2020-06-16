<?php 
error_reporting(0);
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


$abc  = array($_POST['chkl']);
$str = implode(",",$abc[0]);


$sql1 ="SELECT * FROM `profile_details` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result) > 0) {


 $sql =  "UPDATE `profile_details` SET `weight` = '".$_POST['weight']."',`height` = '".$_POST['height']."', `sport`='".$_POST['selectbasic']."',`checkbox_sport`='$str',`country`='".$_POST['Highest_country']."',`bloodgroup`='".$_POST['Blood_group']."',`coach_name`='".$_POST['coach_name']."',`coach_phone`='".$_POST['coach_phone']."',`occupation`='".$_POST['Occuption']."',`fathername`='".$_POST['father_name']."',`faterphone`='".$_POST['father_phone']."',`fatheremail`='".$_POST['father_email']."',`fatheroccupation`='".$_POST['father_occupation']."',`parent_working`='".$_POST['parent_working']."',`cr_date`=now() WHERE `user_id`= $user_id";

}else{

$sql =  "INSERT INTO `profile_details`( `user_id`,`weight`,`height`, `sport`, `checkbox_sport`, `country`, `bloodgroup`, `coach_name`, `coach_phone`, `occupation`, `fathername`, `faterphone`, `fatheremail`, `fatheroccupation`, `parent_working`, `cr_date`) VALUES ('$user_id','".$_POST['weight']."','".$_POST['height']."','".$_POST['selectbasic']."','$str','".$_POST['Highest_country']."','".$_POST['Blood_group']."','".$_POST['coach_name']."','".$_POST['coach_phone']."','".$_POST['Occuption']."','".$_POST['father_name']."','".$_POST['father_phone']."','".$_POST['father_email']."','".$_POST['father_occupation']."','".$_POST['parent_working']."',now())";
}


if (mysqli_query($conn, $sql)) {
	// echo $conn -> insert_id ;
	echo '1';

} else {
    echo "1";
}

?>