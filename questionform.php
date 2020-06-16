<?php
session_start();
error_reporting(0);
include "config.php";

if($_SESSION["id"] == ""){
 header("Location: login.php");
}
else{

 $name = $_SESSION["name"];

}





if($_GET['u_idl']){
  
 $sql = "SELECT u.*,p.weight FROM users u  left JOIN profile_details p ON p.user_id = u.id  where u.id = '".$_GET['u_idl']."' ";
  
}else{

  $sql = "SELECT u.*,p.weight FROM users u  left JOIN profile_details p ON p.user_id = u.id  where u.id = '".$_SESSION['id']."' ";

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
// $height = $row['height'];

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
  <link href=" vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=" css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href=" vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
  
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script> -->
<style>
/*.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/pageLoader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}*/

  .project-tab {
      padding: 10%;
      margin-top: -8%;
  }
  .project-tab #tabs{
      background: #007b5e;
      color: #eee;
  }
  .project-tab #tabs h6.section-title{
      color: #eee;
  }
  .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
      color: #0062cc;
      background-color: transparent;
      border-color: transparent transparent #f3f3f3;
      border-bottom: 3px solid !important;
      font-size: 16px;
      font-weight: bold;
  }
  .project-tab .nav-link {
      border: 1px solid transparent;
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem;
      color: #0062cc;
      font-size: 16px;
      font-weight: 600;
  }
  .project-tab .nav-link:hover {
      border: none;
  }
.dynamictable{

  width:100%;
}

</style>

</head>
<body id="page-top">
<div class="loader"></div>
  <!-- Page Wrapper -->
  <div id="wrapper">

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Ultimate Performance</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

    
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
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
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Profile-->
                <!--</a>-->
           <!--      <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <a class="dropdown-item" href="logout.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                <!--<div class="dropdown-divider"></div>-->
                <!--<a class="dropdown-item" href="logout.php" >-->
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
            <h1 class="h3 mb-0 text-gray-800">Questionnaire</h1>
          </div>
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <section id="tabs" class="project-tab">
                           <div class="container">
                               <div class="row">
                                   <div class="col-md-12">
                                       <nav>
                                           <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                               <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile Sport</a>
                                               <a class="nav-item nav-link" id="nav-nutritional-tab" data-toggle="tab" href="#nav-nutritional" role="tab" aria-controls="nav-nutritional" aria-selected="false">Nutritional </a>
                                               <a class="nav-item nav-link" id="nav-medical-tab" data-toggle="tab" href="#nav-medical" role="tab" aria-controls="nav-medical" aria-selected="false">Medical History</a>
                                               <a class="nav-item nav-link" id="nav-bodycomp-tab" data-toggle="tab" href="#nav-bodycomp" role="tab" aria-controls="nav-bodycomp" aria-selected="true">Body Composition</a>
                                               <a class="nav-item nav-link" id="nav-phy-tab" data-toggle="tab" href="#nav-phy" role="tab" aria-controls="nav-phy" aria-selected="false">Physical Skill</a>
                                               <!--<a class="nav-item nav-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-family" aria-selected="false">Project Tab 3</a> -->
                                          </div>
                                       </nav>
                                       <div class="tab-content" id="nav-tabContent">
                                           <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


    <form class="form-horizontal" action="questionform.php" method="post" enctype="multipart/form-data">
        <img src="  <?php echo $image; ?>" style="padding-left: 22px;max-width: 300px; max-height: 100px;" class="img-fluid" /><br /><br />
                <!-- Text input-->

<style>
	input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 5px 120px;
    cursor: pointer;
}
</style>

           <!--         <div class="form-group row" style="padding-left: 22px">
                  <div class="col-md-4">
                  <input id="logo" name="logo" type="file" placeholder="Logo" class="form-control input-md" required=""><br>

                  <label> Please Upload Your Passport Size Photo</label>
                  <input id="user_id" name="user_id" type="hidden" value="<?php echo $user_id; ?>" >
                 <right> <input type="submit" id="updatelogo" name="updatelogo" class="btn btn-primary" value="Upload">
                  </right>
                  </div>
                </div> -->
                     <div class="form-group row" style="padding-left: 22px">
                  <div class="col-md-9">
                  	<label for="logo" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Please Upload Your Passport Size Photo
