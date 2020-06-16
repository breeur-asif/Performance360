<?php
session_start();
error_reporting(0);
include "config.php";







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
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admindashboard.php">
        <div class="sidebar-brand-text mx-3"><i class="fas fa-arrow-left"></i> Back to  Admin Panel </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
   
    
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
 
              </div>  
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile View </h1>
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
                            
                                       <div class="tab-content" id="nav-tabContent">
                                           <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


    <form class="form-horizontal" action="questionform.php" method="post" enctype="multipart/form-data">
    <center style="padding-top: 15px;">   <img src="../../<?php echo $image; ?>" style="padding-left: 22px;max-width: 300px; max-height: 100px;" class="img-fluid" /> </center>
                <!-- Text input-->


              

                <hr>
   
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
                                                   </div>   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6> Approximate Weight  (KG) <span style="color: red;font-size: 25px;padding-top: 10px">*</span> : </h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $weight; ?>"  required="">
                                                        </div>
                                                         
                                                   </div><!--Email-->

                                                    <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6> Approximate height  (cm) <span style="color: red;font-size: 25px;padding-top: 10px">*</span> : </h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="height" id="height" value="<?php echo $height; ?>"  required="" >
                                                        </div>
                                                         
                                                   </div>
                                                   <!--Email-->


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
                                                                       
                                                                      <input type="text" class="form-control" name="height" id="height" value="<?php echo $school; ?>" required>
                                                        </div>
                                                      </div>


                                                    

                                                   <div class="form-group row">
                                                      <div class="col-md-6 control-label" for="Highest_country">Highest Level Achieved:</div>
                                                      <div class="col-md-6">
                                                             <input type="text" class="form-control" name="height" id="height" value="<?php echo $country; ?>" required>
                                                      </div>
                                                   </div><!--level-->
                                                   <div class="form-group row">
                                                    <div class="col-md-6 control-label" for="Blood_group">Blood Group:</div>
                                                    <div class="col-md-6">
                                                                <input type="text" class="form-control" name="height" id="height" value="<?php echo $bloodgroup; ?>" required>

 
                                                    </div>
                                                  </div><!--bg-->
                                                  <div class="form-group row">

                                                      <div class="col-md-6">
                                                          <label for="Occuption"><h6>Occupation:</h6></label>
                                                        </div>
                                                         <div class="col-md-6">
                                                          <input type="text" class="form-control" name='Occuption' id="Occuption" placeholder="" title="Occuption" value="<?php echo $occupation; ?>">
                                                        </div>
                                                      </div>
                                                       <div class="form-group row">
                                                      <div class="col-md-6">
                                                                    <label ><h6>Coaches Name:</h6></label></div>
                                                                    <div class="col-md-6">
                                                                    <input type="text" class="form-control" name='coach_name' id="coach_name" placeholder="" value="<?php echo $coach_name; ?>">
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">

                                                  <div class="col-md-6">
                                                            <label ><h6>Coaches Mobile Number:</h6></label></div>
                                                          <div class="col-md-6"> <input type="text" class="form-control" name="coach_phone" id="coach_phone" placeholder="" value="<?php echo $coach_phone; ?>" >
                                                  </div>
                                            </div>

                                             
                                         
                                            <div class="form-group row">

                                          <div class="col-md-6">
                                            <label ><h6>Parents Name:</h6></label></div>
                                            <div class="col-md-6">
                                            <input type="text" class="form-control" name='father_name' id="father_name" placeholder="" title="father  name " value="<?php echo $fathername; ?>">
                                              </div>
                                            </div>
                                             <div class="form-group row">
                                              <div class="col-md-6">
                                                  <label ><h6>Contact Number:</h6></label></div>
                                                   <div class="col-md-6">
                                                     <input type="text" class="form-control" name="father_phone" id="father_phone" placeholder="" title="enter your phone number if any." value="<?php echo $faterphone; ?>">
                                              </div>
                          </div>
                                            <div class="form-group row">
                                                  <div class="col-md-6">
                                                     <label for="email"><h6>Email Id: </h6></label></div>
                                                       <div class="col-md-6">
                                                      <input type="text" class="form-control" name="father_email" id="father_email" placeholder="" title="enter your email." value="<?php echo $fatheremail; ?>">
                                                  </div>
                                                </div>
                                                  <div class="form-group row">
                                                  <div class="col-md-6">
                                                <label for="phone"><h6>Occupation: </h6></label></div>
                                                  <div class="col-md-6">
                                              <input type="text" class="form-control" name="father_occupation" id="father_occupation" placeholder="" title="Father Occuption" value="<?php echo $fatheroccupation; ?>">

                                                </div>
                          </div>
                          <div class="form-group row">
                             <div class="col-md-6">Past Sports Experience:</div>
                            
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
                        <center>   <a  href="../admindashboard.php" type="button" name="profile"  id="profile" value="Back"> </a></center>

                                                   </form>
                                                  </div>

                                               </div>
                                             </div>
                                           </div><!-- tab-profile-->
                                      
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>


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
