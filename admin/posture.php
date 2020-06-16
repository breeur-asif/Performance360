<?php
error_reporting(0);
session_start();

include "dbconfig.php";
// session_destroy();

if($_SESSION["adminid"] == ""){
	header("Location: login.php");
}
else{


	 $name = $_SESSION["adminname"];

}
if (isset($_POST['submit'])) {
//   print_r($_POST);
// die;



$posture_report_file = $_POST['posture_report_file'];
  $walking_gait_report_file = $_POST['walking_gait_report_file'];

  $running_gait_report_file = $_POST['running_gait_report_file'];
   $other_report_file = $_POST['other_report_file'];
  // $description = $_POST['description'];





$sql= "INSERT INTO `posture`(`posture_report_file`, `walking_gait_report_file`, `running_gait_report_file`, `other_report_file`, `cr_date`) VALUES ('$posture_report_file','$walking_gait_report_file','$running_gait_report_file','$other_report_file',now())";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
















mysqli_close($conn);
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

  <title>Exercise Database</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  	
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Welcome  <?php echo $name ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php include'adminheader.php' ?>
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
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Exercise Database</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body"><!--card start-->
											         <div class="row">
										
										            
										            <div class="col-lg-12 mb-12">
											            <div class="card">
										 
										  <div class="card-body"> <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th>Posture Report</th>
                      <th> Walking Gait Report</th>
                        <th>Running Gait Report </th>
                        <th>Other Report</th>
                        
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "P360";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

                                          $sql = "SELECT *  FROM posture ";
                                          $result = mysqli_query($conn, $sql);
                                          // echo $result;
                                          //  die;
                                          if (mysqli_num_rows($result) > 0) {
                                              // output data of each row
                                              while($row = mysqli_fetch_assoc($result)) {
                                                  echo "<tr>
                                                  
                                                  <td>" . $row["posture_report_file"] . "</td>
                                                  <td>" . $row["walking_gait_report_file"] . "</td>
                                                  <td>" . $row["running_gait_report_file"] . "</td>
                                                   <td>" . $row["other_report_file"] . "</td>
                                                   
                                                  
                                                  
                                                          
                                                           

                                                        </tr>";
                                              }
                                          }

                                      ?>
                                       
   


                   
                  </tbody>
                </table>
              </div>


										 
										  </div>
										</div></div>
										             
										</div>
	   <!--- table Information-->   
	   <!--- insert Information-->
     <br>
     <br>
	   <h2>Add Posture Report</h2>
	     <div class="row">
	     	
	     	
	     	

            <!-- Content Column -->
            <div class="col-lg-6 mb-6">    
	          <form action="posture.php" method="post">
                                                     <div class="form-group row">

                                                             <div class="col-md-6">
                                                               <label for="first_name"><h6> Upload Posture Report:</h6></label></div>
                                                               <div class="col-md-6">
                                                        <input name="posture_report_file" type="file" placeholder="Logo" class="form-control input-md" required=""><br>
                                                             </div>
                                                   </div><!--Name-->  
                                                  
                                                   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="dob"><h6>Upload Walking Gait Report:</h6></label></div>
                                                        <div class="col-md-6">
                                                       <input name="walking_gait_report_file" type="file" placeholder="Logo" class="form-control input-md" required=""><br></div>
                                                      </div>
                                                       <div class="form-group row">

                                                      <div class="col-md-6">
                                                         <label for="dob"><h6>Upload Running Gait Report:</h6></label></div>
                                                             <div class="col-md-6">
                                                        <input name="running_gait_report_file" type="file" placeholder="Logo" class="form-control input-md" required=""><br>
                                                        </div>

                                                   </div> <!-- DOB-->
                                                  
                                                   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6>Upload Other Report:</h6></label></div>
                                                        <div class="col-md-6">
                                                        <input name="other_report_file" type="file" placeholder="Logo" class="form-control input-md" required=""><br>
                                                        </div>
                                                      </div>
                                                        
                                                            
	         </div>
	         <div class="col-lg-6 mb-6">    
	    <button type="submit" class="btn btn-primary" name="submit">Save</button>
<button type="button" class="btn btn-secondary">Back</button>
</form>
	         </div>
	           
	         </div>
	             <!--- End  insert Information--> 
	            </div><!-- end End-->
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

<script>

$('.member_id').click( function (){

// window.location.replace("/questionnaire.php?" );
 window.location.replace("questionnaire.php?u_idl=" + $(this).attr("member_id")); 
              

});

</script>


</body>

</html>