</label>
                  <input id="logo" name="logo" type="file" placeholder="Logo" class="form-control input-md" required=""><br>
                </div>
                <!--<div class="col-md-5">-->
                <!--  <label> </label>-->
                <!--</div>-->
                <div class="col-md-3">
                  <input id="user_id" name="user_id" type="hidden" value="<?php echo $user_id; ?>" >
                  <input type="submit" id="updatelogo" name="updatelogo" class="btn btn-primary" value="Upload">
                  </div>
            
                </div>

                <hr>
                <!-- Button -->
           <!--      <div class="form-group row">
                  <label class="col-md-6 control-label" for="updatelogo"></label>
                  <div class="col-md-6">
                    
                  </div>
                </div>
                -->
                </fieldset>
                </form>




                                                
                                             <div class="container">
                                               <div class="row">
                                   <!--               <div class="col-sm-3">
                                                   <div class="text-center">
                                                     <img src="img/img1.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                                                     <h6>Upload a different photo...</h6>
                                                     <input type="file" class="text-center center-block file-upload">
                                                   </div>                                      </div> -->
                                                 <div class="col-xl-12">
                                           <form id='profilesport'>
                                           	
                                           	  <label><b><h2>Personal Details</h2></b></label>
                                                     <div class="form-group row">

                                                             <div class="col-md-6">
                                                               <label for="first_name"><h6>Name: </h6></label></div>
                                                               <div class="col-md-6">
                                                               <input type="text" class="form-control" name="fname" id="first_name" placeholder="first name" value="<?php echo $name ?> " readonly>
                                                             </div>
                                                   </div><!--Name-->  
                                                   <div class="form-group row">
                                                         <div class="col-md-6 " for="radios">Gender: </div>
                                                      <div class="col-md-6 ">

                                                     <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender ?>" readonly>

                                                        

                                                      </div>
                                                   </div><!--Gender-->
                                                   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="dob"><h6>Date Of Birth:</h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="dob" value='<?php echo $dateofbirth ?>' readonly></div>
                                                      </div>
                                                       <div class="form-group row">

                                                      <div class="col-md-6">
                                                         <label for="dob"><h6>Current Age: </h6></label></div>
                                                             <div class="col-md-6">
                                                        <input type="text" class="form-control" name="age"  value='<?php echo $age ?> 'readonly>
                                                        </div>

                                                   </div> <!-- DOB-->
                                                   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6>Phone Number:  </h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $mobile ?> " onkeypress="return validInput(event);" readonly>
                                                        </div>
                                                      </div>
                                                        <div class="form-group row">
                                                        <div class="col-md-6">
                                                                      <label for="email"><h6>Email Id: </h6></label></div>
                                                                      <div class="col-md-6">
                                                                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $username ?>" readonly>
                                                        </div>
                                                   </div> 
                                                     <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6> Approximate Weight  (KG) <span style="color: red;font-size: 25px;padding-top: 10px">*</span> : </h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $weight; ?>"  required="">
                                                        </div>
                                                         
                                                   </div><!--Email-->


                                                   <!--    <div class="form-group row">-->

                                                   <!--   <div class="col-md-6">-->
                                                   <!--     <label for="phone"><h6> Approximate Height  (cm) <span style="color: red;font-size: 25px;padding-top: 10px">*</span> : </h6></label></div>-->
                                                   <!--     <div class="col-md-6">-->
                                                   <!--     <input type="text" class="form-control" name="height" id="height" value="<?php echo $height; ?>"  required="">-->
                                                   <!--     </div>-->
                                                         
                                                   <!--</div>-->


                                                   <div class="form-group row">
                                                      <div class="col-md-6 control-label" for="selectbasic">Sports:</div>
                                                      <div class="col-md-6">
                                                              <input type="text" class="form-control" name="sport" id="sport" value="<?php echo $sport ?>" readonly>
                                                      </div>
                                                   </div><!-- Sport--->
                                                   <div class="form-group row">
                                                   <div class="col-md-6">
                                                                      <label><h6>Club / School / College Representing For:</h6></label>
                                                                       
                                                        </div>
                                                        <div class="col-md-6">
                                                                       
                                                                      <input type="text" class="form-control" name="school" id="school" value="" required>
                                                        </div>
                                                      </div>


                                                    

                                                   <div class="form-group row">
                                                      <div class="col-md-6 control-label" for="Highest_country">Highest Level Achieved:</div>
                                                      <div class="col-md-6">
                                                                <select id="Highest_country" name="Highest_country" class="form-control">
                                                                        <option value="">Select...</option>
                                                                  <option value="International_Medalist">International Medalist</option>
                                                                  <option value="International_Participant">International Participant</option>
                                                                  <option value="National_Medalist">National Medalist</option>
                                                                  <option value="National_Participant">National Participant</option>
                                                                  <option value="State_Medalist">State Medalist</option>
                                                                  <option value="State_Participant">State Participant</option>
                                                                  <option value="District_Medalist">District Medalist</option>
                                                                   <option value="None">None</option>
                                                                </select>
                                                      </div>
                                                   </div><!--level-->
                                                   <div class="form-group row">
                                                    <div class="col-md-6 control-label" for="Blood_group">Blood Group:</div>
                                                    <div class="col-md-6">
                                                                <select id="blood_group" name="Blood_group" class="form-control">
                                                                  <option value="">Select...</option>
                                                                  <option value="A_Negative">A Negative</option>
                                                                  <option value="A_Positive">A Positive</option>
                                                                  <option value="B-">B Negative</option>
                                                                  <option value="B_Positive">B Positive</option>
                                                                  <option value="AB">AB Negative</option>
                                                                  <option value="AB_Positive">AB Positive</option>
                                                                  <option value="O-">O Negative</option>
                                                                  <option value="O_Positive">O Positive</option>
                                                                  <option value="Other">Other-</option>
                                                                  <option value="Don’t_Know">Don’t Know</option>
                                                                </select>


 
                                                    </div>
                                                  </div><!--bg-->
                                                  <div class="form-group row">

                                                      <div class="col-md-6">
                                                          <label for="Occuption"><h6>Occupation:</h6></label>
                                                        </div>
                                                         <div class="col-md-6">
                                                          <input type="text" class="form-control" name='Occuption' id="Occuption" placeholder="" title="Occuption">
                                                        </div>
                                                      </div>
                                                       <div class="form-group row">
                                                      <div class="col-md-6">
                                                                    <label ><h6>Coaches Name:</h6></label></div>
                                                                    <div class="col-md-6">
                                                                    <input type="text" class="form-control" name='coach_name' id="coach_name" placeholder="">
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">

                                                  <div class="col-md-6">
                                                            <label ><h6>Coaches Mobile Number:</h6></label></div>
                                                          <div class="col-md-6"> <input type="text" class="form-control" name="coach_phone" id="coach_phone" placeholder="" title="enter your phone number if any." onkeypress="return validInput(event);"  maxlength="10">
                                                  </div>
                                            </div>


                                             <label><b><h2>Parents Details</h2></b></label>
                                         
                                            <div class="form-group row">

                                          <div class="col-md-6">
                                            <label ><h6>Parents Name:</h6></label></div>
                                            <div class="col-md-6">
                                            <input type="text" class="form-control" name='father_name' id="father_name" placeholder="" title="father  name ">
                                              </div>
                                            </div>
                                             <div class="form-group row">
                                              <div class="col-md-6">
                                                  <label ><h6>Contact Number:</h6></label></div>
                                                   <div class="col-md-6">
                                                     <input type="text" class="form-control" name="father_phone" id="father_phone" placeholder="" title="enter your phone number if any." onkeypress="return validInput(event);"  maxlength="10">
                                              </div>
                          </div>
                                            <div class="form-group row">
                                                  <div class="col-md-6">
                                                     <label for="email"><h6>Email Id: </h6></label></div>
                                                       <div class="col-md-6">
                                                      <input type="text" class="form-control" name="father_email" id="father_email" placeholder="" title="enter your email.">
                                                  </div>
                                                </div>
                                                  <div class="form-group row">
                                                  <div class="col-md-6">
                                                <label for="phone"><h6>Occupation: </h6></label></div>
                                                  <div class="col-md-6">
                                              <input type="text" class="form-control" name="father_occupation" id="father_occupation" placeholder="" title="Father Occuption">

                                                </div>
                          </div>
                          <div class="form-group row">
                             <div class="col-md-6">Past Sports Experience:</div>
                             <div class="col-md-6"><select id="Past_Sports" name="Past_Sports" class="form-control">
                                                                  <option value="">Select...</option>
                                                                  <option value="Archery">Archery</option>
                                                                  <option value="Artistic Gymnastics">Artistic Gymnastics</option>
                                                                  <option value="Athletics">Athletics</option>
                                                                  <option value="Badminton">Badminton</option>
                                                                  <option value="Baseball">Baseball</option>
                                                                  <option value="Basketball">Basketball</option>
                                                                  <option value="Bodybuilding">Bodybuilding</option>
                                                                  <option value="Boxing">Boxing</option>
                                                                  <option value="Canoe">Canoe</option>
                                                                  <option value="Cricket">Cricket</option>
                                                                  <option value="Diving">Diving</option>
                                                                  <option value="Fencing">Fencing</option>
                                                                  <option value="Fitness">Fitness</option>
                                                                  <option value="Football">Football</option>
                                                                  <option value="Golf">Golf</option>
                                                                  <option value="Handball">Handball</option>
                                                                  <option value="Hockey">Hockey</option>
                                                                  <option value="Judo">Judo</option>
                                                                  <option value="Kabbadi">Kabbadi</option>
                                                                  <option value="Karate">Karate</option>
                                                                  <option value="Kayak">Kayak</option>
                                                                  <option value="Kho_Kho">Kho Kho</option>
                                                                  <option value="10_Km_Marathon_Swimming">10 Km Marathon Swimming</option>
                                                                  <option value="Martial_Arts">Martial Arts</option>
                                                                  <option value="Modern_Penthathlon">Modern Penthathlon</option>
                                                                  <option value="Pickleball">Pickleball</option>
                                                                  <option value="Rhythemic_Gymnastics">Rhythemic Gymnastics</option>
                                                                  <option value="Rowing">Rowing</option>
                                                                  <option value="Rugby">Rugby</option>
                                                                  <option value="Shooting">Shooting</option>
                                                                  <option value="Skating">Skating</option>
                                                                  <!--<option value="Sports">Sports</option>-->
                                                                  <option value="Squash">Squash</option> 
                                                                  <option value="Swimming">Swimming</option>
                                                                  <option value="Table_Tennis">Table Tennis</option>
                                                                  <option value="Taekwondo">Taekwondo</option>
                                                                  <option value="Tennis">Tennis</option>
                                                                  <option value="Throwball">Throwball</option>
                                                                  <option value="Traithlon">Triathlon </option>
                                                                  <option value="Trampoline">Trampoline</option>
                                                                  <option value="Volleyball">Volleyball</option>
                                                                  <option value="Water_Polo">Water Polo</option>
                                                                  <option value="Weight_Lifting">Weight Lifting</option> 
                                                                  <option value="Wrestling">Wrestling</option>
                                                                  <option value="Other">Other</option>
                                                                   
                                                                </select>
                                
                             </div>
                           </div>
                           
                           <div class="form-group row">
                             <div class="col-md-6">Level: </div>
                             <div class="col-md-6">
                              <select id="Parent_Highest_country" name="Parent_Highest_country" 
                              class="form-control"> 
                               <option value="">Select...</option>
                                                                  <option value="International_Medalist">International Medalist</option>
                                                                  <option value="International_Participant">International Participant</option>
                                                                  <option value="National_Medalist">National Medalist</option>
                                                                  <option value="National_Participant">National Participant</option>
                                                                  <option value="State_Medalist">State Medalist</option>
                                                                  <option value="State_Participant">State Participant</option>
                                                                  <option value="District_Medalist">District Medalist</option>
                                                                   <option value="None">None</option>
                                                                </select>
                                
                             </div>
                           </div>


                          <div class="form-group row">
                             <div class="col-md-6 control-label" for="radios">Both Parents Working:</div>
                             <div class="col-md-6 ">
                               <label class="radio-inline" for="radios-0">
                                 <input type="radio" name="parent_working" id="radios-0" value="yes" checked="checked">
                                 Yes
                               </label>
                               <label class="radio-inline" for="radios-1">
                                 <input type="radio" name="parent_working" id="radios-1" value="no">
                                 No
                               </label>
                               <!-- <label class="radio-inline" for="radios-2">
                                 <input type="radio" name="radios" id="radios-2" value="Other">
                                 Other
                               </label> -->
                             </div>
                           </div>
                        <center>   <input type="button" name="profile_sport"  id="profile_sport" value="NEXT"></center>

                                                   </form>
                                                  </div>

                                               </div>
                                             </div>
                                           </div><!-- tab-profile-->
                                           <div class="tab-pane fade " id="nav-nutritional" role="tabpanel" aria-labelledby="nav-nutritional-tab">
                                             <!-- <hr> -->

                                             <h3> Nutritional Habits</h3>
           <form id="Nutritional">


             <div class="form-group row">
                <div class="col-md-12 control-label" >Nutritional Preferences:</div></div>
                <div class="form-group row">
                <div class="col-md-12">
                  <select id="nutrition1" name="nutrition1" class="form-control">
                    <option value="Casein Free Diet - No Milk">Casein Free Diet - No Milk</option>
            <option value="DASH Diet - Dietary Approach to Stop Hypertension">DASH Diet - Dietary Approach to Stop Hypertension</option>
            <option value="Diabetic Diet - for Diabetes">Diabetic Diet - for Diabetes</option>
            <option value="Extreme Non-Veg Diet - Eats all the animals">Extreme Non-Veg Diet - Eats all the animals</option>
            <option value="Flexitarian Diet - Occasional Chicken and Fish in diet">Flexitarian Diet - Occasional Chicken and Fish in diet</option><option value="Fruitarian Diet - Fruits, nuts, seeds & vegetarian diet">Fruitarian Diet - Fruits, nuts, seeds & vegetarian diet</option>
            <option value="Gluten free Diet - No Gluten">Gluten free Diet - No Gluten</option>
            <option value="Jain Diet">Jain Diet </option>
            <option value="Lacto-Ovo-Vegetarian Diet - Vegetarian who eats eggs and milk">Lacto-Ovo-Vegetarian Diet - Vegetarian who eats eggs and milk</option>
            <option value="Lacto-Vegetarian Diet - Vegetarians who drink milk">Lacto-Vegetarian Diet - Vegetarians who drink milk</option>
          
            <option value="Pescatarian Diet - Vegetarian diet with Seafood.">Pescatarian Diet - Vegetarian diet with Seafood. </option>
            
            <option value="Vegan Diet - Vegetarian diet but no animal products like milk">Vegan Diet - Vegetarian diet but no animal products like milk</option>

                <option value="Other">Other </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">

                  <div class="col-md-12">
                      <label for="first_name"><h6> Food Allergy / Restrictions: </h6></label>
                      <textarea class="form-control" name="Food_Alleragy" id='Food_Alleragy' placeholder="" ></textarea>
                      <!-- <input type="text" class="form-control" name="Food_Alleragy" id='Food_Alleragy' placeholder="" > -->
                  </div></div>
                  <div class="form-group row">
                  <div class="col-md-12">
                   <label for="last_name"><h6>Reason for Food Restriction: </h6></label>
                   <textarea class="form-control" name="food_Restriction" id="food_Restriction" placeholder="" ></textarea>
                     <!-- <input type="text" class="form-control" name="food_Restriction" id="food_Restriction" placeholder="" > -->
                 </div>
              </div>
              <div class="form-group row">
                  <!-- <div class="col-md-12 control-label" >List of Medications:</div></div> -->
                  <!-- <div class="form-group row"><div class="col-md-12"> -->


             <!--        <select id="Medications" name="Medications" class="form-control">

                      <option value="Birthcontrol">Birth control</option>   
            <option value="Hormones">Hormones</option>    
            <option value="Inhaler">Inhaler</option>    
            <option value="Medications">Medications</option>    
            <option value="Supplements">Supplements</option>    
            <option value="Vitamins">Vitamins </option>   
                                </select> -->
                  <!-- </div> -->
                </div>
  <label for="first_name"><h4> List of Supplements and Medications: </h4></label>

