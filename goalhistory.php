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
         <?php   include "header.php"; ?>

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
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
            <!--     <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
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
            <h1 class="h3 mb-0 text-gray-800">    Goal History </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">
 <!--- 1st  nav-->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
             <!-- start page -->
             <div class="container-fluid">
           
            
   <div class="row">
  <div class="col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>user</th>
                <th>Term</th>
                <th>Goal</th>
                <th>Start Date</th>
                <th>Goal End Date </th>
                <th>Reminder</th>
                <th>Specfic</th>
                
                        </tr>
                    </thead> <tbody>
                                <?php

                                        $sql = " SELECT g.user_id, g.term, g.goal, g.duration, g.reminder, g.specfic, g.cr_date,u.fname  FROM  goal g  inner join users u on u.id=g.user_id  WHERE g.user_id = $user_id and history = 1";
                                  
                                    $result = mysqli_query($conn, $sql);
                                    // echo $sql;
                                    // die;
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                          
                                          if($row["term"] == 1){
                                            $terms = 'Short Term Goal';
                                          }else if($row["term"] == 2){
                                             $terms = 'Medium Term Goal';
                                          }else if($row["term"] == 3){
                                             $terms = 'Long Term Goal';
                                          }
                                       
                                          
                                            echo "<tr>
                                                  
                                                    <td>" . $row["fname"] . "</td>
                                                    <td>" . $terms . "</td>
                                                    <td>" . $row["goal"] . "</td>
                                                       <td>" . date("d-m-Y", strtotime($row["cr_date"] )) . "</td>
                                                    <td>" . date("d-m-Y", strtotime($row["duration"])). "</td>
                                                     <td>" . $row["reminder"] . "</td>
                                                      <td>" . $row["specfic"] . "</td>
                                                 
                                                   
                                                  
                                                  
                                                  </tr>";
                                        }
                                    }
                                
                                ?>
                            </tbody>

                </table>









           </div>
          </div>
             <!-- end page -->
              </div>


              <center><a class="btn btn-primary" href="goal.php "> Back </a></center>


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
  <script src=" vendor/jquery/jquery.min.js"></script>

 
  <script src=" vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src=" vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src=" js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src=" vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src=" js/demo/chart-area-demo.js"></script>
  <script src=" js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src=" vendor/datatables/jquery.dataTables.min.js"></script>
  <script src=" vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src=" js/demo/datatables-demo.js"></script>





</body>

</html>
