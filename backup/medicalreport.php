<?php

session_start();

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

  <title>Competition Calendar (Client View)</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2">
				<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

						<!-- Sidebar - Brand -->
						<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
							<div class="sidebar-brand-text mx-3">Ultimate Performance</div>
						</a>

						<!-- Divider -->
						<hr class="sidebar-divider my-0">

						<li class="nav-item">
			        <a class="nav-link" href="dashboard.php">
			          <i class="fas fa-fw fa-tachometer-alt"></i>
			          <span>Dashboard</span></a>
			      </li>

			      <!-- Nav Item - Tables
			      <li class="nav-item">
			        <a class="nav-link" href="#">
			          <i  class="fas fa-fw fa-plus"></i>
			          <span>Add New</span></a>
			      </li

			   Nav Item - Tables
			      <li class="nav-item">
			        <a class="nav-link" href="#">
			          <i class="fas fa-fw fa-glass"></i>
			          <span>Food Database</span></a>
			      </li>-->

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="fo.php">
			          <i class="fas fa-fw fa-heartbeat"></i>
			          <span>Exercise Database</span></a>
			      </li>

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="sport_event.php">
			          <i class="fas fa-fw fa-stethoscope"></i>
			          <span>Sport Event</span></a>
			      </li>

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="competition.php">
			          <i class="fas fa-desktop"></i>
			          <span>Competition</span></a>
			      </li>


						<!-- Nav Item - Tables -->
						<li class="nav-item">
							<a class="nav-link" href="clientinjuery.php">
								<i class="fas fa-fw fa-heartbeat"></i>
								<span>Injury</span></a>
						</li>
						<!-- Nav Item - Tables -->
						<li class="nav-item">
							<a class="nav-link" href="Injuly-diary.php">
								<i class="fas fa-fw fa-stethoscope"></i>
								<span>Injury Diary</span></a>
						</li>
						<!-- Nav Item - Tables
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-fw fa-users"></i>
								<span>Goal </span></a>
						</li>-->

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="medicalreport.php">
			          <i class="fas fa-fw fa-stethoscope"></i>
			          <span>Medical Report</span></a>
			      </li>

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="adminmedicalreport.php">
			          <i class="fas fa-fw fa-file"></i>
			          <span>Admin View medical report</span></a>
			      </li>

						<!-- Nav Item - Tables -->
			      <li class="nav-item active">
			        <a class="nav-link" href="medical_test.php">
			          <i class="fas fa-fw fa-file"></i>
			          <span>Medical Report Test</span></a>
			      </li>





			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="#">
			          <i class="fas fa-fw fa-users"></i>
			          <span>Club Data</span></a>
			      </li>

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="exerciseprescription.php">
			          <i class="fas fa-fw fa-file"></i>
			          <span>Exercise Prescription</span></a>
			      </li>

			      <!-- Nav Item - Tables -->
			      <li class="nav-item">
			        <a class="nav-link" href="Injuly-diary.php">
			          <i class="fas fa-fw fa-file"></i>
			          <span>Diet Prescription</span></a>
			      </li>
						<!-- Divider -->
						<hr class="sidebar-divider d-none d-md-block">

						<!-- Sidebar Toggler (Sidebar) -->
						<div class="text-center d-none d-md-inline">
							<button class="rounded-circle border-0" id="sidebarToggle"></button>
						</div>

					</ul>
 </div>
			<div class="col-lg-3">
			<div class="card" style="width: auto;">
				  <div class="card-header bg-success">
				 <h2>                    Medical Report
</h2>
				  </div>

				</div><br>


<br>


				<div class="card" style="width: auto;">
				  <div class="card-header bg-success">
				 <h2>  Upload a Medical Report</h2>

				  </div>

				</div>
				<br>
				<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

				<br>

				<div class="card" style="width: auto;">
  <div class="card-header bg-info">
		<h2> See  Past Medical Report </h2>
   </div>





 </div>


<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

<br>
<div class="card" style="width: auto;">
  <div class="card-header bg-warning">
     <h2> Schedule a Medical Test </h2>
   </div>

</div>



 </div>

<div class="col-lg-7">

				<div class="row">
		  					<div class="col-lg-12 mb-12">
									<div class="card">
									  <div class="card-header">		 <h2>                    Medical Report
								</h2>
 									  </div>
									  <div class="card-body">



				<!-- 					  <div class="card" style="width: auto;">
				  <div class="card-header bg-success"> -->

											<!--<div class="form-group row">
												<label class="col-md-2 control-label" for="selectbasic">Competation Name:</label>
												<div class="col-md-10">
											<input type="text" name="name" value="">
												</div>
											</div>-->


											<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>

        <th>Date</th>
        <th>Report  Name(one can view Report by Clicking  the file</th>

      </tr>
    </thead>

    <tbody>

	  <tr>
        <td>01/11/2019</td>
        <td>Complete Blood Count </td>

      </tr>
	   <tr>
        <td>14/10/2019</td>
        <td>Thyroid </td>

      </tr>
      <tr>
        <td>18/02/2019</td>
        <td>Complete Blood Count </td>


      </tr>

    </tbody>
  </table>
</div>






<!-- 2nd -->
<div class="form-group row">
<label class="col-md-3 control-label" for="selectbasic">Test Date   </label>
<div class="col-md-3">
<input type="text" name="name" value="">
</div>
<label class="col-md-2 control-label" for="selectbasic">Test</label>

<div class="col-md-4">
<input type="text" name="name" value="">
</div>
</div>
<diV>
Add Test:
</div>

<center>
<button type="button" class="btn btn-primary">Save</button>

<button type="button" class="btn btn-secondary">Back</button>

</center>



</div>







									  </div>
									</div>





      						</div>
					</div>





</div>
</div>
</div>









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


	<a class="scroll-to-top rounded" href="dashboard.php">
    <i class="fas fa-user"></i>
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