<table border="1" cellspacing="0" class="dynamictable">
  <tr>
    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
    <th>Sr.No</th>
    <th>Medications
      


    </th>
    <th>Name & Brand</th>
    <th>Dosage</th>
    <th>Frequency and Timing</th>
 <!--    <th>English</th>
    <th>Computer</th>
    <th>Total</th> -->
  </tr>
  <tr>
    <td><input type='checkbox' class='case'/></td>
    <td><span id='snum'>1.</span></td>
    <td> <select id="Medications" name="Medications[]" class="dynamictable">

              <option value="">Select</option>   
              <option value="Birthcontrol">Birth control</option>   
            <option value="Hormones">Hormones</option>    
            <option value="Inhaler">Inhaler</option>    
            <option value="Medications">Medications</option>    
            <option value="Supplements">Supplements</option>    
            <option value="Vitamins">Vitamins </option>   
                    </select></td>
    <td><input class="dynamictable" type='text' id='first_name' name='first_name[]'/></td>
    <td><input  class="dynamictable" type='text' id='Dosage' name='Dosage[]'/></td>
    <td><input class="dynamictable" type='text' id='Times' name='Times[]'/></td>
<!--     <td><input type='text' id='english' name='english[]'/> </td>
    <td><input type='text' id='computer' name='computer[]'/></td>
    <td><input type='text' id='total' name='total[]'/> </td> -->
  </tr>
</table>


<button type="button" class='delete'>- Delete</button>
<button type="button" class='addmore'>+ Add More</button>



             

                             <div class="form-group row" style="padding-top:25px;">
                               <div class="col-md-6 control-label" for="radios">Smoking Habit:</div>
                               <div class="col-md-3">
                                 <label class="radio-inline" for="radios-0">
                                   <input type="radio" name="Smoking_Habit" id="Smoking_Habit" value="yes">
                                   Yes
                                 </label>
                                 <label class="radio-inline" for="radios-1">
                                   <input type="radio" name="Smoking_Habit" id="Smoking_Habitno" value="no" checked="checked">
                                   No
                                 </label>
                                 
                               </div>


                                   <div class="col-md-3" id="Smoking_Habits">
                                   

                                       <input type="text"  id="no" class="form-control"  name="Smoking_Habit1" id="Smoking_Habit1" placeholder="How Much">
                                   </div>
                                 

                             </div>
                             <div class="form-group row">
                               <div class="col-md-6 control-label" for="radios">Drinking Habit:</div>
                               <div class="col-md-3 ">
                                 <label class="radio-inline" for="radios-0">
                                   <input type="radio" name="Drinking_Habit" id="Drinking_Habit" value="yes">
                                   Yes
                                 </label>
                                 <label class="radio-inline" for="radios-1">
                                   <input type="radio" name="Drinking_Habit" id="Drinking_Habitno" value="no" checked="checked">
                                   No
                                 </label>
                                 <!-- <label class="radio-inline" for="radios-2">
                                   <input type="radio" name="radios" id="radios-2" value="Other">
                                   Other
                                 </label> -->
                               </div>


                                   <div class="col-md-3" id="Drinking_Habits">
                                   
                                       <input type="text" class="form-control" name="Drinking_Habit1" id="Drinking_Habit1" placeholder="How Much">
                                   </div>
                               </div




                                      <br> 
                                      <div style="text-align: center">
                                         <input type="button" name="Nutritional_habit" id="Nutritional_habit" value="NEXT">
                                       </div>
                                      
                                      
                                      
                                      <!--                 <input type="button" name="button" value="BACK"> -->
</form>

                                      
      
                                           </div>

                                           <!-- <hr> -->
                                           <div class="tab-pane fade " id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab">
<h3>Medical History</h3>

           <form id="medicalhistory">


                                             <div class="form-group row">
                                              <div class="col-md-6 control-label" for="radios">Any Disability / Implants:</div>
                                              <div class="col-md-3">
                                                <label class="radio-inline" for="radios-0">
                                                  <input type="radio" name="Disability" id="Disability" value="yes">
                                                  Yes
                                                </label>
                                                <label class="radio-inline" for="radios-1">
                                                  <input type="radio" name="Disability" id="Disabilityno" value="no" checked="checked">
                                                  No
                                                </label>
                                                <!-- <label class="radio-inline" for="radios-2">
                                                  <input type="radio" name="radios" id="radios-2" value="Other">
                                                  Other
                                                </label> -->
                                              </div>


                                                  <div class="col-md-3" id="Disabilitys">
                                                      <!-- hidden input-->
                                                      <input type="text" class="form-control" name="Disability1"  placeholder="Give details" title="enter your first name if any.">
                                                  </div>
                                              </div>
                                              <hr>

                                              <div class="form-group row">
                                                <div class="col-md-6" for="radios">Past Surgeries / Major Injuries / Chronic Pain / Chronic Infection:</div>
                                                <div class="col-md-3">
                                                  <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="Past_Surgeries" id="Past_Surgeries" value="yes" >
                                                    Yes
                                                  </label>
                                                  <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="Past_Surgeries" id="Past_Surgeriesno" value="no" checked="checked">
                                                    No
                                                  </label>
                                                  <!-- <label class="radio-inline" for="radios-2">
                                                    <input type="radio" name="radios" id="radios-2" value="Other">
                                                    Other
                                                  </label> -->
                                                </div>


                                                    <div class="col-md-3" id="Past_Surgeriess">
                                                     <!-- hidden input-->
                                                        <input type="text" class="form-control" name="Past_Surgeries1" placeholder="Give details" >
                                                    </div>
                                                </div>

