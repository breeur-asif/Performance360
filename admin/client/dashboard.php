<?php

error_reporting(0);
session_start();



$user_id = $_SESSION['id'];
include "config.php";
if($_SESSION["id"] == ""){
header("Location: login.php");
}
else{
$name = $_SESSION["name"];

  $sql1 ="SELECT * FROM `met` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

// if (mysqli_num_rows($result) > 0) {


// }else{

//     header("Location: questionform.php");
// }

}

if($_GET['u_idl']){
  
  $sql = "SELECT u.*,p.* FROM users u  left JOIN profile_details p ON p.user_id = u.id  where u.id = '".$_GET['u_idl']."' ";
   
 }else{
 
   $sql = "SELECT u.*,p.* FROM users u  left JOIN profile_details p ON p.user_id = u.id  where u.id = '".$_SESSION['id']."' ";
 
 }
 
 
 
 // $sql = "SELECT * FROM users where id = '".$_SESSION['id']."' ";
 $result = mysqli_query($conn, $sql);
 
 
 if (mysqli_num_rows($result) > 0) { 
 
   // $abc = mysqli_fetch_row($result); 
   // print_r($abc);
 
 while($row = mysqli_fetch_assoc($result)) { 
 
 
 
 $u_id = $row['id'];
 $fname = $row['fname'];
 $lname = $row['lname'];
 $username = $row['username'];
 $mobile = $row['mobile'];
 $dateofbirth = $row['dateofbirth'];
 $gender = $row['gender'];
 $sport = $row['sport'];
 $mobile = $row['mobile'];
 $image = $row['image'];
 $weight = $row['weight'];
 $height = $row['height'];
 
 
 
  $school = $row['school'];
 $country = $row['country'];
 $bloodgroup = $row['bloodgroup'];
 $coach_name = $row['coach_name'];
 $coach_phone = $row['coach_phone'];
 $occupation = $row['occupation'];
 $fathername = $row['fathername'];
 $faterphone = $row['faterphone'];
 $fatheremail = $row['fatheremail'];
 $fatheroccupation = $row['fatheroccupation'];
 $parent_working = $row['parent_working'];
 
 
 $today = date("Y/m/d");
 
 
 
  $abs  = explode('/', $dateofbirth);
 
 
   $qqq = $abs[2].'/'.$abs[1].'/'.$abs[0];
 
  $today;
 
 
   $date1 = new DateTime($qqq);
 
   $date2 = new DateTime($today);
 
 $interval = $date1->diff($date2);
 
 $age = $interval->format('%Y years, %m months, %d days');
 // echo $interval->days ;
 
  //$age = round($interval->days/365,2);
 
 // die;
 
 }
 }
 
   $user_id = $u_id;
 
 $name = $fname.' '.$lname;
 
 
 if(isset($_POST["updatelogo"])){
    
 
 
  $user_id = $_POST['user_id'];
 
 
     unlink($image);
     $target_dir = "img/customerimg/";
     $imageFileType = strtolower(pathinfo(basename($_FILES["logo"]["name"]),PATHINFO_EXTENSION));
     $target_file = $target_dir . $_SESSION["id"] . time() . "." . $imageFileType;
     move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
 
     // $message = updatelogo($_SESSION["id"], $target_file);
     $sql = "UPDATE  users SET image = '$target_file' WHERE id = '$user_id'";
 
        $result = mysqli_query($conn, $sql);
 
 
 
            $message = "Logo Updated";
     
     echo "<script>alert('" . $message . "')
 
     </script>";
    
     header("location: questionform.php");
 }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
 
  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script> -->
<!--   <style>../../
  .loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('img/pageLoader.gif') 50% 50% no-repeat rgb(249,249,249);
      opacity: .8;
  }
  </style> -->
</head>

<body id="page-top">
<div class="loader"></div>

  <!-- Page Wrapper -->
  <div id="wrapper">
 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admindashboard.php">
        <div class="sidebar-brand-text mx-3"><i class="fas fa-arrow-left"></i> Back to  Admin Panel </div>
      </a>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
         
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
              </a>
             
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <form id='profilesport'>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="formula.php">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Body Composition Assessment
                        </div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <form class="form-horizontal" action="questionform.php" method="post" enctype="multipart/form-data">
    <center style="padding-top: 15px;">   <img src="../../<?php echo $image; ?>" style="padding-left: 22px;max-width: 300px; max-height: 100px;" class="img-fluid" /> </center>
                <!-- Text input-->


              

                <hr>
   
                </fieldset>
                </form>
                <div class="form-group row">

<div class="col-md-5">
  <label for="first_name"><h6>Name: </h6></label></div>
  <div class="col-md-5">
 <?php echo $name ?> 
</div>
</div><!--Name-->  



    </div>

         
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Posture Assessment
                        </div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
<div class="row">
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="#">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Performance Evaluation Test
                        </div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">
                                                         <div class="col-md-5 " for="radios">Gender: </div>
                                                      <div class="col-md-5 ">

                                       <?php echo $gender ?>

                                                        

                                                      </div>
                                                   </div><!--Gender-->
                                                   <div class="form-group row">

                                                      <div class="col-md-5">
                                                        <label for="dob"><h6>Date Of Birth:</h6></label></div>
                                                        <div class="col-md-5">
                                                       <?php echo $dateofbirth ?></div>
                                                      </div>

