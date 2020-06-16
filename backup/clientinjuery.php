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

  <title>Enjury Form</title>

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
						<li class="nav-item active">
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
			      <li class="nav-item">
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
			<div class="col-lg-2">
				<div class="card" style="width: 18rem;">
				  <div class="card-header bg-success">

                 <h2>Injury History</h2>
				  </div>


<br>
<div class="card-body">



<br>


				<div class="card" style="width:auto;">
				  <div class="card-header bg-success">
				 <h2>   20/20/2019</h2>
                 GMAAA
				  </div>

				</div>
				<br>
				<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

				<br>

				<div class="card" style="width:auto;">
  <div class="card-header bg-info">
		<h2> 10/11/2019 </h2>
		 MSAAA Swimming Competation
  </div>
 </div>


<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

<br>
<div class="card" style="width:auto;">
  <div class="card-header bg-warning">
     <h2>12/12/2019 </h2>
   National Swimming Championship
  </div>

</div>
<br>
<br>

<div class="card" style="width:auto;">
	<div class="card-header bg-success">

				 Injury
	</div>
</div>
</div>
</div>

</div>

<div class="col-lg-7">

				<div class="row">
		  					<div class="col-lg-12 mb-12">
									<div class="card">
									  <div class="card-header">
									    Add Injury
									  </div>
									  <div class="card-body">






<!-- table-->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th> Date of Injury</th>
        <th>Calendar</th>
        <th colspan="5"></th>

      </tr>
    </thead>

    <tbody>
      <tr>
        <th>Times of Injury</th>
        <th>Time</th>
        <th> Hr/Min</th>
        <th colspan="4">AM/PM</th>

      </tr>
      <tr>
        <th>Injury Classification</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th></th>
<th colspan="4">
		<ul>
		<li> New injury</li>
		<li> Recurrent injury(same injury.subsequent incident with  an injury free' period between incidents)</li>
		<li> Exacebated inury[is a recent worsening of anunresolved injury]</li>
		<li> illess[Cough/Fever etc]</li>
</ul>



		</th>

       </tr>
      <tr>
        		<th>Place of Injury</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th> Elaborate</th>
      <th colspan="4">
		<ul>
		<li>On Ground While training</li>
		<li>On Ground while competition</li>
		<li>Off Ground[E.g Home, School,Etc]</li>
		<li> travel</li>
		</ul>



		</th>

      </tr>
      <tr>
        <th>Activity Phase when injury happend</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify(If other Activity</th>
        <th>
		<ul>
		<li> Warm-up</li>
		<li>Training</li>
		<li>Competation</li>
		<li>Travel</li>
		<li>Other Activity</li>
		</ul>



		</th>

      </tr>
      <tr>
        <th>Body  part  Injury</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify(if other,can choose multiple options)</th>
        <th>
		<ul>
		</li>Head</li>
		<li> Face</li>
		<li> Neck</li>
		<li>Thorax</li>
		<li>Abdomen</li>
		</ul>
	 </th>
        <th>
		<ul>
		<li>Shoulder</li>
		<li> Lower Back</li>
		<li>Pelvis</li>
		<li>Hip</li>
		<li>Upper Arm</li>
		</ul>


		</th>
        <th><ul>
		<li>Tigh</li>
		<li>Elbow</li>
		<li>Forearm</li>
		<li>Wirst</li>
		<li>Hand</li>
		</ul>
		</th>
         <th>
		 <ul>
		<li>Knee</li>
		<li>Lower Leg</li>
		<li>Ankle</li>
		<li>Foot</li>
		<li>Oher</li>
		</ul>


		 </th>

        <th></th>
      </tr>
      <tr>
       <th>Natural of injury</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th> Special(if Other)</th>
        <th
<ul>
		<li>Bruise</li>
		<li>Swelling</li>
		<li>Inflmmtion</li>
		<li>Blister</li>
		<li>Open Wound</li>
		<li>Fracture</li>
		<li>Dislocaion</li>
		<li>Sprain</li>
		<li>Strain</li>

		</ul>		</th>
        <th><ul>
		<li>Nerve injury</li>
		<li>Blood</li>
		<li>Vessel injury</li>
		<li>Muscle</li>
		<li>Tendon</li>
		<li>Ligament</li>
		<li>Overuse</li>
		<li>Crushing injury</li>
		</ul> </th>
        <th><ul>
		<li>injury to internal Organs</li>
		<li>Burn</li>
		<li>Eye injury</li>
		<li>Foreign Body </li>
		<li>Head injuly</li>
<li>Detal injuly</li>
<li>Electric injuly</li>
		</ul></th>
         <th><ul>
		<li>Infrction</li>
		<li>Insect bite </li>
		<li>Allergy</li>
		<li>Hyperthermia</li>
		<li>Fatigue</li>
		<li>Cramps</li><li>Dehydration</li><li>Other</li>
		</ul></th>

        <th></th>

       </tr>
	   <tr>
        <th>Mechanism of injury</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th> Explain in detail</th>
        <th>
		<ul>
		<li>Fall</li>
		 		<li> Struck</li>
		<li>Hit</li>
<li>Envirourmentl</li>
		<li> other</li>
</ul>



		</th>

       </tr>
	   <tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr><tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr>
		<tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr>
		<tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr>
		<tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr>
		<tr>
	   <th>First Aid Given</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> None Needed</li>
		<li>None Given</li>
		<li>Crutches</li>
		<li>Medication</li>
		<li>RICER (rest,ice,compression,elevation referral)</li>
		<li> ICE (ice  compression,elevation)</li>
		<li>None Given</li>
		</ul>
		</th>
		<th>
		<ul>
		<li> ICE</li>
		<li>Massage</li>
		<li>Strapping /Taping</li>
		<li>Manual Therapy</li>
		<li> Wound Management </li>
		<li> Join Relocated</li>
		<li> Other</li>
		</ul>
		</th>
		</tr>
		<tr>
	   <th>First Aid was Given by</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Give Name /Designation/Mobile/Email</th>
        <th>
		<ul>
		<li>Self</li>
		<li>Doctore</li>
		<li>Physio</li>
		<li>Medication</li>

		</th>
		<th>
		<ul>
		<li>Trainer</li>
		<li>Parent /Guatdian</li>
		<li>  Other</li>

		</ul>
		</th>
		</tr>
		<tr>
	   <th>By Whom it was Diagnosis</th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify</th>
        <th>
		<ul>
		<li> No One</li>
		<li>Self</li>
		<li>Doctore</li>
		<li>Physio</li>
		</ul>
		</th>
		<th>
		<li>Doctore</li>
		<li>Physio</li>
		</th>
		</tr>
		<tr>
	   <th>What was Diagnosis</th>
        <th>											<input type="text" name="name" value="">
</th>
        <th>Specify</th>
        <th>

		</th>
		<th>
		<ul>

		</th>
		</tr>
		<tr>
	   <th>Treatementt</th>
		 <th>											<input type="text" name="name" value="">
</th>
        <th>Specify</th>
        <th>

		</th>
		<th>
		<ul>

		</th>
		</tr>
		<tr>
		<th>Advice given for precaution </th>
        <th><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul>
  </div></th>
        <th>Specify(If other)</th>
        <th>
		<ul>
		<li> Refund to play immediately</li>
		<li>Rest 1-3 days</li>
		<li>Rest for 3-7 days</li>
		<li>Rest 7-14 days</li>

		</ul>
		</th>
		<th>

		</th>
	</tr>
		</tbody>
  </table>
</div>



 <button type="button" class="btn btn-primary">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-secondary">Back</button>





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