<hr>

                                               <div class="form-group row">
                                                       <div class="col-md-6 control-label" for="radios">Have you ever felt chest pain?</div>
                                                       <div class="col-md-3">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="chest_pain" id="chest_pain" value="yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="chest_pain" id="chest_painno" value="no" checked="checked">
                                                           No
                                                         </label>
                                                         <!-- <label class="radio-inline" for="radios-2">
                                                           <input type="radio" name="radios" id="radios-2" value="Other">
                                                           Other
                                                         </label> -->
                                                       </div>


                                                           <div class="col-md-3" id="chest_pains">
                                                            <!-- hidden input-->
                                                               <input type="text" class="form-control" name="chest_pain1" placeholder="Give details" title="enter your first name if any.">
                                                           </div>
                                                       </div>

                                                       <hr>
                                                       <div class="form-group row">
                                                         <div class="col-md-6 control-label" for="radios">Have you ever felt breathlessness?</div>
                                                         <div class="col-md-3">
                                                           <label class="radio-inline" for="radios-0">
                                                             <input type="radio" name="breathlessness" id="breathlessness" value="yes" >
                                                             Yes
                                                           </label>
                                                           <label class="radio-inline" for="radios-1">
                                                             <input type="radio" name="breathlessness" id="breathlessnessno" value="no" checked="checked">
                                                             No
                                                           </label>
                                                           <!-- <label class="radio-inline" for="radios-2">
                                                             <input type="radio" name="radios" id="radios-2" value="Other">
                                                             Other
                                                           </label> -->
                                                         </div>


                                                             <div class="col-md-3" id="breathlessnesss">
                                                              <!-- hidden input-->
                                                                 <input type="text" class="form-control" name="breathlessness1" placeholder="Give details" title="enter your first name if any.">
                                                             </div>
                                                         </div>
                                                         <hr>
                                                         <div class="form-group row">
                                                           <div class="col-md-6 control-label" for="radios">Seizures / Dizziness / Loss of Consciousness:</div>
                                                           <div class="col-md-3">
                                                             <label class="radio-inline" for="radios-0">
                                                               <input type="radio" name="Seizure" id="Seizure" value="yes" >
                                                               Yes
                                                             </label>
                                                             <label class="radio-inline" for="radios-1">
                                                               <input type="radio" name="Seizure" id="Seizureno" value="no" checked="checked">
                                                               No
                                                             </label>
                                                             <!-- <label class="radio-inline" for="radios-2">
                                                               <input type="radio" name="radios" id="radios-2" value="Other">
                                                               Other
                                                             </label> -->
                                                           </div>


                                                               <div class="col-md-3" id="Seizures">
                                                              <!-- hidden input-->
                                                                   <input type="text" class="form-control" name="Seizure1" placeholder="Give details" title="enter your first name if any.">
                                                               </div>
                                                           </div>

                                                           <hr>
                                                           <div class="form-group row">
                                                             <div class="col-md-6 control-label" for="radios">Any Fracture?</div>
                                                             <div class="col-md-3">
                                                               <label class="radio-inline" for="radios-0">
                                                                 <input type="radio" name="Fracture" id="Fracture" value="yes" >
                                                                 Yes
                                                               </label>
                                                               <label class="radio-inline" for="radios-1">
                                                                 <input type="radio" name="Fracture" id="Fractureno" value="no" checked="checked">
                                                                 No
                                                               </label>
                                                               <!-- <label class="radio-inline" for="radios-2">
                                                                 <input type="radio" name="radios" id="radios-2" value="Other">
                                                                 Other
                                                               </label> -->
                                                             </div>


                                                                 <div class="col-md-3" id="Fractures">
                                                              <!-- hidden input-->
                                                                     <input type="text" class="form-control" name="Fracture1" placeholder="Give details" title="enter your first name if any.">
                                                                 </div>
                                                             </div>
                                                             <hr>
                                                             <div class="form-group row">
                                                               <div class="col-md-6 control-label" for="radios">Psychological problems like depression, anxiety etc.?</div>
                                                               <div class="col-md-3">
                                                                 <label class="radio-inline" for="radios-0">
                                                                   <input type="radio" name="Psychological" id="Psychological" value="yes" >
                                                                   Yes
                                                                 </label>
                                                                 <label class="radio-inline" for="radios-1">
                                                                   <input type="radio" name="Psychological" id="Psychologicalno" value="no" checked="checked">
                                                                   No
                                                                 </label>
                                                                 <!-- <label class="radio-inline" for="radios-2">
                                                                   <input type="radio" name="radios" id="radios-2" value="Other">
                                                                   Other
                                                                 </label> -->
                                                               </div>


                                                                   <div class="col-md-3" id="Psychologicals">
                                                                    <!-- hidden input-->
                                                                       <input type="text" class="form-control" name="Psychological1" placeholder="Give details" title="enter your first name if any.">
                                                                   </div>
                                                               </div>
                                                               <hr>
                                                               <div class="form-group row">
                                                                 <div class="col-md-6 control-label" for="radios">Any restriction in any physical activity?</div>
                                                                 <div class="col-md-3">
                                                                   <label class="radio-inline" for="radios-0">
                                                                     <input type="radio" name="restriction" id="restriction" value="yes" >
                                                                     Yes
                                                                   </label>
                                                                   <label class="radio-inline" for="radios-1">
                                                                     <input type="radio" name="restriction" id="restrictionno" value="no" checked="checked">
                                                                     No
                                                                   </label>
                                                                   <!-- <label class="radio-inline" for="radios-2">
                                                                     <input type="radio" name="radios" id="radios-2" value="Other">
                                                                     Other
                                                                   </label> -->
                                                                 </div>


                                                                     <div class="col-md-3" id="restrictions">
                                                                    <!-- hidden input-->
                                                                         <input type="text" class="form-control" name="restriction1" placeholder="Give details" title="enter your first name if any.">
                                                                     </div>
                                                                 </div>
                                                                 <hr>
                                                                 <div class="form-group row">
                                                                   <div class="col-md-6 control-label" for="radios">Any hormonal problems?</div>
                                                                   <div class="col-md-3">
                                                                     <label class="radio-inline" for="radios-0">
                                                                       <input type="radio" name="hormonal" id="hormonal" value="yes" >
                                                                       Yes
                                                                     </label>
                                                                     <label class="radio-inline" for="radios-1">
                                                                       <input type="radio" name="hormonal" id="hormonalno" value="no" checked="checked">
                                                                       No
                                                                     </label>
                                                                     <!-- <label class="radio-inline" for="radios-2">
                                                                       <input type="radio" name="radios" id="radios-2" value="Other">
                                                                       Other
                                                                     </label> -->
                                                                   </div>


                                                                       <div class="col-md-3" id="hormonals">
                                                                      <!-- hidden input-->
                                                                           <input type="text" class="form-control" name="hormonal1" placeholder="Give details" title="enter your first name if any.">
                                                                       </div>
                                                                 </div>
<!-- <hr> -->

<h2> Family History</h2>


                                                                 <div class="form-group row">
                                                                    <label class="col-xl-6 control-label" for="radios">Any of your close family member died for no apparent reason?
                                                                   </label>
                                                                 <div class="col-xl-3 ">
                                                                  <label class="radio-inline" for="radios-0">
                                                                    <input type="radio" name="member_died" id="member_died" value="yes" >
                                                                    Yes
                                                                  </label>
                                                                  <label class="radio-inline" for="radios-1">
                                                                    <input type="radio" name="member_died" id="member_diedno" value="no" checked="checked">
                                                                    No
                                                                  </label>

                                                                 </div>


                                                                    <div class="col-xl-3" id="member_dieds">
                                                                   <!-- hidden input-->
                                                                        <input type="text" class="form-control" name="member_died1" placeholder="Give details" title="enter your first name if any.">
                                                                    </div>
                                                                 </div>

                                                                 <hr>

                                                                 <div class="form-group row">
                                                                 <label class="col-md-6 control-label" for="radios">Do you have any family history for heart problems?</label>
                                                                 <div class="col-md-3">
                                                                  <label class="radio-inline" for="radios-0">
                                                                    <input type="radio" name="family_history" id="family_history" value="yes"  >
                                                                    Yes
                                                                  </label>
                                                                  <label class="radio-inline" for="radios-1">
                                                                    <input type="radio" name="family_history" id="family_historyno" value="no" checked="checked">
                                                                    No
                                                                  </label>

                                                                 </div>


                                                                    <div class="col-md-3" id="family_historys">
                                                                   <!-- hidden input-->
                                                                        <input type="text" class="form-control" name="family_history1" placeholder="Give details" title="enter your first name if any.">
                                                                    </div>
                                                                 </div>

                                                                 <hr>
                                                                 <div class="form-group row">
                                                                 <label class="col-md-6 control-label" for="radios">Do you have any fainting episode in family?</label>
                                                                 <div class="col-md-3 ">
                                                                  <label class="radio-inline" for="radios-0">
                                                                    <input type="radio" name="fainting_episode" id="fainting_episode" value="yes" >
                                                                    Yes
                                                                  </label>
                                                                  <label class="radio-inline" for="radios-1">
                                                                    <input type="radio" name="fainting_episode" id="fainting_episodeno" value="no" checked="checked">
                                                                    No
                                                                  </label>

                                                                 </div>


                                                                    <div class="col-md-3" id="fainting_episodes">
                                                                   <!-- hidden input-->
                                                                        <input type="text" class="form-control" name="fainting_episode1" placeholder="Give details" title="enter your first name if any.">
                                                                    </div>
                                                                 </div>
                                                                 <hr>
                                                                 <div class="form-group row">
                                                                 <label class="col-md-6 control-label" for="radios">Do you have history of any psychological disorders in the family?</label>
                                                                 <div class="col-md-3 ">
                                                                  <label class="radio-inline" for="radios-0">
                                                                    <input type="radio" name="psychological_disorder" id="psychological_disorder" value="yes" >
                                                                    Yes
                                                                  </label>
                                                                  <label class="radio-inline" for="radios-1">
                                                                    <input type="radio" name="psychological_disorder" id="psychological_disorderno" value="no" checked="checked">
                                                                    No
                                                                  </label>

                                                                 </div>


                                                                    <div class="col-md-3" id="psychological_disorders">
                                                                   <!-- hidden input-->
                                                                        <input type="text" class="form-control" name="psychological_disorder1" placeholder="Give details" title="enter your first name if any.">
                                                                    </div>
                                                                 </div>

                                                                 <hr>
                                                                 <div class="form-group row">
                                                                 <label class="col-md-6 control-label" for="radios">Do you have diabetes history in your family?</label>
                                                                 <div class="col-md-3 ">
                                                                  <label class="radio-inline" for="radios-0">
                                                                    <input type="radio" name="diabetes_history" id="diabetes_history" value="yes">
                                                                    Yes
                                                                  </label>
                                                                  <label class="radio-inline" for="radios-1">
                                                                    <input type="radio" name="diabetes_history" id="diabetenos_history" value="no" checked="checked">
                                                                    No
                                                                  </label>

                                                                 </div>


                                                                    <div class="col-md-3" id="diabetes_historys">
                                                                   <!-- hidden input-->
                                                                        <input type="text" class="form-control" name="diabetes_history1" placeholder="Give details" title="enter your first name if any.">
                                                                    </div>
                                                                 </div>
                                                                 <hr>
                                                                 <div class="form-group row">
                  <div class="col-md-12">
                   <h6>Any Other relevant Medical Information you want to share?</h6>
                   <textarea class="form-control" name="any_share_medical" id="any_share_medical" placeholder="Medical Information you want to share" ></textarea>
                     <!-- <input type="text" class="form-control" name="food_Restriction" id="food_Restriction" placeholder="" > -->
                 </div>
              </div>


                                                                 <center> <br>
                                                                   <input type="button" name="medical_history" id="medical_history" value="NEXT">
                                                                 <!--   <input type="submit" name="Submit" value="BACK">

 -->
                                                                 </center>
                                                             </form>



                                           </div>
