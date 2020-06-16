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
}




$sql1 = "select * from goal where user_id = $user_id and term = 1 and history = 0"; 

$resultgoal = mysqli_query($conn, $sql1);


while($goaldata = mysqli_fetch_assoc($resultgoal)){

$goal  = $goaldata['goal'];
$duration  = $goaldata['duration'];
$duration1  =  date("d-m-Y", strtotime($duration ) );


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
$cr_date  = $goaldata['cr_date'];
$cr_date1  =  date("d-m-Y", strtotime($cr_date ) );

}


$sql2 = "select * from goal where user_id = $user_id and term = 2"; 

$resultgoal2 = mysqli_query($conn, $sql2);


while($goaldata = mysqli_fetch_assoc($resultgoal2)){

$goal2  = $goaldata['goal'];


$duration2  = $goaldata['duration'];
$duration5  =  date("d-m-Y", strtotime($duration2 ) );

$reminder2  = $goaldata['reminder'];
$specfic2  = $goaldata['specfic'];
$measurable2  = $goaldata['measurable'];
$agree2  = $goaldata['agree'];
$realistic2  = $goaldata['realistic'];
$time_base2  = $goaldata['time_base'];
$excted2  = $goaldata['excted'];
$recorded2  = $goaldata['recorded'];
$strength_pos2  = $goaldata['strength_pos'];
$weaknesses_neg2 = $goaldata['weaknesses_neg'];
$opp_pos2  = $goaldata['opp_pos'];
$threats_neg2  = $goaldata['threats_neg'];
$goal_id2  = $goaldata['goal_id'];
$cr_date2  = $goaldata['cr_date'];
$cr_date5  =  date("d-m-Y", strtotime($cr_date2 ) );
}


$sql3 = "select * from goal where user_id = $user_id and term = 3"; 

$resultgoal3 = mysqli_query($conn, $sql3);


while($goaldata = mysqli_fetch_assoc($resultgoal3)){

$goal3  = $goaldata['goal'];

$duration3  = $goaldata['duration'];
$duration7  =  date("d-m-Y", strtotime($duration3 ) );

$reminder3  = $goaldata['reminder'];
$specfic3  = $goaldata['specfic'];
$measurable3  = $goaldata['measurable'];
$agree3  = $goaldata['agree'];
$realistic3  = $goaldata['realistic'];
$time_base3  = $goaldata['time_base'];
$excted3  = $goaldata['excted'];
$recorded3  = $goaldata['recorded'];
$strength_pos3  = $goaldata['strength_pos'];
$weaknesses_neg3  = $goaldata['weaknesses_neg'];
$opp_pos3  = $goaldata['opp_pos'];
$threats_neg3  = $goaldata['threats_neg'];
$goal_id3  = $goaldata['goal_id'];
$cr_date3  = $goaldata['cr_date'];
$cr_date7  =  date("d-m-Y", strtotime($cr_date3 ) );
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

  <title>Goal</title>

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
             <!--    <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
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
            <h1 class="h3 mb-0 text-gray-800">Goals</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
            

                   <div class="col-lg-12" style="text-align:center">
                 <a href="editgoal.php?term=1" title="Edit Short Term Goal" > 
                    <div class="card getdata"  style="width: auto;">
                        <div class="card-header bg-success">
                       <h5>     Short Term Goal 
              </h5>

              <h5>  <?php echo $goal ?></h5>
               <h5>Start Date : <?php echo $cr_date1 ?></h5>
              <h5>  Deadline : <?php echo $duration1 ?></h5>
                        </div>

                      </div></a>
                      <center><img src="arrow.png" ></center><br><br>

         <a href="editgoal.php?term=2" title="Edit Medium Term  Goal" > 
                       <div class="card getdata"  style="width: auto;">
                        <div class="card-header" style="background-color:#7FD8BE;margin-top:-36px">
                       <h5>     Medium Term Goal 
              </h5>

              <h5> <?php echo $goal2 ?></h5>
              <h5> Start Date : <?php echo $cr_date5 ?></h5>
              <h5> Deadline : <?php echo $duration5 ?></h5>
                        </div>

                      </div> </a> <center><img src="arrow.png" ></center><br><br>    


                     <a href="editgoal.php?term=3" title="Edit Long Term Goal">       <div class="card getdata"  style="width: auto;" >
                        <div class="card-header" style="background-color:#A1FCDF;margin-top:-36px">
                       <h5>     Long Term Goal 
              </h5>

              <h5> <?php echo $goal3 ?></h5>
              <h5>Start Date :<?php echo $cr_date7 ?></h5>
              <h5>Deadline : <?php echo $duration7 ?></h5>
                        </div>

                      </div> </a><center><img src="arrow.png" ></center><br><br> 

    <a href="goalhistory.php" title="Edit Long Term Goal">       <div class="card getdata"  style="width: auto;" >
                        <div class="card-header" style="background-color:lightgray;margin-top:-36px">
                       <h5>      Goal history
              </h5>

         
                        </div>

                      </div> </a>

                    </div>
               
              </div>
            </div>

<!-- DataTales Example -->
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

</body>

</html>
