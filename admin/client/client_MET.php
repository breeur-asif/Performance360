<?php
error_reporting(0);
session_start();
include "config.php";

$user_id = $_SESSION['id'];





if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{

  $name = $_SESSION["name"];


  $sql2 = "SELECT weight  FROM `profile_details` where user_id = $user_id";

  $result = mysqli_query($conn, $sql2);

   while($row = mysqli_fetch_assoc($result)) { 

      $userweight =  $row['weight'];

}




}
if (isset($_POST['submit'])) {


  $MET1 = $_POST['MET1'];$MET2 = $_POST['MET2'];$MET3 = $_POST['MET3'];$MET4 = $_POST['MET4'];
  $MET5 = $_POST['MET5'];$MET6 = $_POST['MET6'];$MET7 = $_POST['MET2'];$MET8 = $_POST['MET8'];
  $MET9 = $_POST['MET9'];$MET10 = $_POST['MET10']; $MET12 = $_POST['MET12'];$MET11 = $_POST['MET1'];

  $t1 = $_POST['t1'];        $t2 = $_POST['t2'];      $t3 = $_POST['t3'];    $t4 = $_POST['t4'];
  $t5 = $_POST['t5'];     $t6 = $_POST['t6'];      $t7 = $_POST['t7'];        $t8 = $_POST['t8'];
  $t9 = $_POST['t9'];     $t10 = $_POST['t10'];    $t12 = $_POST['t12'];     $t11 = $_POST['t11'];
  $Total = $_POST['Total']; $to_remain = $_POST['to_remain'];            


 $energytotal  =  $_POST['energytotal'];



$sql1 ="SELECT * FROM `met` where user_id = $user_id ";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {


$sql = "UPDATE `met` SET `MET1`='$MET1',`t1`='$t1',`MET2`='$MET2',`t2`='$t2',`MET3`='$MET3,`t3`='$t3',`MET4`=,`t4`='$t4',`MET5`='$MET5,`t5`='$t5',`MET6`='$MET6',`t6`='$t6',`MET7`='$MET7',`t7`='$t7',`MET8`='$MET8',`t8`='$t8',`MET9`='$MET9',`t9`='$t9',`MET10`='$MET10',`t10`='$t10',`MET11`='$MET11',`t11`='$t11',`MET12`='$MET12',`t12`='$t12',`Total`='$Total',`to_remain`='$to_remain',`totalenergy`='$energytotal',`cr_date`=now() WHERE user_id=$user_id";


}else{
$sql = "INSERT INTO `met`(`user_id`,`MET1`, `t1`, `MET2`, `t2`, `MET3`, `t3`, `MET4`, `t4`, `MET5`, `t5`, `MET6`, `t6`, `MET7`, `t7`, `MET8`, `t8`, `MET9`, `t9`, `MET10`, `t10`, `MET11`, `t11`, `MET12`, `t12`, `Total`, `to_remain`,`totalenergy`, `cr_date`) VALUES ('$user_id','$MET1','$t1','$MET2','$t2','$MET3','$t3','$MET4','$t4','$MET5','$t5','$MET6','$t6','$MET7','$t7','$MET8','$t8','$MET9','$t9','$MET10','$t10','$MET11','$t11','$MET12','$t12','$Total','$to_remain','$energytotal',now())";

}

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    header("Location: dashboard.php");


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
  

 

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Assessment Questionnaire & MET  </title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admindashboard.php">
        <div class="sidebar-brand-text mx-3"><i class="fas fa-arrow-left"></i> Back to  Admin Panel </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php   include "header.php"; ?>

      <!-- Nav Item - Dashboard -->
       
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              <!--   <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <div class="dropdown-divider"></div>
                <!--<a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">-->
                <!--  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Logout-->
                <!--</a>-->
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
       <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assessment Questionnaire & MET </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">


            <!-- DataTales Example -->
            <div class="card shadow mb-12">
              <div class="card-body">

<div class=" " ><center><b> Please give your typical days breakup – the sum of duration of all the activities should not exceed 24 hours (1440 Minutes)</b></center></div>
<hr>

<div class=" " ><center><b>Remaining Minutes Left :<span id="timeupfor"> 1440  </span> </b></center></div>
<hr>

    <form action="client_MET.php" method="post" id="metform">
     <!--new page -->
     <div class="form-group row">
       <div class="col-md-1"></div>
       <div class="col-md-6">Activity </div>
        <div class="col-md-3">Duration (Min)</div>
     
       <div class="col-md-2"> Duration (Hours) </div>
        
     </div><!-- heading table-->
     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">1</div>
       <div class="col-md-6">
        <select name="MET1" class="time1" style="max-width: 80%;">
           <option value="">Select...</option>
            <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

        </select>
      </div>

       <div class="col-md-3">
       <input type="text" name="t1"  id="time1" value="0" onkeypress="return validInput(event);" maxlength="4">
     </div>
       <div class="col-md-2" id='time1ss'>0 </div>
       <div class="col-md-2" id='time1s' style='display: none'>0 </div>
       
  </div>
      <hr>
           <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">2</div>
       <div class="col-md-6">
        <select name="MET2" class="time2" style="max-width: 80%;" >
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t2" id="time2" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time2ss">0</div>
       <div class="col-md-2" id="time2s" style="display: none">0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">3</div>
       <div class="col-md-6">
        <select name="MET3" class="time3" style="max-width: 80%;">
           <option value="">Select...</option>
<option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t3" id="time3" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time3ss">0</div>
       <div class="col-md-2" id="time3s" style="display: none">0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">4</div>
       <div class="col-md-6">
        <select name="MET4" class="time4" style="max-width: 80%;">
           <option value="">Select...</option>
 <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t4" id="time4" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time4ss">0</div>
       <div class="col-md-2" id="time4s" style="display: none">0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">5</div>
       <div class="col-md-6">
        <select name="MET5" class="time5" style="max-width: 80%;">
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t5"  id="time5"value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time5ss">0</div>
       <div class="col-md-2" id="time5s" style="display: none">0</div>
       
     </div>
      <hr>


     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">6</div>
       <div class="col-md-6">
        <select name="MET6" class="time6" style="max-width: 80%;">
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t6"  id="time6" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time6ss">0</div>
       <div class="col-md-2" id="time6s" style="display: none">0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">7</div>
       <div class="col-md-6">
        <select name="MET7" class="time7" style="max-width: 80%;">
           <option value="">Select...</option>
 <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t7" id="time7"  value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time7ss">0</div>
       <div class="col-md-2" id="time7s" style='display: none'
       >0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">8</div>
       <div class="col-md-6">
        <select name="MET8" class="time8" style="max-width: 80%;">
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t8" id="time8" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time8ss">0</div>
       <div class="col-md-2" id="time8s" style='display: none'>0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">9</div>
       <div class="col-md-6">
        <select name="MET9" class="time9" style="max-width: 80%;">
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t9" id="time9" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time9ss">0</div>
       <div class="col-md-2" id="time9s" style='display: none'>0</div>
       
     </div>
      <hr>     <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">10</div>
       <div class="col-md-6">
        <select name="MET10" class="time10" style="max-width: 80%;">
           <option value="">Select...</option>
 <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t10" id="time10" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time10ss">0</div>
       <div class="col-md-2" id="time10s" style='display: none'>0</div>
       
     </div>
      <hr>
           <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">11</div>
       <div class="col-md-6">
        <select name="MET11" class="time11" style="max-width: 80%;">
           <option value="">Select...</option>
  <option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t11" id="time11" value="0" onkeypress="return validInput(event);"  maxlength="4">
</div>
       <div class="col-md-2" id="time11ss">0</div>
       <div class="col-md-2" id="time11s" style='display: none'>0</div>
       
     </div>
      <hr>
           <div class="form-group row">
       <div class="col-md-1 control-label" for="selectbasic">12</div>
       <div class="col-md-6">
        <select name="MET12" class="time12" style="max-width: 80%;">
           <option value="">Select...</option>
<option value="8">Aerobic Exercises</option>
            <option value="1.7">Arts and Crafts, General</option>
            <option value="12">Ballistic Training</option>
            <option value="8">Calisthenics (e.g. Push Ups, Sit Ups, Pull Ups, Jumping Jacks, Leg Lifts, Ab Roller)</option>
            <option value="1.5">Card Playing, Playing Board Games</option>
            <option value="8">Circuit Training, Including Some Aerobic Movement With Minimal Rest</option>
            <option value="7">Classical, Ballet or Modern</option>
            <option value="3">Cleaning House, General</option>
            <option value="12">Combat Sports (Like Judo, Boxing etc)</option>
            <option value="3">Cooking</option>
            <option value="8">Cycling, General</option>
            <option value="2.5">Driving</option>
            <option value="1.5">Eating</option>
            <option value="1.3">General Sexual Activity</option>
            <option value="6">Heavy Physical Work</option>
            <option value="2">Instruments</option>
            <option value="7">Jogging, General</option>
            <option value="4">Light Physical Work</option>
            <option value="1">Lying Quietly and Watching Television</option>
            <option value="2.5">Mild Stretching</option>
            <option value="1.5">Mobile Use / Listening Music etc. </option>
            <option value="5.5">Mowing Lawn, General</option>
            <option value="3.5">Pilates, Powerlates, Yogilates</option>
            <option value="12">Plyometrics</option>
            <option value="10">Power Lifting</option>
            <option value="10">Racquetball Sports Like Tennis, Badminton, TT etc)</option>
            <option value="7">Rowing, Stationary Ergometer, General</option>
            <option value="9">Running, Cross Country</option>
            <option value="10">Running, On A Track, Team Practice</option>
            <option value="15">Running, Stairs, Up</option>
            <option value="2">Selfcare, Dressing, Undressing</option>
            <option value="2">Showering, Toweling Off</option>
            <option value="1.5">Sitting Games Like Chess, Carrom etc</option>
            <option value="1">Sitting quietly and Watching Television</option>
            <option value="1.8">Sitting, Writing, Desk Work, Typing</option>
            <option value="5">Skating Type Activities</option>
            <option value="0.9">Sleeping</option>
            <option value="8">Speed Involved Sports Like Track and Field etc.</option>
            <option value="4.5">Speed Walking</option>
            <option value="9">Sports Played in Water (Swimming, Water Polo, Diving)</option>
            <option value="10">Stair Climbing</option>
            <option value="5">Standing Job ( Teaching etc )</option>
            <option value="5">Standing Sports Like (Archery, Shooting)</option>
            <option value="2">Standing, General</option>
            <option value="2.5">Stretching, Hatha Yoga</option>
            <option value="2">Studying</option>
            <option value="10">Team Sports with Quick Movements (Volleyball, Basketball, Football)</option>
            <option value="8">Very Heavy Physical Work</option>
            <option value="2">Very Light Physical Work / Sitting / Meetings</option>
            <option value="3.5">Walking for Pleasure</option>
            <option value="3.7">Walking, General</option>
            <option value="1">Watching TV</option>
            <option value="4">Water Aerobics, Water Calisthenics</option>
            <option value="10">Weight Lifting Sports like (Weight Lifting, Power Lifting etc)</option>
            <option value="8">Weight Training</option>
            <option value="2">Working / Studying (Computer / Desk)</option>
            <option value="5.5">Working Out, General Exercise</option>
            <option value="2.5">Yoga, General</option>