<!-- <hr> -->
                                           <div class="tab-pane fade " id="nav-bodycomp" role="tabpanel" aria-labelledby="nav-bodycomp-tab">
<form id="body_compo">
                                             <div class="radio-label-vertical-wrapper">
                                             <!-- Multiple Radios (inline) -->
                                             <div class="form-group row" style="padding-top: 20px">
                                               <label class="col-md-6 control-label" for="radios">Are you happy the way you look?</label>
                                               <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                 <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                   <input type="radio" name="happy" id="radios-0" value="1" checked="checked">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                   <input type="radio" name="happy" id="radios-1" value="2">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                   <input type="radio" name="happy" id="radios-2" value="3">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                   <input type="radio" name="happy" id="radios-3" value="4">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                   <input type="radio" name="happy" id="radios-4" value="5">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                   <input type="radio" name="happy" id="radios-5" value="6">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                   <input type="radio" name="happy" id="radios-6" value="7">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                   <input type="radio" name="happy" id="radios-7" value="8">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                   <input type="radio" name="happy" id="radios-8" value="9">

                                                 </label>&nbsp;&nbsp;
                                                 <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                   <input type="radio" name="happy" id="radios-9" value="10">

                                                 </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                               </div>
                                             </div>
                                                 </div>
                                           <hr>

                                                 <div class="form-group row">
                                                   <label class="col-md-6 control-label" for="textinput">If you could, what will you change about your appearance? </label>
                                                   <div class="col-md-6">
                                                   <input id="appearance" name="appearance" type="text" placeholder=" " class="form-control input-md">

                                                   </div>
                                                 </div>
                                                 <hr>

                                                 <!-- Multiple Radios (inline) -->
                                                 <div class="form-group row ">
                                                   <label class="col-md-6 control-label" for="radios">Is others opinion about your appearance important for you?</label>
                                                   <div class="col-md-6">
                                                     <label class="radio-inline" for="radios-0">
                                                       <input type="radio" name="opinion_appearance" id="radios-0" value="Yes" >
                                                       Yes
                                                     </label>
                                                     <label class="radio-inline" for="radios-1">
                                                       <input type="radio" name="opinion_appearance" id="radios-1" value="No" checked="checked">
                                                       No
                                                     </label>
                                                     <label class="radio-inline" for="radios-1">
                                                       <input type="radio" name="opinion_appearance" id="radios-1" value="Sometimes">
                                                       Sometimes
                                                     </label>

                                                   </div>
                                                 </div><hr>

                                                 <div class="form-group row">
                                                   <label class="col-md-6 control-label" for="radios">Have you felt discriminated because of your physical appearance?</label>
                                                   <div class="col-md-6">
                                                     <label class="radio-inline" for="radios-0">
                                                       <input type="radio" name="discriminated" id="radios-0" value="Yes">
                                                       Yes
                                                     </label>
                                                     <label class="radio-inline" for="radios-1">
                                                       <input type="radio" name="discriminated" id="radios-1" value="No" checked="checked">
                                                       No
                                                     </label>

                                                   </div>
                                                 </div>
                                                 <hr> 
                                                 <div class="form-group row">
                                                   <label class="col-md-6 control-label" for="radios">Are you happy with your height?</label>
                                                   <div class="col-md-6">
                                                     <label class="radio-inline" for="radios-0">
                                                       <input type="radio" name="happy_height" id="radios-0" value="Yes" >
                                                       Yes
                                                     </label>
                                                     <label class="radio-inline" for="radios-1">
                                                       <input type="radio" name="happy_height" id="radios-1" value="No" checked="checked">
                                                       No
                                                     </label>
                                                     <!-- <label class="radio-inline" for="radios-2">
                                                       <input type="radio" name="radios" id="radios-2" value="">
                                                       Other
                                                     </label> -->
                                                   </div>
                                                 </div><hr>


                                                 <div class="radio-label-vertical-wrapper">
                                                 <!-- Multiple Radios (inline) -->
                                                 <div class="form-group row">
                                                   <label class="col-md-6 control-label" for="radios">Do you feel you have too much fat in your body?</label>
                                                   <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                     <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                       <input type="radio" name="body_fat" id="radios-0" value="1" checked="checked">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                       <input type="radio" name="body_fat" id="radios-1" value="2">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                       <input type="radio" name="body_fat" id="radios-2" value="3">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                       <input type="radio" name="body_fat" id="radios-3" value="4">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                       <input type="radio" name="body_fat" id="radios-4" value="5">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                       <input type="radio" name="body_fat" id="radios-5" value="6">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                       <input type="radio" name="body_fat" id="radios-6" value="7">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                       <input type="radio" name="body_fat" id="radios-7" value="8">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                       <input type="radio" name="body_fat" id="radios-8" value="9">

                                                     </label>&nbsp;&nbsp;
                                                     <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                       <input type="radio" name="body_fat" id="radios-9" value="10">

                                                     </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                   </div>
                                                 </div>
                                                     </div>
                                                     <hr>
                                                     
                                                     
                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Do you feel you need to gain weight to look good?</label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="gain_weight" id="radios-0" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="gain_weight" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>

                                                       </div>
                                                     </div>
                                                     
                                                     <hr>


                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Have you ever gone on diet?</label>
                                                       <div class="col-md-3">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="diet" id="diet" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="diet" id="dietno" value="No" checked="checked">
                                                           No
                                                         </label>

                                                       </div>
                                                       <div class="col-md-3" id="diets">
                                                          
                                                          
                                                               <input type="text" class="form-control" name="diet1" placeholder="by Whom?" >
                                                           </div>
                                                     </div>
                                                     <hr>


                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Do you feel you gain weight if you don't follow a diet?</label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="diabetes" id="radios-0" value="yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="diabetes" id="radios-1" value="no" checked="checked">
                                                           No
                                                         </label>
                                                         <!-- <label class="radio-inline" for="radios-2">-->
                                                         <!--  <input type="radio" name="radios" id="radios-2" value="Other">-->
                                                         <!--  Other-->
                                                         <!--</label> -->
                                                       </div>


                                                           
                                                     </div>


                                           <hr>

                                                      
                                           <!-- <hr> -->
                                           <div class="form-group row" >
                                                       <label class="col-md-6 control-label" for="radios">Do you have regular complaint of food not getting digested properly? </label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="complaint" id="radios-0" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="complaint" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                       </div>
                                                     </div>
                                                     <hr>

                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Do you have a habit of eating slow / fast? </label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="habit" id="radios-0" value="Too Fast" checked="checked">
                                                           Too Fast
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="habit" id="radios-1" value="Fast">
                                                           Fast
                                                         </label>
                                                         <label class="radio-inline" for="radios-2">
                                                           <input type="radio" name="habit" id="radios-2" value="Normal">
                                                           Normal
                                                         </label>
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="habit" id="radios-0" value="Slow">
                                                         Slow
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="habit" id="radios-1" value=" Very Slow">
                                                          Very Slow
                                                         </label>

                                                       </div>
                                                     </div>
                                           <hr>
                                                     <div class="form-group row" >
                                                       <label class="col-md-6 control-label" for="radios">Have you ever fast to loose weight?</label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="loose" id="radios-0" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="loose" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                       </div>
                                                     </div>

                                           <hr>
                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Are you comfortable discussing about appearance, food habits in front of your parents / coach?</label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="comfortable" id="radios-0" value="Yes">
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="comfortable" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                         <!-- <label class="radio-inline" for="radios-2">
                                                           <input type="radio" name="radios" id="radios-2" value="Other">
                                                           Other
                                                         </label> -->
                                                       </div>
                                                     </div>
                                           <hr>
                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Does happiness depend on physical appearance? </label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="physical" id="radios-0" value="Yes">
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="physical" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                         <!-- <label class="radio-inline" for="radios-2">
                                                           <input type="radio" name="radios" id="radios-2" value="Other">
                                                           Other
                                                         </label> -->
                                                       </div>
                                                     </div>
                                           <hr>

                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Do you think during training, more repetitions (volume training) you do better you will be in competitions?</label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="competitions" id="radios-0" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="competitions" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                       </div>
                                                     </div><hr>
                                                     <div class="form-group row">
                                                       <label class="col-md-6 control-label" for="radios">Do you sometime do more training than required / asked by coach? </label>
                                                       <div class="col-md-6">
                                                         <label class="radio-inline" for="radios-0">
                                                           <input type="radio" name="training" id="radios-0" value="Yes" >
                                                           Yes
                                                         </label>
                                                         <label class="radio-inline" for="radios-1">
                                                           <input type="radio" name="training" id="radios-1" value="No" checked="checked">
                                                           No
                                                         </label>
                                                         <label class="radio-inline" for="radios-2">
                                                           <input type="radio" name="training" id="radios-1" value="Sometimes" >
                                                           Sometimes
                                                         </label>
                                                       </div>
                                                     </div>
                                                     <center> <br>
                                                       <input type="button" name="bodycompo" id="bodycompo" value="NEXT">
                                                       <!-- <input type="button" name="" value="BACK"> -->


                                                   </center>

