<?php 

include "dbconfig.php";



  	if(isset($_POST['data_id'])){

  $sqlsports = "select * from add_injury where id = '".$_POST['data_id']."'";
$resultsports = mysqli_query($conn, $sqlsports);

while($injury = mysqli_fetch_assoc($resultsports)){



     $rowid =  $injury['id'];
       $injury_date =  $injury['injury_date'];
     $time =  $injury['time'];
     $user_id =  $injury['user'];
     $injuryclass =  $injury['injuryclass'];
    $place_injury =  $injury['place_injury'];
    $elaborate =  $injury['elaborate'];
    $activty_phase =  $injury['activty_phase'];
    $phase_injury =  $injury['phase_injury'];
    $bodypart_injury =  $injury['bodypart_injury'];
    $bodypart =  $injury['bodypart'];
    $natural_of_injury =  $injury['natural_of_injury'];
    $natural =  $injury['natural'];
    $mechanism_injuly =  $injury['mechanism_injuly'];
    $mechanism =  $injury['mechanism'];
    $first_Aid_given =  $injury['first_Aid_given'];
    $first_Aid =  $injury['first_Aid'];
    $given =  $injury['given'];
    $fname =  $injury['fname'];
    $designation =  $injury['designation'];
    $mobile =  $injury['mobile'];
    $email =  $injury['email'];
    $by_who_dia =  $injury['by_who_dia'];
    $by_whom =  $injury['by_whom'];
    $dia_what =  $injury['dia_what'];
    $dia_specail =  $injury['dia_specail'];
    $treatement =  $injury['treatement'];
    $treatementsp =  $injury['treatementsp'];
    $medicalif =  $injury['medicalif'];
    $medicalne =  $injury['medicalne'];
    $Advice_given =  $injury['Advice_given'];
    $advice_injury =  $injury['advice_injury'];
    $adviceprec =  $injury['adviceprec'];
    $advicepre =  $injury['advicepre'];
    $ref =  $injury['ref'];
    $referral =  $injury['referral'];
    $cr_date =  $injury['cr_date'];
  
}



$return_arr[] = array("rowid" => $rowid,
                    "user_id" => $user_id,
                    "time" => $time,
                   "injury_date" => $injury_date,
                    "injuryclass" => $injuryclass,
                    "place_injury" => $place_injury,
                    "elaborate" => $elaborate,
                    "activty_phase" => $activty_phase,
                    "phase_injury" => $phase_injury,
                    "bodypart_injury" => $bodypart_injury,
                    "bodypart" => $bodypart,
                    "natural_of_injury" => $natural_of_injury,
                    "natural" => $natural,
                    "mechanism_injuly" => $mechanism_injuly,
                    "mechanism" => $mechanism,
                    "first_Aid_given" => $first_Aid_given,
                    "first_Aid" => $first_Aid,
                    "given" => $given,
                    "fname" => $fname,
                    "designation" => $designation,
                    "mobile" => $mobile,
                    "email" => $email,
                    "by_who_dia" => $by_who_dia,
                    "by_whom" => $by_whom,
                    "dia_what" => $dia_what,
                    "dia_specail" => $dia_specail,
                    "treatement" => $treatement,
                    "treatementsp" => $treatementsp,
                    "medicalif" => $medicalif,
                    "medicalne" => $medicalne,
                    "Advice_given" => $Advice_given,
                    "advice_injury" => $advice_injury,
                    "adviceprec" => $adviceprec,
                    "advicepre" => $advicepre,
                    "ref" => $ref,
                    "referral" => $referral,
                    "cr_date" => $cr_date
                  );

mysqli_close($conn);

echo json_encode($return_arr);

}

?>