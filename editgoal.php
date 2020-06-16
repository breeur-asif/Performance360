<?php
error_reporting(0);
session_start();
include "config.php";

$user_id = $_SESSION['id'];

if(isset($_GET['term'])){
$te = $_GET['term']; 

}

  

if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{

  $name = $_SESSION["name"];

}


$sql1 = "select * from goal where user_id = $user_id and term = $te and history = 0 "; 

$resultgoal = mysqli_query($conn, $sql1);


while($goaldata = mysqli_fetch_assoc($resultgoal)){

$goal  = $goaldata['goal'];
$duration  = $goaldata['duration'];
$reminder  = $goaldata['reminder'];
$specfic  = $goaldata['specfic'];
$measurable  = $goaldata['measurable'];
$agree  = $goaldata['agree'];
$realistic  = $goaldata['realistic'];
$time_base  = $goaldata['time_base'];
$excted  = $goaldata['excted'];
$recorded  = $goaldata['recorded'];
$strength_pos  = $goaldata['strength_pos'];
$weaknesses_neg  = $goaldata['weaknesses_neg'];
$opp_pos  = $goaldata['opp_pos'];
$threats_neg  = $goaldata['threats_neg'];
$goal_id  = $goaldata['goal_id'];

}


if (isset($_POST['submit'])) {
  
       $goalid= $_POST['goalid'];
       $te= $_POST['term'];
       $goal = $_POST['lname'];
       $duration = $_POST['duration'];
      $reminder = $_POST['reminder'];
      $specfic = $_POST['specfic'];
      $measurable = $_POST['measurable'];
      $agree = $_POST['agree'];
      $realistic = $_POST['realistic'];
      $time_base = $_POST['time_base'];
      $excted = $_POST['excted'];
      $recorded = $_POST['recorded'];
      $strength_pos = $_POST['strength_pos'];
      $weaknesses_neg = $_POST['weaknesses_neg'];
      $opp_pos = $_POST['opp_pos'];
      $threats_neg = $_POST['threats_neg'];
      $weakness = $_POST['weakness'];
      $opportunity = $_POST['opportunity']; 
      $threads = $_POST['threads'];

   
if( $goalid > 0 ){
$sql = "UPDATE `goal` SET `goal`='$goal',`duration`='$duration',`reminder`='$reminder',`specfic`='$specfic',`measurable`='$measurable',`agree`='$agree ',`realistic`='$realistic',`time_base`='$time_base',`excted`='$excted',`recorded`='$recorded',`strength_pos`='$strength_pos',`weaknesses_neg`='$weaknesses_neg',`opp_pos`='$opp_pos',`threats_neg`='$threats_neg' WHERE goal_id = $goalid";


if (mysqli_query($conn, $sql)) {
    echo " record updated successfully";
    
     header("location: goal.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}else {



    $sql = "INSERT INTO `goal`(`user_id`,`term`,`goal`, `duration`, `reminder`, `specfic`, `measurable`, `agree`, `realistic`, `time_base`, `excted`, `recorded`, `strength_pos`, `weaknesses_neg`, `opp_pos`, `threats_neg`,`cr_date`) VALUES ($user_id ,'$te','$goal','$duration','$reminder','$specfic','$measurable','$agree','$realistic','$time_base','$excted','$recorded','$strength_pos','$weaknesses_neg','$opp_pos','$threats_neg',now())";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
     header("location: goal.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

  // echo "<script> alert('please select term from goal ');  </script>";
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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script> -->

<style>

textarea {

	width: 100%;
}
	
	.td1{

	}
	.td2{
		
	}
	.td3{
			width: 50%
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
        <div class="sidebar-brand-text mx-3"> Performance 360</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
       <?php   include'header.php' ?>
 
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
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Profile-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Settings-->
                <!--</a>-->
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                <!--<div class="dropdown-divider"></div>-->
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
            <h1 class="h3 mb-0 text-gray-800">Goal</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <form action="editgoal.php" method="post">
                <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                   
                     
                    <tbody>
                      
                         
                      <tr>
                          
                         <td class="td1" > Goal</td>
                        <td class="td2" > </td>
                        <td class="td3"> 
                        <textarea rows="4"  type="text" name="lname" id="s1at" /><?php echo $goal; ?> </textarea>
                         </td>
       <input type="hidden" id="termid" name="term" value = '<?php  echo $_GET['term'] ?>' >
       <input type="hidden" name="goalid" value = '<?php  echo $goal_id  ?>' >
                      </tr>
                    </tr>
                        <td class="td1" > Deadline</td>
                        <td class="td2" >Weeks / Months </td>
                        <td class="td3"> <input type="date" id="lname" name="duration" value='<?php echo $duration ?>'></td>
                         </tr>
                    </tr>
                        <td class="td1"> Reminder</td>
                        <td class="td2"> How Frequently you want this to remind yourself</td>
                        <td class="td3"><select name="reminder" style="width:47%">
                                              <option value="Daily">Daily</option>
                                              <option value="Once a Week">Once a Week</option>
                                              <option value="Twice a Week">Twice a Week</option>
                                              <option value="Thrice a Week">Thrice a Week</option>
                                              
                                            </select>
                        
                        
                        
                        
                         <!-- <input type="text"  name="reminder" value='<?php echo $reminder ?>'></td> -->
                         </tr>
                    </tr>
                        <td class="td1">Specific </td>
                        <td class="td2">What do you want to achieve in your sport? </td>
                        <td class="td3"> 
                        <textarea  rows="3" type="text" name="specfic"  /><?php echo $specfic; ?> </textarea>
                        
                        </td>
                         </tr>
                    </tr>
                        <td class="td1">Measurable </td>
                        <td class="td2">How will you know when you have achieved it? </td>
                        <td class="td3">
                        <textarea rows="3"  type="text" name="measurable" id="s1at" /><?php echo $measurable; ?> </textarea>
                         
                           </td>
                         </tr>
                    </tr>
                        <td class="td1"> Agreed</td>
                        <td class="td2"> Do you and your coach agree on the goal?</td>
                        <td class="td3">
                       <textarea rows="3"  type="text" name="agree"  /><?php echo $agree; ?> </textarea>  
                         
                           </td>
                         </tr>
                    </tr>
                        <td class="td1">Realistic </td>
                         <td class="td2" > Are you just dreaming? -Why</td>
                         <td class="td3">
                      <textarea rows="3"  type="text" name="realistic" /><?php echo $realistic; ?> </textarea>    
                          
                           </td>
                          </tr>
                    </tr>
                        <td class="td1">Time Based </td>
                        <td class="td2">When? Today? Tomorrow?  </td>
                        <td class="td3"> 
                        <textarea rows="3"  type="text" name="time_base" /><?php echo $time_base; ?> </textarea>
                        
                        </td>
                      </tr>
                       <tr>
                         <td class="td1">Exciting</td>
                         <td class="td2">Are the goals going to keep you motivated? </td>
                         <td class="td3"> 
                      <textarea rows="3"  type="text" name="excted" id="s1at" /><?php echo $excted; ?> </textarea>   
                        
                         </td> </tr>
                    </tr>
                        <td class="td1">Recorded </td>
                        <td class="td2"> How and when will you do this? </td>
                        <td class="td3">
                        <textarea rows="3"  type="text" name="recorded"  /><?php echo $recorded; ?> </textarea> 
                         
                           </td> </tr>
                    </tr>
                        <td class="td1"> Strength ( Positive )</td>
                        <td class="td2"> What are you good at?</td>
                        <td class="td3">
                      <textarea rows="3"  type="text" name="strength_pos" /><?php echo $strength_pos; ?> </textarea>    
                            
                           </td> </tr>
                    </tr>
                        <td class="td1">Weaknesses ( Negative )</td>
                        <td class="td2">What area do you need to develop?</td> 
                  <td class="td3">
                     <textarea rows="3"  type="text" name="weaknesses_neg" /><?php echo $weaknesses_neg; ?> </textarea>
                     <!--<input type="text"  name="weaknesses_neg" value='<?php echo $weaknesses_neg ?>'>-->
                     </td> </tr>
                    </tr>
                        <td class="td1">Opportunities ( Position ) </td>
                        <td class="td2">What opportunities available to you? </td>
                        <td class="td3">
                         <textarea rows="3"  type="text" name="opp_pos" /><?php echo $opp_pos; ?> </textarea> 
                           <!--<input type="text"  name="opp_pos" value='<?php echo $opp_pos ?>'>-->
                           </td>
                      </tr>
                      <tr>
                        <td class="td1">Threats ( Negative )</td>
                         <td class="td2" >What factors are there that may be a barrier to you achieving this goal?</td><td class="td3"> 
                        <textarea rows="3"  type="text" name="threats_neg" /><?php echo $threats_neg; ?> </textarea>  
                         <!--<input type="text"  name="threats_neg" value='<?php echo $threats_neg ?>'>-->
                         
                         </td>
                      </tr>

                        
                       
                       
                    </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>&nbsp;&nbsp;
                  <a class="btn btn-primary" href="goal.php "> Back </a>


              </form>

              <button style="margin-top: -35px;"  class="btn btn-success float-right" name="goal_complete" id="<?php echo $user_id ?>"  onclick="historygoal(this)"  >Goal Completed</button>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

<script type="text/javascript">


  function historygoal(el){

alert('herer');
    var user_id = el.id;
    var termid = $('#termid').val();


$.ajax({
    type: 'post',
    url: 'functions/goalhistory.php',
  
    
    data : { 'termid' : termid,'user_id' : user_id },
    success: function (data) {
   if(data ==1){
     window.location.href = "goalhistory.php";
   }else{

window.location.href = "goal.php";
   }
    }

  });


  }


</script>

</body>

</html>
