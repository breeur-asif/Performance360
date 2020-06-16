<?php 

include "dbconfig.php";
  	if(isset($_POST['data_id'])){

  $sqlsports = "select * from calender where calender_id = '".$_POST['data_id']."'";
$resultsports = mysqli_query($conn, $sqlsports);

while($sport = mysqli_fetch_assoc($resultsports)){



     $calender_id =  $sport['calender_id'];
     $user_id =  $sport['user_id'];
     $competation_name =  $sport['competation_name'];
    $date_from =  $sport['date_from'];
    $date_to =  $sport['date_to'];
    $event1 =  $sport['event1'];
    $performance1 =  $sport['performance1'];
    $result1 =  $sport['result1'];
    $post1 =  $sport['post1'];
    $postion1 =  $sport['postion1'];
    $strength =  $sport['strength'];
    $weakness =  $sport['weakness'];
    $opportunity =  $sport['opportunity'];
    $threads =  $sport['threads'];
}



$return_arr[] = array("calender_id" => $calender_id,
                    "user_id" => $user_id,
                    "competation_name" => $competation_name,
                    "date_from" => $date_from,
                    "date_to" => $date_to,
                    "event1" => $event1,
                    "performance1" => $performance1,
                    "result1" => $result1,
                    "post1" => $post1,
                    "postion1" => $postion1,
                    "strength" => $strength,
                    "weakness" => $weakness,
                    "opportunity" => $opportunity,
                    "threads" => $threads
                  );

mysqli_close($conn);

echo json_encode($return_arr);

}

?>