</form>

</div>

                  


                                           <div class="tab-pane fade" id="nav-phy" role="tabpanel" aria-labelledby="nav-phy-tab">
<!-- <h2> Body Competitions</h2> -->
  <div class="row"> 
     <div class="col-7"></div>                                     
 <div class="col-5" ><b style="padding-left:35px">Rate Your-self</b></div>
       </div> 
<hr>

           <form id='physical_skill'>
             <div class="radio-label-vertical-wrapper">
             <!-- Multiple Radios (inline) -->

             <div class="form-group row">
               <label class="col-md-6 control-label" for="radios">Aerobic Endurance — also known as cardiovascular fitness or stamina, is the ability to exercise continuously for extended periods without tiring.</label>
               <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                 <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                   <input type="radio" name="stamina" id="radios-0" value="1" checked="checked">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                   <input type="radio" name="stamina" id="radios-1" value="2">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                   <input type="radio" name="stamina" id="radios-2" value="3">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                   <input type="radio" name="stamina" id="radios-3" value="4">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                   <input type="radio" name="stamina" id="radios-4" value="5">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                   <input type="radio" name="stamina" id="radios-5" value="6">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                   <input type="radio" name="stamina" id="radios-6" value="7">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                   <input type="radio" name="stamina" id="radios-7" value="8">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                   <input type="radio" name="stamina" id="radios-8" value="9">

                 </label>&nbsp;&nbsp;
                 <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                   <input type="radio" name="stamina" id="radios-9" value="10">

                 </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
               </div>
             </div>
                 </div>
             <hr>
                 <div class="radio-label-vertical-wrapper">
                 <!-- Multiple Radios (inline) -->
                 <div class="form-group row">
                  <label class="col-md-6 control-label" for="radios">Muscular Endurance — the ability to repeat a series of muscle contractions without fatiguing.</label>
                  <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                   <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                     <input type="radio" name="contractions" id="radios-0" value="1" checked="checked">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                     <input type="radio" name="contractions" id="radios-1" value="2">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                     <input type="radio" name="contractions" id="radios-2" value="3">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                     <input type="radio" name="contractions" id="radios-3" value="4">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                     <input type="radio" name="contractions" id="radios-4" value="5">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                     <input type="radio" name="contractions" id="radios-5" value="6">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                     <input type="radio" name="contractions" id="radios-6" value="7">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                     <input type="radio" name="contractions" id="radios-7" value="8">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                     <input type="radio" name="contractions" id="radios-8" value="9">

                   </label>&nbsp;&nbsp;
                   <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                     <input type="radio" name="contractions" id="radios-9" value="10">

                   </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                 </div>
                 </div>
                    </div>

             <hr>

                    <div class="radio-label-vertical-wrapper">
                    <!-- Multiple Radios (inline) -->
                    <div class="form-group row">
                      <label class="col-md-6 control-label" for="radios">Muscle Strength — the ability to carry out work against a resistance.</label>
                      <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                       <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                         <input type="radio" name="resistance" id="radios-0" value="1" checked="checked">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                         <input type="radio" name="resistance" id="radios-1" value="2">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                         <input type="radio" name="resistance" id="radios-2" value="3">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                         <input type="radio" name="resistance" id="radios-3" value="4">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                         <input type="radio" name="resistance" id="radios-4" value="5">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                         <input type="radio" name="resistance" id="radios-5" value="6">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                         <input type="radio" name="resistance" id="radios-6" value="7">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                         <input type="radio" name="resistance" id="radios-7" value="8">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                         <input type="radio" name="resistance" id="radios-8" value="9">

                       </label>&nbsp;&nbsp;
                       <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                         <input type="radio" name="resistance" id="radios-9" value="10">

                       </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                     </div>
                    </div>
                        </div>
                        <hr>
                        <div class="radio-label-vertical-wrapper">
                        <!-- Multiple Radios (inline) -->
                        <div class="form-group row">
                          <label class="col-md-6 control-label" for="radios">Explosive Power — the ability to exert a maximal force in as short a time as possible, as in accelerating, jumping and throwing implements.</label>
                          <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                           <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                             <input type="radio" name="Explosive" id="radios-0" value="1" checked="checked">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                             <input type="radio" name="Explosive" id="radios-1" value="2">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                             <input type="radio" name="Explosive" id="radios-2" value="3">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                             <input type="radio" name="Explosive" id="radios-3" value="4">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                             <input type="radio" name="Explosive" id="radios-4" value="5">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                             <input type="radio" name="Explosive" id="radios-5" value="6">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                             <input type="radio" name="Explosive" id="radios-6" value="7">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                             <input type="radio" name="Explosive" id="radios-7" value="8">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                             <input type="radio" name="Explosive" id="radios-8" value="9">

                           </label>&nbsp;&nbsp;
                           <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                             <input type="radio" name="Explosive" id="radios-9" value="10">

                           </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                         </div>
                        </div>
                            </div>
<hr>

                            <div class="radio-label-vertical-wrapper">
                            <!-- Multiple Radios (inline) -->
                            <div class="form-group row">
                              <label class="col-md-6 control-label" for="radios">Speed / Quickness — the ability to move quickly across the ground or move limbs rapidly to grab or throw.</label>
                              <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                               <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                 <input type="radio" name="Quickness" id="radios-0" value="1" checked="checked">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                 <input type="radio" name="Quickness" id="radios-1" value="2">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                 <input type="radio" name="Quickness" id="radios-2" value="3">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                 <input type="radio" name="Quickness" id="radios-3" value="4">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                 <input type="radio" name="Quickness" id="radios-4" value="5">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                 <input type="radio" name="Quickness" id="radios-5" value="6">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                 <input type="radio" name="Quickness" id="radios-6" value="7">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                 <input type="radio" name="Quickness" id="radios-7" value="8">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                 <input type="radio" name="Quickness" id="radios-8" value="9">

                               </label>&nbsp;&nbsp;
                               <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                 <input type="radio" name="Quickness" id="radios-9" value="10">

                               </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                             </div>
                            </div>
                                </div><hr>
                                <div class="radio-label-vertical-wrapper">
                                <!-- Multiple Radios (inline) -->
                                <div class="form-group row"> 
                                  <label class="col-md-6 control-label" for="radios">Anaerobic Capacity — long sprinting ability, or the ability recover from repeat sprints (glycolytic system)</label>
                                  <div class="col-md-6">
                                    <i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                   <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                     <input type="radio" name="fAnaerobic" id="radios-0" value="1" checked="checked">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                     <input type="radio" name="fAnaerobic" id="radios-1" value="2">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-2" value="3">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                     <input type="radio" name="fAnaerobic" id="radios-3" value="4">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-4" value="5">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-5" value="6">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-6" value="7">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-7" value="8">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                     <input type="radio" name="fAnaerobic" id="radios-8" value="9">

                                   </label>&nbsp;&nbsp;
                                   <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                     <input type="radio" name="fAnaerobic" id="radios-9" value="10">

                                   </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                 </div>
                                </div>
                                    </div><hr>

                                    <div class="radio-label-vertical-wrapper">
                                    <!-- Multiple Radios (inline) -->
                                    <div class="form-group row"> 
                                      <label class="col-md-6 control-label" for="radios">Flexibility — the capacity of a joint to move through its full range of motion, which is important for execution of the techniques of sports</label>
                                      <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                       <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                         <input type="radio" name="Flexibility" id="radios-0" value="1" checked="checked">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                         <input type="radio" name="Flexibility" id="radios-1" value="2">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                         <input type="radio" name="Flexibility" id="radios-2" value="3">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                         <input type="radio" name="Flexibility" id="radios-3" value="4">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                         <input type="radio" name="Flexibility" id="radios-4" value="5">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                         <input type="radio" name="Flexibility" id="radios-5" value="6">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                         <input type="radio" name="Flexibility" id="radios-6" value="7">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                         <input type="radio" name="Flexibility" id="radios-7" value="8">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                         <input type="radio" name="Flexibility" id="radios-8" value="9">

                                       </label>&nbsp;&nbsp;
                                       <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                         <input type="radio" name="Flexibility" id="radios-9" value="10">

                                       </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                     </div>
                                    </div>
                                        </div><hr>
                                        <div class="radio-label-vertical-wrapper">
                                        <!-- Multiple Radios (inline) -->
                                        <div class="form-group row">
                                          <label class="col-md-6 control-label" for="radios">Agility — the ability to quickly change body position or direction of the body</label>
                                          <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                           <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                             <input type="radio" name="Agility" id="radios-0" value="1" checked="checked">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                             <input type="radio" name="Agility" id="radios-1" value="2">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                             <input type="radio" name="Agility" id="radios-2" value="3">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                             <input type="radio" name="Agility" id="radios-3" value="4">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                             <input type="radio" name="Agility" id="radios-4" value="5">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                             <input type="radio" name="Agility" id="radios-5" value="6">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                             <input type="radio" name="Agility" id="radios-6" value="7">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                             <input type="radio" name="Agility" id="radios-7" value="8">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                             <input type="radio" name="Agility" id="radios-8" value="9">

                                           </label>&nbsp;&nbsp;
                                           <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                             <input type="radio" name="Agility" id="radios-9" value="10">

                                           </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                         </div>
                                        </div>
                                            </div>