</select>
 

  </div>

       <div class="col-md-3">
       <input type="text" name="t12"  id="time12" value="0" onkeypress="return validInput(event);"  maxlength="4" >
</div>
       <div class="col-md-2" id="time12ss">0</div>
       <div class="col-md-2" id="time12s" style='display: none'>0</div>
       
     </div>
      <hr>

     

   




<!-- button -->



<div class="form-group row">
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary" name="submit" >Ok </button>
       </div>
  <label class="col-md-3 control-label" for="selectbasic">Balance:</label>
  <div class="col-md-3">  <input type="text" id="time" name="Total" value="">  </div>
  <!-- <label class="col-md-2 control-label" for="selectbasic" style="display: none"> <span id="energytotal"> </span></label> -->
  <input type="hidden" name="energytotal" id="energytotal">
  <label class="col-md-2 control-label" for="selectbasic"> <span id="total_hr"> </span></label>

</div>

<div class="form-group row">
  <div class="col-md-4">
     </div>
  <label class="col-md-3 control-label" for="selectbasic">Total: 24 Hours / 1440 Min</label>
  <div class="col-md-3">      <input type="text" id="sum" name="to_remain" value="">
 </div>
  <div class="col-md-2">       
 </div>

</div>


</form>







              </div>
            </div>




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
            <span>Copyright &copy; Breeur Solution 2020</span>
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
  <script>
  $(function(){


            $('#time1, #time2,#time3, #time4,#time5, #time6,#time7, #time8,#time9, #time10,#time11, #time12').keyup(function(){


     var abc  = $('#time').val();
    
 var abc1  = this.value;
      if(this.value < 0 ){

var abc1  = 0;

      }


    
   
     var checkdata = abc - abc1;

   if(checkdata <= 0){

    // alert('your time limit is exceed'); 

   }
 


        
               var time1 = parseFloat($('#time1').val()) || 0; var time2 = parseFloat($('#time2').val()) || 0; var time3 = parseFloat($('#time3').val()) || 0; var time4 = parseFloat($('#time4').val()) || 0;var time5 = parseFloat($('#time5').val()) || 0; var time6 = parseFloat($('#time6').val()) || 0;var time7 = parseFloat($('#time7').val()) || 0; var time8 = parseFloat($('#time8').val()) || 0;var time9 = parseFloat($('#time9').val()) || 0; var time10 = parseFloat($('#time10').val()) || 0;
               var time11 = parseFloat($('#time11').val()) || 0; var time12 = parseFloat($('#time12').val()) || 0;






              

 $('#time').val(1440 - (time1+ time2 + time3 + time4 + time5 + time6 + time7 + time8 + time9 + time10 + time11 + time12));



 $('#timeupfor').html($('#time').val());


var time_dur = this.id;




$('#' + time_dur+'ss').html((parseFloat(abc1)/60).toFixed(2));
// alert(res[1]);

var curr_weight =  '<?php echo $userweight ?>';
var  equivalent  = $("."+time_dur).val();


var energy  = '';



energy =  0.0175  * parseFloat(curr_weight) * parseFloat(equivalent) * parseFloat(abc1);




$('#' + time_dur+'s').html(energy.toFixed(2));
    
               var time = parseFloat($('#time').val()) || 0;
              

               var abc = 1440 - time ;

               $('#sum').val(abc);

              var tim1 =  parseFloat($('#time1s').html());
              var tim2 =  parseFloat($('#time2s').html());
              var tim3 =  parseFloat($('#time3s').html());
              var tim4 =  parseFloat($('#time4s').html());
              var tim5 =  parseFloat($('#time5s').html());
              var tim6 =  parseFloat($('#time6s').html());
              var tim7 =  parseFloat($('#time7s').html());
              var tim8 =  parseFloat($('#time8s').html());
              var tim9 =  parseFloat($('#time9s').html());
              var tim10 =  parseFloat($('#time10s').html());
              var tim11 =  parseFloat($('#time11s').html());
              var tim12 =  parseFloat($('#time12s').html());

              var tim1s =  parseFloat($('#time1ss').html());
              var tim2s =  parseFloat($('#time2ss').html());
              var tim3s =  parseFloat($('#time3ss').html());
              var tim4s =  parseFloat($('#time4ss').html());
              var tim5s =  parseFloat($('#time5ss').html());
              var tim6s =  parseFloat($('#time6ss').html());
              var tim7s =  parseFloat($('#time7ss').html());
              var tim8s =  parseFloat($('#time8ss').html());
              var tim9s=  parseFloat($('#time9ss').html());
              var tim10s =  parseFloat($('#time10ss').html());
              var tim11s =  parseFloat($('#time11ss').html());
              var tim12s =  parseFloat($('#time12ss').html());

 $('#energytotal').val(parseFloat(tim1+ tim2 + tim3 + tim4 + tim5 + tim6 + tim7 + tim8 + tim9 + tim10 + tim11 + tim12));
 $('#total_hr').html(Math.ceil(tim1s+ tim2s + tim3s + tim4s + tim5s + tim6s + tim7s + tim8s + tim9s + tim10s + tim11s + tim12s));


     
                     });
        });
</script>
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

  <script>
$("#save").click(function(){



  $.ajax({
            type: 'post',
            url: '../../functions/medicaltest.php',
            data: $('form').serialize(),
            success: function (data) {
              var lastinsertid = data;
              if(data > 0){
              alert('success');
              location.reload();

            }else{
              alert("someting went wrong ");
            }
            }
          });

});



$("#metform").submit(function(e){


    if($('#sum').val() == ''  ||  $('#sum').val() >= 1441  || $('#sum').val() <= 1439 ){

  alert('please set your time routine properly');

  return false;
    }else {


      alert('success');
  }
  });




  function validInput(e) {
  e = (e) ? e : window.event;
  // a = document.getElementById('mobile');
  // b = document.getElementById('mobile');
  cPress = (e.which) ? e.which : e.keyCode;

  if (cPress > 31 && (cPress < 46 || cPress > 57)) {
    return false;
  } else if (a.value.length >= 10) {
    return false;
  }

  return true;
} 

</script>

</body>

</html>
