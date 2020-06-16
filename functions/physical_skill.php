<?php 

error_reporting(0);

session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


// $diabetes1= array($_POST['diabetes'], $_POST['diabetes1']);
// $diabetes12 = array($diabetes1);
// $diabetes = implode('--',$diabetes12[0]);





$sql1 ="SELECT * FROM `physical_skill` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {

$sql = "UPDATE `physical_skill` SET `aerobic`='".$_POST['stamina']."',`muscular`='".$_POST['contractions']."',`muscle`='".$_POST['resistance']."',`explosive`='".$_POST['Explosive']."',`speed`='".$_POST['Quickness']."',`anaerobic`='".$_POST['fAnaerobic']."',`flexiblity`='".$_POST['Flexibility']."',`agility`='".$_POST['Agility']."',`balance`='".$_POST['Balance']."',`coordination`='".$_POST['Coordination']."',`reaction`='".$_POST['Reaction']."',`core`='".$_POST['muscles']."',`analytic`='".$_POST['Analytic']."',`motivation`='".$_POST['Motivation']."',`coping`='".$_POST['pressure']."',`Technique`='".$_POST['Technique']."' WHERE user_id =$user_id ";


}else{
$sql = "INSERT INTO `physical_skill`( `user_id`, `aerobic`, `muscular`, `muscle`, `explosive`, `speed`, `anaerobic`, `flexiblity`, `agility`, `balance`, `coordination`, `reaction`, `core`, `analytic`, `motivation`, `coping`,`Technique`) VALUES ('$user_id','".$_POST['stamina']."','".$_POST['contractions']."','".$_POST['resistance']."','".$_POST['Explosive']."','".$_POST['Quickness']."','".$_POST['fAnaerobic']."','".$_POST['Flexibility']."','".$_POST['Agility']."','".$_POST['Balance']."','".$_POST['Coordination']."','".$_POST['Reaction']."','".$_POST['muscles']."','".$_POST['Analytic']."','".$_POST['Motivation']."','".$_POST['pressure']."','".$_POST['Technique']."')";
}


if (mysqli_query($conn, $sql)) {
	// echo $conn -> insert_id;
	echo '1';
} else {
    echo "1";
}

?>