</div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Musculo-Skeletal Assessment
                        </div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
         
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">  <a href="#">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" >Diet Prescription</div>
                      </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-heartbeat fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="row">
            <div class="col-md-5">
                                                         <label for="dob"><h6>Current Age: </h6></label></div>
                                                             <div class="col-md-5">
                                                       <?php echo $age ?> 
                                                        </div>
            </div>
            <br>
            <div class="form-group row">

<div class="col-md-5">
  <label for="phone"><h6>Phone Number:  </h6></label></div>
  <div class="col-md-5">
  <?php echo $mobile ?> 
  </div>
</div>
         
</div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="exerciseprescription.php">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Exercise Prescription </div>
                 </a>
                    </div>
                    <div class="col-auto">
                       
                   <i class="fas fa-dumbbell fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
           

            <!-- Pending Requests Card Example -->
         
          </div>
          <div class="row">
          <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="Training_Dairy.php">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Training  Diary</div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">
                                                        <div class="col-md-5">
                                                                      <label for="email"><h6>Email Id: </h6></label></div>
                                                                      <div class="col-md-5">
                                                                      <?php echo $username ?>
                                                        </div>
                                                   </div>   <div class="form-group row">

                                                      <div class="col-md-5">
                                                        <label for="phone"><h6> Sports: </h6></label></div>
                                                        <div class="col-md-5">
                                                        <?php echo $sport ?>
                                                        </div>
                                                         
                                                   </div>

</div>

            <!-- Earnings (Monthly) Card Example -->
         
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">  <a href="competition.php">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Competition Calendar</div>
                      </a>
                    </div>
                    <div class="col-auto">
                   <i class="fas fa-trophy fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
           

            <!-- Pending Requests Card Example -->
         
          </div>
          <div class="row">
          <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="medicalreport.php">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Medical  Report</div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">

                                                      <div class="col-md-5">
                                                        <label for="phone"><h6> Highest Level Achieved: </h6></label></div>
                                                        <div class="col-md-5">
                                                        <?php echo $country; ?>
                                                        </div>
                                                         
                                                   </div>
                                                   <div class="form-group row">

                                                      <div class="col-md-5">
                                                        <label for="phone"><h6> Blood Group: </h6></label></div>
                                                        <div class="col-md-5">
                                                        <?php echo $bloodgroup; ?>
                                                        </div>
                                                         
                                                   </div>
          
                                                 
                                               

</div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="goal.php">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Goal Planning</div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-bullseye-arrow fa-2x text-gray-300"></i> -->
                      <!-- <i class="fas fa-bullseye-arrow  fa-2x text-gray-300"></i> -->
                       <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
         
           

            <!-- Earnings (Monthly) Card Example -->
           
            <!-- Pending Requests Card Example -->
         
          </div>
          <div class="row">
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="#">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Questionnaire
                        </div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">

<div class="col-md-5">
    <label for="Occuption"><h6>Occupation:</h6></label>
  </div>
   <div class="col-md-5">
 <?php echo $occupation; ?>
  </div>
</div>
 <div class="form-group row">
<div class="col-md-5">
              <label ><h6>Coaches Name:</h6></label></div>
              <div class="col-md-5">
<?php echo $coach_name; ?>
</div>
</div>


</div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MET and Consent Form
                        </div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
          <div class="row">
          <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">   <a href="clientinjuery.php">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Injury Diary</div>
                      </a>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">

<div class="col-md-5">
  <label ><h6>Parents Name:</h6></label></div>
  <div class="col-md-5">
<?php echo $fathername; ?>
    </div>
  </div>
   <div class="form-group row">
    <div class="col-md-5">
        <label ><h6>Contact Number:</h6></label></div>
         <div class="col-md-5">
<?php echo $faterphone; ?>
    </div>
</div>
</div>

          <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="#">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Graph Center </div>
                 </a>
                    </div>
                    <div class="col-auto">
                     <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
           

            <!-- Earnings (Monthly) Card Example -->
         
            <!-- Pending Requests Card Example -->
         
          </div>
          <div class="row">
          <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PAYMENT HISTORY</div>
                   </a>
                    </div>
                    <div class="col-auto">
 
 
 
                    <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>                    

                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">
                                                  <div class="col-md-5">
                                                     <label for="email"><h6>Email Id: </h6></label></div>
                                                       <div class="col-md-5">
                                               <?php echo $fatheremail; ?>
                                                  </div>
                                                </div>
                                                  <div class="form-group row">
                                                  <div class="col-md-5">
                                                <label for="phone"><h6>Occupation: </h6></label></div>
                                                  <div class="col-md-5">
<?php echo $fatheroccupation; ?>

                                                </div>
                          </div>

</div>

            <!-- Earnings (Monthly) Card Example -->
         
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">  <a href="center_reprt.php">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Report Center</div>
                      </a>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
<div class="row">
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="booking.php">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Appointment Schedule
                        </div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6  col-md-5 sx-12" style="padding: 10px 10px;">
            <div class="form-group row">
                             <div class="col-md-5">Past Sports Experience:</div>
                            
                           </div>
                           <br>
                           <div class="form-group row">
                             <div class="col-md-5">Current Supplement List:</div>
                            
                           </div>
</div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3  col-md-3 sx-12" style="padding: 10px 10px;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" style="background-color:#e9e7e7">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Message / Chat
                        </div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>

          <!-- Content Row -->
           




   

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ultimate Performance 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>