<hr>
                                            <div class="radio-label-vertical-wrapper">
                                            <!-- Multiple Radios (inline) -->
                                            <div class="form-group row">
                                              <label class="col-md-6 control-label" for="radios">Balance — the ability to stay upright or stay in control of body movement is an important component of many sports skills</label>
                                              <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                               <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                 <input type="radio" name="Balance" id="radios-0" value="1" checked="checked">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                 <input type="radio" name="Balance" id="radios-1" value="2">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                 <input type="radio" name="Balance" id="radios-2" value="3">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                 <input type="radio" name="Balance" id="radios-3" value="4">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                 <input type="radio" name="Balance" id="radios-4" value="5">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                 <input type="radio" name="Balance" id="radios-5" value="6">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                 <input type="radio" name="Balance" id="radios-6" value="7">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                 <input type="radio" name="Balance" id="radios-7" value="8">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                 <input type="radio" name="Balance" id="radios-8" value="9">

                                               </label>&nbsp;&nbsp;
                                               <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                 <input type="radio" name="Balance" id="radios-9" value="10">

                                               </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                             </div>
                                            </div>
                                                </div><hr>
                                                <div class="radio-label-vertical-wrapper">
                                                <!-- Multiple Radios (inline) -->
                                                <div class="form-group row">
                                                  <label class="col-md-6 control-label" for="radios">Coordination — different body movements simultaneously </label>
                                                  <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                   <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                     <input type="radio" name="Coordination" id="radios-0" value="1" checked="checked">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                     <input type="radio" name="Coordination" id="radios-1" value="2">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                     <input type="radio" name="Coordination" id="radios-2" value="3">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                     <input type="radio" name="Coordination" id="radios-3" value="4">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                     <input type="radio" name="Coordination" id="radios-4" value="5">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                     <input type="radio" name="Coordination" id="radios-5" value="6">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                     <input type="radio" name="Coordination" id="radios-6" value="7">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                     <input type="radio" name="Coordination" id="radios-7" value="8">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                     <input type="radio" name="Coordination" id="radios-8" value="9">

                                                   </label>&nbsp;&nbsp;
                                                   <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                     <input type="radio" name="Coordination" id="radios-9" value="10">

                                                   </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                 </div>
                                                </div>
                                                    </div><hr>



                                                        <div class="radio-label-vertical-wrapper">
                                                        <!-- Multiple Radios (inline) -->
                                                        <div class="form-group row">
                                                          <label class="col-md-6 control-label" for="radios">Reaction Time — the ability to respond quickly to a stimulus</label>
                                                          <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                           <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                             <input type="radio" name="Reaction" id="radios-0" value="1" checked="checked">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                             <input type="radio" name="Reaction" id="radios-1" value="2">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                             <input type="radio" name="Reaction" id="radios-2" value="3">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                             <input type="radio" name="Reaction" id="radios-3" value="4">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                             <input type="radio" name="Reaction" id="radios-4" value="5">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                             <input type="radio" name="Reaction" id="radios-5" value="6">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                             <input type="radio" name="Reaction" id="radios-6" value="7">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                             <input type="radio" name="Reaction" id="radios-7" value="8">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                             <input type="radio" name="Reaction" id="radios-8" value="9">

                                                           </label>&nbsp;&nbsp;
                                                           <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                             <input type="radio" name="Reaction" id="radios-9" value="10">

                                                           </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                         </div>
                                                        </div>
                                                            </div>
<hr>
                                                            <div class="radio-label-vertical-wrapper">
                                                            <!-- Multiple Radios (inline) -->
                                                            <div class="form-group row">
                                                              <label class="col-md-6 control-label" for="radios">Core Strength — core muscles strength
                                                              	  </label>
                                                              <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                               <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                                 <input type="radio" name="muscles" id="radios-0" value="1" checked="checked">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                                 <input type="radio" name="muscles" id="radios-1" value="2">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                                 <input type="radio" name="muscles" id="radios-2" value="3">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                                 <input type="radio" name="muscles" id="radios-3" value="4">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                                 <input type="radio" name="muscles" id="radios-4" value="5">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                                 <input type="radio" name="muscles" id="radios-5" value="6">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                                 <input type="radio" name="muscles" id="radios-6" value="7">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                                 <input type="radio" name="muscles" id="radios-7" value="8">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                                 <input type="radio" name="muscles" id="radios-8" value="9">

                                                               </label>&nbsp;&nbsp;
                                                               <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                                 <input type="radio" name="muscles" id="radios-9" value="10">

                                                               </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                             </div>
                                                            </div>
                                                                </div>
                                                                <hr>
                                                                <div class="radio-label-vertical-wrapper">
                                                                <!-- Multiple Radios (inline) -->
                                                                <div class="form-group row">
                                                                  <label class="col-md-6 control-label" for="radios">Analytic and Tactical Ability — the ability of the mental system to evaluate and react to strategic situations (tactical ability).</label>
                                                                  <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                                   <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                                     <input type="radio" name="Analytic" id="radios-0" value="1" checked="checked">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                                     <input type="radio" name="Analytic" id="radios-1" value="2">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                                     <input type="radio" name="Analytic" id="radios-2" value="3">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                                     <input type="radio" name="Analytic" id="radios-3" value="4">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                                     <input type="radio" name="Analytic" id="radios-4" value="5">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                                     <input type="radio" name="Analytic" id="radios-5" value="6">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                                     <input type="radio" name="Analytic" id="radios-6" value="7">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                                     <input type="radio" name="Analytic" id="radios-7" value="8">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                                     <input type="radio" name="Analytic" id="radios-8" value="9">

                                                                   </label>&nbsp;&nbsp;
                                                                   <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                                     <input type="radio" name="Analytic" id="radios-9" value="10">

                                                                   </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                                 </div>
                                                                </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="radio-label-vertical-wrapper">
                                                                    <!-- Multiple Radios (inline) -->
                                                                    <div class="form-group row">
                                                                      <label class="col-md-6 control-label" for="radios">Motivation and Self Confidence — a motivated and focused athlete, with a level of belief in themselves, often seen as arrogance in athletes</label>
                                                                      <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                                       <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                                         <input type="radio" name="Motivation" id="radios-0" value="1" checked="checked">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                                         <input type="radio" name="Motivation" id="radios-1" value="2">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                                         <input type="radio" name="Motivation" id="radios-2" value="3">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                                         <input type="radio" name="radios" id="radios-3" value="4">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                                         <input type="radio" name="Motivation" id="radios-4" value="5">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                                         <input type="radio" name="Motivation" id="radios-5" value="6">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                                         <input type="radio" name="Motivation" id="radios-6" value="7">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                                         <input type="radio" name="Motivation" id="radios-7" value="8">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                                         <input type="radio" name="Motivation" id="radios-8" value="9">

                                                                       </label>&nbsp;&nbsp;
                                                                       <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                                         <input type="radio" name="Motivation" id="radios-9" value="10">

                                                                       </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                                     </div>
                                                                    </div>
                                                                        </div><hr>
                                                                        <div class="radio-label-vertical-wrapper">
                                                                        <!-- Multiple Radios (inline) -->
                                                                        <div class="form-group row">
                                                                          <label class="col-md-6 control-label" for="radios">Coping with Pressure — the ability to stay focused and perform up to expectations while under increasing pressure, and under changing conditions.</label>
                                                                          <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
                                                                           <label class="radio-inline radio-label-vertical" for="radios-0"> 1<br>
                                                                             <input type="radio" name="pressure" id="radios-0" value="1" checked="checked">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                                                                             <input type="radio" name="pressure" id="radios-1" value="2">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-2">3  <br>
                                                                             <input type="radio" name="pressure" id="radios-2" value="3">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                                                                             <input type="radio" name="pressure" id="radios-3" value="4">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-4">5  <br>
                                                                             <input type="radio" name="pressure" id="radios-4" value="5">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-5">6  <br>
                                                                             <input type="radio" name="pressure" id="radios-5" value="6">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-6">7  <br>
                                                                             <input type="radio" name="pressure" id="radios-6" value="7">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-7">8  <br>
                                                                             <input type="radio" name="pressure" id="radios-7" value="8">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-8">9  <br>
                                                                             <input type="radio" name="pressure" id="radios-8" value="9">

                                                                           </label>&nbsp;&nbsp;
                                                                           <label class="radio-inline radio-label-vertical" for="radios-9">10 <br>
                                                                             <input type="radio" name="pressure" id="radios-9" value="10">

                                                                           </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
                                                                         </div>
                                                                        </div>
                                                                      </div><hr>
                                                                            <div class="radio-label-vertical-wrapper">
                                                                            <!-- Multiple Radios (inline) -->
                                                                            <div class="form-group row">
                                                                              <label class="col-md-6 control-label" for="radios">Skill and Technique — the specific skill set, and technique required to be successful in a sport.
             </label>
             <div class="col-md-6"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i>
              <label class="radio-inline radio-label-vertical" for="radios-0">1<br>
                <input type="radio" name="Technique" id="radios-0" value="1" checked="checked">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-1">2<br>
                <input type="radio" name="Technique" id="radios-1" value="2">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-2">3 <br>
                <input type="radio" name="Technique" id="radios-2" value="3">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-3">4<br>
                <input type="radio" name="Technique" id="radios-3" value="4">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-4">5 <br>
                <input type="radio" name="Technique" id="radios-4" value="5">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-5">6 <br>
                <input type="radio" name="Technique" id="radios-5" value="6">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-6">7 <br>
                <input type="radio" name="Technique" id="radios-6" value="7">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-7">8 <br>
                <input type="radio" name="Technique" id="radios-7" value="8">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-8">9 <br>
                <input type="radio" name="Technique" id="radios-8" value="9">

              </label>&nbsp;&nbsp;
              <label class="radio-inline radio-label-vertical" for="radios-9">10  <br>
                <input type="radio" name="Technique" id="radios-9" value="10">

              </label><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i>
             </div>
                                                                            </div>
                                                                                </div>

