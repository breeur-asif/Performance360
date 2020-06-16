<?php

session_start();


if($_SESSION["id"] == ""){
	header("Location: login.php");
}
else{

	$name = $_SESSION["name"];

}

include'config.php';

if (isset($_POST['submit'])) {



	 $timepicker = $_POST['timepicker'];
	  $injuryclass = $_POST['injuryclass'];
	 $place_injury = $_POST['place_injury'];

	 	 $activty_phase = $_POST['activty_phase'];
		 $elaborate = $_POST['elaborate'];
	 	 $phase_injury = $_POST['phase_injury'];
	 	 $bodypart_injury = $_POST['bodypart_injury'];

 		 	 $bodypart = $_POST['bodypart'];
		 	  $natural_of_injury = $_POST['natural_of_injury'];
		 	 $natural = $_POST['natural'];
 	 $mechanism_injuly = $_POST['mechanism_injuly'];
			 	  $mechanism = $_POST['mechanism'];
			 	 $first_Aid_given = $_POST['first_Aid_given'];
				 $first_Aid = $_POST['first_Aid'];
				  $given = $_POST['given'];
				 $fname = $_POST['fname'];
				 $designation = $_POST['designation'];
				 $mobile = $_POST['mobile'];
				 	$email = $_POST['email'];
					$by_who_dia = $_POST['by_who_dia'];
					$by_whom = $_POST['by_whom'];
					$dia_what = $_POST['dia_what'];
					 $dia_specail = $_POST['dia_specail'];
					 $treatement = $_POST['treatement'];
					 $treatementsp = $_POST['treatementsp'];
 $medicalif= $_POST['medicalif'];
$medicalne = $_POST['medicalne'];
$Advice_given = $_POST['Advice_given'];
 $advice_injury= $_POST['advice_injury'];
 $adviceprec = $_POST['adviceprec'];
 $advicepre = $_POST['advicepre'];
 $ref = $_POST['ref'];
  $referral = $_POST['referral'];

// $sql = "INSERT INTO `add_injury`(`id`, `timepicker`, `injuryclass`, `place_injury`, `elaborate`, `activty_phase`, `phase_injury`, `bodypart_injury`, `bodypart`, `natural_of_injury`, `natural`, `mechanism_injuly`, `mechanism`, `first_Aid_given`, `first_Aid`, `given`, `fname`, `designation`, `mobile`, `email`, `by_who_dia`, `by_whom`, `dia_what`, `dia_specail`, `treatement`, `treatementsp`, `medicalif`, `medicalne`, `Advice_given`, `advice_injury`, `adviceprec`, `advicepre`, `ref`, `referral`, `cr_date`, `timestamp`) VALUES ('$timepicker','$injuryclass','$place_injury','$elaborate','$activty_phase','$phase_injury','$bodypart_injury','$bodypart','$natural_of_injury','$natural','$mechanism_injuly','$mechanism','$first_Aid_given','$first_Aid','$given','$fname','$designation','$mobile','$email','$by_who_dia','$by_whom','$dia_what','$dia_specail','$treatement','$treatementsp','$medicalif','$medicalne','$Advice_given','$advice_injury','$adviceprec','$advicepre','$ref','$referral',now())";

$sql ="INSERT INTO `add_injury`(`timepicker`, `injuryclass`, `place_injury`, `elaborate`, `activty_phase`, `phase_injury`, `bodypart_injury`, `bodypart`, `natural_of_injury`, `natural`, `mechanism_injuly`, `mechanism`, `first_Aid_given`, `first_Aid`, `given`, `fname`, `designation`, `mobile`, `email`, `by_who_dia`, `by_whom`, `dia_what`, `dia_specail`, `treatement`, `treatementsp`, `medicalif`, `medicalne`, `Advice_given`, `advice_injury`, `adviceprec`, `advicepre`, `ref`, `referral`,`cr_date`) VALUES ('$timepicker','$injuryclass','$place_injury','$elaborate','$activty_phase','$phase_injury','$bodypart_injury','$bodypart','$natural_of_injury','$natural','$mechanism_injuly','$mechanism','$first_Aid_given','$first_Aid','$given','$fname','$designation','$mobile','$email','$by_who_dia','$by_whom','$dia_what','$dia_specail','$treatement','$treatementsp','$medicalif','$medicalne','$Advice_given','$advice_injury','$adviceprec','$advicepre','$ref','$referral',now())";



if (mysqli_query($conn, $sql)) {
    echo "<script> alert('New record created successfully'); </script>";
} else {
     echo "<script> alert('something went wrong '); </script>";
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

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Ultimate Performance</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->


      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i  class="fas fa-fw fa-plus"></i>
          <span>Add New</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
     <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i  class="fas fa-fw fa-plus"></i>
          <span>Add New</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-glass"></i>
          <span>Food Database</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="fo.php">
          <i class="fas fa-fw fa-heartbeat"></i>
          <span>Exercise Database</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="medical_test.php">
          <i class="fas fa-fw fa-stethoscope"></i>
          <span>Medical Test Database</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="competition.php">
          <i class="fas fa-fw fa-line-chart"></i>
          <span>competition</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="medicalreport.php">
          <i class="fas fa-fw fa-file"></i>
          <span>Medical Report</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="adminmedicalreport.php">
          <i class="fas fa-fw fa-inr"></i>
          <span>Admin View medical report</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="injury.php">
          <i class="fas fa-fw fa-pie-chart"></i>
          <span>Injury</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="sport_event.php">
          <i class="fas fa-fw fa-bicycle"></i>
          <span>Sports Events Database</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="questionnaire.php">
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
        <a class="nav-link" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">Add Injury</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-3">
											<div class="card" style="width:auto;">
											  <div class="card-header bg-gray">

							                 <h5>Injury History</h5>
											  </div>


							<br>
							<div class="card-body">



							<br>


											<div class="card" style="width:auto;">
											  <div class="card-header bg-success">
											 <h4>   20/20/2019</h4>
							                 Anterior Cruciate Ligament
											  </div>

											</div>
											<br>
											<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

											<br>

											<div class="card" style="width:auto;">
							  <div class="card-header bg-info">
									<h4> 10/11/2019 </h4>
									 Hamstring Pull
							  </div>
							 </div>


							<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

							<br>
							<div class="card" style="width:auto;">
							  <div class="card-header bg-warning">
							     <h4>12/12/2019 </h4>
							  Delayed Onset Muscle Soreness
							  </div>

							</div>
							<br>
							<br>

							<div class="card" style="width:auto;">
								<div class="card-header bg-success">

											  Add Injury
								</div>
							</div>
							</div>
							</div>
							</div>

							<div class="col-lg-9">

											<div class="row">
									  					<div class="col-lg-12 mb-12">
																<div class="card">

																  <div class="card-body">




<form action="injury.php" method="post">

							<!-- table-->
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

										<tr>
											<th> Date of Injury</th>
											<th>Calendar</th>
										 </tr>
 <tr>
											 <th>Times of Injury</th>
											 <th><div class="md-form">
												 <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker" name="timepicker">
												<label for="input_starttime">12hours</label>
													</div>
											 </th>

										</tr>
										<tr>
							        <th>Injury Classification</th>
							        <th>
													<select name="injuryclass">

													  <option value="New injury">New injury</option>
													  <option value="Recurrent injury(same injury.subsequent incident with  an injury free' period between incidents)">Recurrent injury(same injury.subsequent incident with  an injury free' period between incidents)</option>
														<option value="Exacebated inury[is a recent worsening of anunresolved injury]">Exacebated inury[is a recent worsening of anunresolved injury]</option>
														<option value="illess[Cough/Fever etc]">illess[Cough/Fever etc]</option>
													</select>
											</th>

											</tr>
											<tr>
																<th>Place of Injury</th>
													<th> <select name="place_injury">
																<option value="On Ground While training">On Ground While training</option>
																<option value="On Ground while competition">On Ground while competition</option>
																<option value="Off Ground[E.g Home, School,Etc]">Off Ground[E.g Home, School,Etc]</option>
																<option value="travel">travel</option>
															</select><div>
															Elaborate:<input type="text" id="elaborate" name="elaborate"></div>

														</th>
												</tr>
												<tr>
									        <th>Activity Phase when injury happend</th>
									        <th><select name="activty_phase">
														  <option value="Warm-up">Warm-up</option>
														  <option value="Training">Training</option>
														  <option value="Competation">Competation</option>
														  <option value="Travel">Travel</option>
															<option value="Other Activity">Other Activity</option>
														</select><br>

									        Specify(If other Activity:
													<input type="text"  name="phase_injury">
												</th>
												 </tr>
												 <tr>
		 							        <th>Body  part  Injury</th>
		 							        <th> <select name="bodypart_injury">
		 															  <option value="Head">Head</option>
		 															  <option value="Face">Face</option>
		 															  <option value="Neck">Neck</option>
		 															  <option value="Thorax">Thorax</option>
		 																<option value="Abdomen">Abdomen</option>
		 																<option value="Shoulder">Shoulder</option>
		 															  <option value="Lower Back">Lower Back</option>
		 															  <option value="Pelvis">Pelvis</option>
		 															  <option value="Hip">Hip</option>
		 																<option value="Upper Arm">Upper Arm</option>
		   																<option value="Tigh">Tigh</option>
		 															  <option value="Elbow">Elbow</option>
		 															  <option value="Forearm">Forearm</option>
		 															  <option value="Wirst">Wirst</option>
		 															 	  <option value="Hand">Hand</option>
		 																  <option value="Knee">Knee</option>
		 																  <option value="Ankle">Ankle</option>
		 																  <option value="Foot">Foot</option>
		 																	<option value="Other">other</option>

		 																		</select><br>
		  																	Specify(if other,can choose multiple options):<input type="text" name="bodypart"></th>

		 							      </tr>
												<tr>
												 <th>Natural of injury</th>
																														<th><select name="natural_of_injury">
																				<option value="Bruise">Bruise</option>
																				<option value="Swelling">Swelling</option>
																				<option value="Inflmmtion">Inflmmtion</option>
																				<option value="Blister">Blister</option>

																				<option value="Open Wound">Open Wound</option>
																				<option value="Fracture">Fracture</option>
																				<option value="Dislocaion">Dislocaion</option>

																				<option value="Sprain">Sprain</option>
																				<option value="Strain">Strain</option>
																				<option value="Nerve injury">Nerve injury</option>
																				<option value="Blood">Blood</option>
																				<option value="Vessel injury">Vessel injury</option>
																				<option value="Muscle">Muscle</option>
																				<option value="Tendon">Tendon</option>

																				<option value="Ligament">Ligament</option>
																				<option value="Overuse">Overuse</option>
																				<option value="Crushing injury">Crushing injury</option>
																				<option value="injury to internal Organs">injury to internal Organs</option>



																				<option value="Burn">Burn</option>
																				<option value="Eye injury">Eye injury</option>
																				<option value="Foreign Body">Foreign Body</option>

																				<option value="Head injuly">Head injuly</option>
																				<option value="Detal injuly">Detal injuly</option>
																				<option value="Electric injuly">Electric injuly</option>
																				<option value="Infrction"></option>

																				<option value="Insect bite">Insect bite</option>
																				<option value="Insect bite">Insect bite</option>

																				<option value="Allergy">Allergy</option>
																				<option value="Hyperthermia">Hyperthermia</option>
																				<option value="Fatigue">Fatigue</option>
																				<option value="Cramps">Cramps</option>
																				<option value="Dehydration">Dehydration</option>

																				<option value="other">other</option>

																			</select>
													Special(if Other)<input type="text"  name="natural"></th>

												 </tr>
												 <tr>
										        <th>Mechanism of injury</th>
																						        <th> <select name="mechanism_injuly">
															  <option value="Fall">Fall</option>
															  <option value="Struck">Struck</option>
															  <option value="Hit">Hit</option>
															  <option value="Envirourmentl">Envirourmentl</option>

																<option value="Other">other</option>
															</select>  Explain in detail: <input type="text"   name="mechanism"></th>




										       					</tr>
																		<tr>
								 								   <th>First Aid Given</th>
								 							        <th> <select name="first_Aid_given">
								 												  <option value="None Needed">None Needed</option>
								 												  <option value="None Given">None Given</option>
								 												  <option value="Crutches">Crutches</option>


								 													<option value="Medication">Medication</option>
								 												  <option value="RICER (rest,ice,compression,elevation referral)">RICER (rest,ice,compression,elevation referral)</option>
								 												  <option value="ICE (ice  compression,elevation)">ICE (ice  compression,elevation)</option>
								 												  <option value="None Given">None Given</option>
								 													<option value="ICE">ICE</option>
								 												  <option value="Massage">Massage</option>
								 												  <option value="Strapping/Taping">Strapping /Taping</option>
								 												  <option value="Manual Therapy">Manual Therapy</option>


								 													<option value="Wound Management">Wound Management </option>
								 													<option value="Join Relocated">Join Relocated</option>


								 													<option value="Other">Other</option>

								 												</select> Specify:<input type="text" name="first_Aid"></th>


</tr>
<tr>
 <th>First Aid was Given by</th>
		<th>  <select name="given">
<option value="Self">Self</option>
<option value="Doctore">Doctore</option>
<option value="Physio">Physio</option>
<option value="Medication">Medication</option>

<option value="Trainer">Trainer</option>
<option value="Parent/Guatdian">Parent/Guatdian</option>
<option value="Other">Other</option>


</select>

		Give Name /Designation/Mobile/Email<input type="text" name="fname"><input type="text" name="designation"><input type="number" name="mobile"><input type="email" name="email"></th>

</tr>
<tr>
 <th>By Whom it was Diagnosis</th>
													<th> <select name="by_who_dia">
			<option value="No One">No One</option>
			<option value="Self">Self</option>
			<option value="Doctore">Doctore</option>
			<option value="Physio"></option>
			<option value="Doctore">Doctore</option>
			<option value="Physio"></option>
		</select>
		Specify:<input type="text" id="fname" name="by_whom"></th>

</tr>
<tr>
 <th>What was Diagnosis</th>
		<th>											<input type="text" name="dia_what" value="">
<input type="text"  name="dia_specail"></th>


</tr><tr>
 <th>treatement</th>
		<th>											<input type="text" name="treatement" value="">
<input type="text"  name="treatementsp"></th>


</tr>
<tr>
 <th>Medication if Needed</th>
		<th>											<input type="text" name="medicalif" value=""><input type="text"  name="medicalne"></th>



</tr>
<tr>
<th>Advice given to injured athlete </th>
		<th> <select name="Advice_given">
<option value="Refund to play immediately">Refund to play immediately</option>
<option value="Rest 1-3 days">Rest 1-3 days</option>
<option value="Rest for 3-7 days">Rest for 3-7 days</option>
<option value="Rest 7-14 days">Rest 7-14 days</option>
<option value="Rest for 14 - 28 days">Rest for 14 - 28 days</option>
<option value="Rest for 1 - 3 months">Rest for 1 - 3 months</option>
<option value="Rest for more than 3 months">Rest for more than 3 months</option>

<option value="Other">Other</option>

</select>Specify(If other):<input type="text"  name="advice_injury"></th>

					 </tr>
					 <tr>
						<th>Advice given for precaution </th>
<th><input type="text"  name="adviceprec">What Precautions need to be taken :<input type="text"  name="advicepre"></th>
					</tr>
					<tr>
											<th>Referral</th>
														<th><select name="ref">
					<option value="None Needed">None Needed</option>
					<option value="Physio">Physio</option>
					<option value="Podiatrist">Podiatrist</option>
					<option value="Massage Therapist">Massage Therapist</option>
					<option value="Psychologist">Psychologist</option>
					<option value="Dentist">Dentist</option>
					<option value="Opthalmologist">Opthalmologist</option>

					<option value="Orthopedic Doctor">Orthopedic Doctor</option>
					<option value="Neurologist">Neurologist</option>
					<option value="Endocrinologist">Endocrinologist</option>

					<option value="GeneralPhysician">GeneralPhysician</option>
					<option value="Surgeon">Surgeon</option>
					<option value="Other">Other</option>


				</select>
				Specify(If other):<input type="text" name="referral"></th>

	</tr>

 	             </table>
								</div>
<!-- table end-->
							 <button type="submit"  name ="submit" class="btn btn-primary">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-secondary">Back</button>



</form>

							</div>







																  </div>
																</div>





							      						</div>
												</div>





							</div>
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
	<script>
	$('#input_starttime').pickatime({});</script>
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
