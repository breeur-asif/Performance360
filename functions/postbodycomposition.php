<?php 
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];


$sql = "INSERT INTO `bodycomposition`( `user_id`, `height`, `weight`, `systolicbp`, `diastolicbp`, `pulse`, `bicepsskinfold`, `triceps skinfold`, `subscapularskinfold`, `pectorialskinfold`, `midaxillaryskinfold`, `suprailiacskinfold`, `abdominalisskinfold`, `thighskinfold`, `calfskinfold`, `headcircumfarance`, `neckcircumfarance`, `armrelaxedcircumfarance`, `armflexedcircumfarance`, `forearmcircumfarance`, `wristcircumfarance`, `chestcircumfarance`, `waistcircumfarance`, `glutalcircumfarance`, `upthighcircumfarance`, `midthighcircumfarance`, `lowthighcircumfarance`, `calfcircumfarance`, `anklecircumfarance`, `acromioradialelength`, `redialestylionredialelength`, `midstyliondactylionlength`, `trochenterionlattibialelength`, `tibilalemsphyriontibialelength`, `biepicondylarhumerubreadth`, `biepicondylarfemurbreadth`, `cicumfarancemethod`, `cr_date`) VALUES
 ('$user_id','".$_POST['Height']."','".$_POST['Weight']."','".$_POST['SysBP']."','".$_POST['DiastBP']."','".$_POST['Pulse']."','".$_POST['BS']."','".$_POST['TS']."','".$_POST['SS']."','".$_POST['PS']."','".$_POST['MS']."','".$_POST['SSold']."','".$_POST['AS']."','".$_POST['TighhS']."','".$_POST['CalfS']."','".$_POST['HC']."','".$_POST['NC']."','".$_POST['ARC']."','".$_POST['AFC']."','".$_POST['FC']."','".$_POST['WC']."','".$_POST['CC']."','".$_POST['WaistC']."','".$_POST['GC']."','".$_POST['UtC']."','".$_POST['MtC']."','".$_POST['LtC']."','".$_POST['CalfC']."','".$_POST['AC']."','".$_POST['AL']."','".$_POST['RsrL']."','".$_POST['MDL']."','".$_POST['TLTL']."','".$_POST['tmstl']."','".$_POST['BHB']."','".$_POST['BFB']."','".$_POST['manual']."',now())";
 
if (mysqli_query($conn, $sql)) {
	echo $conn -> insert_id;
} else {
    echo "0";
}
?>