<div style="text-align: center">

  <input type="button" name="physicalskill" id='physicalskill' value="SAVE">
   </div>
           </form>  
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </section>

            </div> <!--card  body-->

          </div><!-- card-->

        </div><!-- first 12 div-->
      </div><!--row-->
    </div> <!--container-->
  </div> <!-- content-->
</div><!--contan wrapper-->


</div><!--wrper-->
  <!-- Bootstrap core JavaScript-->
  <script src=" vendor/jquery/jquery.min.js"></script>
  <script src=" vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src=" vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src=" js/sb-admin-2.min.js"></script>


<script>
  function validInput(e) {
  e = (e) ? e : window.event;
  // a = document.getElementById('mobile');
  // b = document.getElementById('mobile');
  cPress = (e.which) ? e.which : e.keyCode;

  if (cPress > 31 && (cPress < 48 || cPress > 57)) {
    return false;
  } else if (a.value.length >= 10) {
    return false;
  }

  return true;
} 
</script>
<script>

$('#profile_sport').click(function(){


  if($("#weight").val() == ""){  
        $("#weight").focus();
        return;
      }  

      //if($("#height").val() == ""){  
      //  $("#height").focus();
      //  return;
      //} 

  $.ajax({
    type: 'post',
    url: 'functions/profile_q.php',
    data: $('#profilesport').serialize(),
    success: function (data) {


if(data >= 1){

alert('success');



$( "#nav-nutritional-tab" ).trigger( "click" );



}else{

  alert("fail");

}
    // var result=data;
    // $('#result').attr("value",result);

    }
});


});



$('#Nutritional_habit').click(function(){

// alert($('#Nutritional').serialize());

$.ajax({
    type: 'post',
    url: ' functions/nutrition.php',
    data: $('#Nutritional').serialize(),
    success: function (data) {

      // return  false;
    // var result=data;
    // $('#result').attr("value",result);

if(data >= 1){

alert('success');

$( "#nav-medical-tab" ).trigger( "click" );


}else{

  alert("fail");

}

    }
});

});

$('#medical_history').click(function(){



$.ajax({
    type: 'post',
    url: ' functions/medical_history.php',
    data: $('#medicalhistory').serialize(),
    success: function (data) {


if(data >= 1){

alert('success');
$( "#nav-bodycomp-tab" ).trigger( "click" );


}else{

  alert("fail");

}

    }
});

});

$('#bodycompo').click(function(){


$.ajax({
    type: 'post',
    url: ' functions/body_compoq.php',
    data: $('#body_compo').serialize(),
    success: function (data) {


if(data >= 1){

alert('success');
$( "#nav-phy-tab" ).trigger( "click" );


}else{

  alert("fail");

}

    }
});

});


$('#physicalskill').click(function(){


$.ajax({
    type: 'post',
    url: ' functions/physical_skill.php',
    data: $('#physical_skill').serialize(),
    success: function (data) {



if(data == 1){

alert('success');
 window.location.href = 'client_MET.php';

}else{

  alert("fail");

}

    }
});

});





$(".delete").on('click', function() {
  $('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
  check();

});
var i=2;
$(".addmore").on('click',function(){
  count=$('table tr').length;
    var data="<tr><td><input type='checkbox' class='case'/></td><td><span id='snum"+i+"'>"+count+".</span></td>";
    data +="<td><select id='Medications"+i+"' name='Medications[]' class='dynamictable'>   <option value=''>Select</option>   <option value='Medications'>Medications</option>  <option value='Supplements'>Supplements</option> <option value='Vitamins'>Vitamins </option> <option value='Inhaler'>Inhaler</option><option value='Birthcontrol'>Birth control</option><option value='Hormones'>Hormones</option></select><td><input class='dynamictable' type='text' id='first_name"+i+"' name='first_name[]'/></td> <td><input class='dynamictable' type='text' id='last_name"+i+"' name='Dosage[]'/></td><td><input class='dynamictable' type='text' id='tamil"+i+"' name='Times[]'/></td></tr>";
  $('table').append(data);
  i++;
});

function select_all() {
  $('input[class=case]:checkbox').each(function(){ 
    if($('input[class=check_all]:checkbox:checked').length == 0){ 
      $(this).prop("checked", false); 
    } else {
      $(this).prop("checked", true); 
    } 
  });
}

function check(){
  obj=$('table tr').find('span');
  $.each( obj, function( key, value ) {
  id=value.id;
  $('#'+id).html(key+1);
  });
  }

$( document ).ready(function() {


$('#Smoking_Habits').hide();
$('#Drinking_Habits').hide();
$('#Disabilitys').hide();
$('#Past_Surgeriess').hide();
$('#chest_pains').hide();
$('#breathlessnesss').hide();
$('#Fractures').hide();
$('#Seizures').hide();
$('#Psychologicals').hide();
$('#restrictions').hide();
$('#hormonals').hide();
$('#member_dieds').hide();
$('#family_historys').hide();
$('#fainting_episodes').hide();
$('#psychological_disorders').hide();
$('#diabetes_historys').hide();
$('#diets').hide();




})

// Smoking_Habit

$('#Smoking_Habit').click(function(){
$('#Smoking_Habits').show();
})
$('#Smoking_Habitno').click(function(){
$('#Smoking_Habits').hide();
})

// Drinking_Habit
$('#Drinking_Habit').click(function(){
$('#Drinking_Habits').show();
})
$('#Drinking_Habitno').click(function(){
$('#Drinking_Habits').hide();
})
//Disability
$('#Disability').click(function(){
$('#Disabilitys').show();
})
$('#Disabilityno').click(function(){
$('#Disabilitys').hide();
})
//Past_Surgeries
$('#Past_Surgeries').click(function(){
$('#Past_Surgeriess').show();
})
$('#Past_Surgeriesno').click(function(){
$('#Past_Surgeriess').hide();
})
//chest_pain
$('#chest_pain').click(function(){
$('#chest_pains').show();
})
$('#chest_painno').click(function(){
$('#chest_pains').hide();
})
//breathlessness
$('#breathlessness').click(function(){
$('#breathlessnesss').show();
})
$('#breathlessnessno').click(function(){
$('#breathlessnesss').hide();
})
//Fracture
$('#Fracture').click(function(){
$('#Fractures').show();
})
$('#Fractureno').click(function(){
$('#Fractures').hide();
})
//Seizure
$('#Seizure').click(function(){
$('#Seizures').show();
})
$('#Seizureno').click(function(){
$('#Seizures').hide();
})
//Psychological
$('#Psychological').click(function(){
$('#Psychologicals').show();
})
$('#Psychologicalno').click(function(){
$('#Psychologicals').hide();
})
//restriction
$('#restriction').click(function(){
$('#restrictions').show();
})
$('#restrictionno').click(function(){
$('#restrictions').hide();
})
//hormonal
$('#hormonal').click(function(){
$('#hormonals').show();
})
$('#hormonalno').click(function(){
$('#hormonals').hide();
})
//member_died
$('#member_died').click(function(){
$('#member_dieds').show();
})
$('#member_diedno').click(function(){
$('#member_dieds').hide();
})
//family_history
$('#family_history').click(function(){
$('#family_historys').show();
})
$('#family_historyno').click(function(){
$('#family_historys').hide();
})
//fainting_episode
$('#fainting_episode').click(function(){
$('#fainting_episodes').show();
})
$('#fainting_episodeno').click(function(){
$('#fainting_episodes').hide();
})
//psychological_disorder
$('#psychological_disorder').click(function(){
$('#psychological_disorders').show();
})
$('#psychological_disorderno').click(function(){
$('#psychological_disorders').hide();
})
//diabetes_history
$('#diabetes_history').click(function(){
$('#diabetes_historys').show();
})
$('#diabetenos_history').click(function(){
$('#diabetes_historys').hide();
})
//diets
$('#diet').click(function(){
$('#diets').show();
})
$('#dietno').click(function(){
$('#diets').hide();
})


 

</script>





</body>
</html>
