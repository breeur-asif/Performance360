<?php
error_reporting(0);

session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];

$Disabil = array($_POST['Disability'], $_POST['Disability1']);
$Disability_Hab = array($Disabil);
$Disability = implode('--',$Disability_Hab[0]);

$PSurgeries = array($_POST['Past_Surgeries'], $_POST['Past_Surgeries1']);
$Past_Surg = array($PSurgeries);
$Past_Surgeries = implode('--',$Past_Surg[0]);

$chestpain = array($_POST['chest_pain'], $_POST['chest_pain1']);
$chest_p = array($chestpain);
$chest_pain = implode('--',$chest_p[0]);

$breath = array($_POST['breathlessness'], $_POST['breathlessness1']);
$breath_less = array($breath);
$breath_lessness = implode('--',$breath_less[0]);



$Seizu = array($_POST['Seizure'], $_POST['Seizure1']);
$Seizu_Hab = array($Seizu);
$Seizure = implode('--',$Seizu_Hab[0]);

$Fract = array($_POST['Fracture'], $_POST['Fracture1']);
$Fract_Hab = array($Fract);
$Fracture = implode('--',$Fract_Hab[0]);

$Psychologi = array($_POST['Psychological'], $_POST['Psychological1']);
$Psychologi_Hab = array($Psychologi);
$Psychological = implode('--',$Psychologi_Hab[0]);

$restrict = array($_POST['restriction'], $_POST['restriction1']);
$restrict_Hab = array($restrict);
$restriction = implode('--',$restrict_Hab[0]);

$hormo = array($_POST['hormonal'], $_POST['hormonal1']);
$Fhormonal_Hab = array($hormo);
$hormonal = implode('--',$Fhormonal_Hab[0]);

$member_d = array($_POST['member_died'], $_POST['member_died1']);
$member_de = array($member_d);
$member_died = implode('--',$member_de[0]);



$family_his = array($_POST['family_history'], $_POST['family_history']);
$family_histi = array($family_his);
$family_history = implode('--',$family_histi[0]);


$fainting_epis= array($_POST['fainting_episode'], $_POST['fainting_episode1']);
$fainting_episodeq = array($fainting_epis);
$fainting_episode = implode('--',$fainting_episodeq[0]);



$psychological_di= array($_POST['psychological_disorder'], $_POST['psychological_disorder1']);
$psychological_diso = array($psychological_di);
$psychological_disorder = implode('--',$psychological_diso[0]);


$diabetes_histo= array($_POST['diabetes_history'], $_POST['diabetes_history1']);
$diabetes_histo_diso = array($diabetes_histo);
$diabetes_history = implode('--',$diabetes_histo_diso[0]);

$sql1 ="SELECT * FROM `medicalhistory` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {


$sql = "UPDATE `medicalhistory` SET `disablity`='$Disability',`surgeries`='$Past_Surgeries',`chestpain`='$chest_pain',`breathless`='$breath_lessness',`seizure`='$Seizure',`fracture`='$Fracture',`psychological`='$Psychological',`restriction`='$restriction',`hormonal`='$hormonal',`family`='$member_died',`heart_problem`='$family_history',`fainting`='$fainting_episode',`psyhological`='$psychological_disorder',`diabetes`='$diabetes_history',`other`='',`cr_date`=now() WHERE user_id = $user_id";


}else{


 $sql = "INSERT INTO `medicalhistory`( `user_id`,`disablity`, `surgeries`, `chestpain`, `breathless`, `seizure`, `fracture`, `psychological`, `restriction`, `hormonal`, `family`, `heart_problem`, `fainting`, `psyhological`, `diabetes`, `other`, `cr_date`) VALUES ('$user_id','$Disability','$Past_Surgeries','$chest_pain','$breath_lessness','$Seizure','$Fracture','$Psychological','$restriction','$hormonal','$member_died','$family_history','$fainting_episode','$psychological_disorder','$diabetes_history','',now())";
}


if (mysqli_query($conn, $sql)) {
	// echo $conn -> insert_id;
	echo "1";
} else {
    echo "1";
}

?>