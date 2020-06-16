<?php
error_reporting(0);
session_start();
include "dbconfig.php";
$user_id = $_SESSION['id'];

 $sth = "SELECT * FROM training_dairy  WHERE MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE()) and user_id = '".$user_id."'   ORDER by id ";


$resultsports = mysqli_query($conn, $sth);

$rows = array();
while($r = mysqli_fetch_assoc($resultsports)) {
    $rows[] = $r;

}
print json_encode($rows);

// $rows = array();  

//   $sqlsports = "SELECT *
// FROM training_dairy
// WHERE MONTH(timestamp) = MONTH(CURRENT_DATE())
// AND YEAR(timestamp) = YEAR(CURRENT_DATE()) and user_id = '".$user_id."'   ORDER by id";

// // echo   $sqlsports;
// $resultsports = mysqli_query($conn, $sqlsports);

// while($injury = mysqli_fetch_array($resultsports)){
// $rows[]  = $injury;

// 	 $rowid =  $injury['id'];
// 	 $user =  $injury['user'];
// 	 $user_id =  $injury['user_id'];
// 	 $ahr =  $injury['ahr'];
// 	 $losn =  $injury['losn'];
// 	 $qosn =  $injury['qosn'];
// 	 $tst =  $injury['tst'];
// 	 $tet =  $injury['tet'];
// 	 $s1at =  $injury['s1at'];
// 	 $s1tv =  $injury['s1tv'];
// 	 $s1ts =  $injury['s1ts'];
// 	 $s1tw =  $injury['s1tw'];
// 	 $s1ms =  $injury['s1ms'];
// 	 $s1cw =  $injury['s1cw'];
// 	 $s1rpe =  $injury['s1rpe'];
// 	 $s1hrbw =  $injury['s1hrbw'];
// 	 $s1hrac =  $injury['s1hrac'];
// 	 $s1on =  $injury['s1on'];
// 	 $a_b =  $injury['a_b'];
// 	 $a_l =  $injury['a_l'];
// 	 $losd =  $injury['losd'];
// 	 $qosd =  $injury['qosd'];
// 	 $s1tst =  $injury['s1tst'];
// 	 $s1tet =  $injury['s1tet'];
// 	 $s2at =  $injury['s2at'];
// 	 $s2tf =  $injury['s2tf'];
// 	 $s2tv =  $injury['s2tv'];
// 	 $s2ts =  $injury['s2ts'];
// 	 $s2tw =  $injury['s2tw'];
// 	 $s2ms =  $injury['s2ms'];
// 	 $s2cw =  $injury['s2cw'];
// 	 $s2rpe =  $injury['s2rpe'];
// 	 $s2hrbw =  $injury['s2hrbw'];
// 	 $s2hrac =  $injury['s2hrac'];
// 	 $s2on =  $injury['s2on'];
// 	 $s2on[] =  $injury['s1tf'];
// 	 $cr_date =  $injury['cr_date'];
	
  
// }



// $return_arr[] = array("rowid" => $rowid,
//                     "user" => $user,
//                     "user_id" => $user_id,
//                     "ahr" => $ahr,
//                     "qosn" => $qosn,
//                     "tst" => $tst,
//                     "tet" => $tet,
//                     "s1at" => $s1at,
//                     "s1tv" => $s1tv,
//                     "s1ts" => $s1ts,
//                     "s1tw" => $s1tw,
//                     "s1ms" => $s1ms,
//                     "s1cw" => $s1cw,
//                     "s1rpe" => $s1rpe,
//                     "s1hrbw" => $s1hrbw,
//                     "s1hrac" => $s1hrac,
//                     "s1on" => $s1on,
//                     "a_b" => $a_b,
//                     "a_l" => $a_l,
//                     "losd" => $losd,
//                     "qosd" => $qosd,
//                     "s1tst" => $s1tst,
//                     "s1tet" => $s1tet,
//                     "s2at" => $s2at,
//                     "s2tf" => $s2tf,
//                     "s2tv" => $s2tv,
//                     "s2ts" => $s2ts,
//                     "s2tw" => $s2tw,
//                     "s2ms" => $s2ms,
//                     "s2cw" => $s2cw,
//                     "s2rpe" => $s2rpe,
//                     "s2hrbw" => $s2hrbw,
//                     "s2hrac" => $s2hrac,
//                     "s2on" => $s2on,
//                     "s2on" => $s2cw,
//                     "cr_date" => $cr_date,
//                   );

// mysqli_close($conn);

// echo json_encode($rows);


?>