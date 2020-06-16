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

  <title>Formula</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
            <h1 class="h3 mb-0 text-gray-800">Body Composition Assessment </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body">
	              <div class="table-responsive">



<center><h1>Form</h1></center>  
<div >
  <div class="col-md-6">




      Your Name: <input type="text" name="first_name"/><br>
      Age: <input type="text" name="age" id="age" value="13.27"/><br>
      Height (Cm): <input style="margin-top:10px;" type="text" name="Height" id="Height" value="159.3"  /><br>



      Weight (KG): <input style="margin-top:10px;" type="text" name="Weight" id="Weight" value="52.6" /><br>
      Systolic BP: <input style="margin-top:10px;" type="text" name="SysBP" id="SysBP" value="120" /><br>
      Diastolic BP: <input style="margin-top:10px;" type="text" name="DiastBP" id="DiastBP" value="80" /><br>
      Pulse: <input style="margin-top:10px;" type="text" name="Pulse" id="Pulse" value="60" /><br>
      Biceps Skinfold: <input style="margin-top:10px;" type="text" name="BS"  id="BS" value="13.8" /><br>
      Triceps Skinfold: <input style="margin-top:10px;" type="text" name="TS" id="TS" value="21.6" /><br>
      Subscapular Skinfold: <input style="margin-top:10px;" type="text" name="SS" id="SS"  value="20.4" /><br>
      Pectorial Skinfold: <input style="margin-top:10px;" type="text" name="PS" id= "PS" value="20" /><br>  
      Midaxillary Skinfold: <input style="margin-top:10px;" type="text" name="MS"  id="MS" value="20" /><br>
      Suprailiac Skinfold: <input style="margin-top:10px;" type="text" name="SSold" id="SSold"  value="17.2" /><br>
      Abdominalis Skinfold: <input style="margin-top:10px;" type="text" name="AS" id="AS"  value="35.6" /><br>
      Thigh Skinfold: <input style="margin-top:10px;" type="text" name="TighhS" id="TighhS" value="20.4"  /><br>
      Calf Skinfold: <input style="margin-top:10px;" type="text" name="CalfS" id="CalfS" value="20"  /><br>
      Head Circumfarance: <input style="margin-top:10px;" type="text" name="HC" id="HC" value="55"  /><br> 
    
      Neck Circumfarance: <input style="margin-top:10px;" type="text" name="NC" id="NC" value="30" /><br>

      Arm Relaxed Circumfarance: <input style="margin-top:10px;" type="text" name="ARC" id="ARC" value="25.4" /><br>
       </div>
     <div class="col-md-6">
      Arm Flexed Circumfarance: <input style="margin-top:10px;" type="text" name="AFC" id="AFC" value="26.8" /><br>
      Forearm Circumfarance: <input style="margin-top:10px;" type="text" name="FC" id="FC" value="21" /><br>
      Wrist Circumfarance: <input style="margin-top:10px;" type="text" name="WC" id="WC" value="14" /><br>
      Chest Circumfarance: <input style="margin-top:10px;" type="text" name="CC" id="CC" value="89.4" /><br>
  
      Waist Circumfarance: <input style="margin-top:10px;" type="text" name="WaistC" id="WaistC" value="74.4" /><br>
      Glutal Circumfarance: <input style="margin-top:10px;" type="text" name="GC"  id="GC" value="91"/><br>
      Up thigh Circumfarance: <input style="margin-top:10px;" type="text" name="UtC" id="UtC" value="54.4" /><br>
      Mid thigh Circumfarance: <input style="margin-top:10px;" type="text" name="MtC" id="MtC" value="47" /><br>
      Low thigh Circumfarance: <input style="margin-top:10px;" type="text" name="LtC" id="LtC" value="34.9" /><br>
      Calf Circumfarance: <input style="margin-top:10px;" type="text" name="CalfC" id="CalfC" value="34.3" /><br>
      Ankle Circumfarance: <input style="margin-top:10px;" type="text" name="AC" id="AC" value="19.2" /><br>
       Acromioradiale Length: <input style="margin-top:10px;" type="text" name="AL" id="AL" value="29.5" /><br>
       Rediale - stylion rediale Length: <input style="margin-top:10px;" type="text" name="RsrL" id="RsrL" value="22.2"/><br>
       Midstylion - dactylion Length: <input style="margin-top:10px;" type="text" name="MDL" id="MDL" value="17.5" /><br>
       Trochenterion - lat tibiale Length: <input style="margin-top:10px;" type="text" name="TLTL"  id="TLTL" value="41"/><br>
       Tibilale med - Sphyrion tibiale Length: <input style="margin-top:10px;" type="text" name="CalfC" id="CalfC" value="35.5" /><br>
       Biepicondylar Humerus Breadth: <input style="margin-top:10px;" type="text" name="BHB" id="BHB"value="5.3" /><br>
       Biepicondylar Femur Breadth: <input style="margin-top:10px;" type="text" name="BFB" id="BFB" value="7" /><br>
</div>

Cicumfarance Method = BIA Method (Manual Input):  <input style="margin-top:10px;" type="text" name="manual" id="manual" value="27" /><br>

</div>
<center><h1> Formulas Answer </h1></center>

<div style="margin-top: 50px;">

<div> Body Mass Index : <label id="bms"></label> <button id="bms_btn"> calculate</button><br> </div>
<div style="margin-top: 20px;"> Waist to Hip ratio :  <label id="wthr"></label> <button id="wthr_btn"> calculate</button><br> </div>
<div style="margin-top: 20px;"> Sum of skinfolds :  <label id="sos"></label> <button id="sos_btn"> calculate</button></div>

<div style="margin-top: 20px;"> Parillo Method :  <label id="pm_for"></label> <button id="pm_for_btn"> calculate</button></div>
<div style="margin-top: 20px;">Jackson and Pollock Method :male:  <label id="jpm_male"></label> <button id="jpm_male_btn"> calculate</button></div>
<div style="margin-top: 20px;"> Jackson and Pollock Method : female :  <label id="jpm_female"></label> <button id="jpm_female_btn"> calculate</button></div>



<center><div style="margin-top: 20px;"> Table calculation <button id="table_btn"> calculate</button></div></center>


  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table>
  <tr>
    <th>NAME</th>
    <th>Parillo Method</th>
    <th>Jackson and Pollock  Male</th>
    <th>Jackson and Pollock  female</th>
    <th>Cicumfarance Method</th>
  </tr>
  <tr>
    <td>Fat Weight</td>
    <td id="cell_1_1"></td>
    <td id="cell_1_2"></td>
    <td id="cell_1_3"></td>
    <td id="cell_1_4"></td>
  </tr>
  <tr>
    <td>Lean Body Weight</td>
    <td id="cell_2_1"></td>
    <td id="cell_2_2"></td>
      <td id="cell_2_3"></td>
      <td id="cell_2_4"></td>
  </tr>
<tr>
  <td colspan=5 > <center>Bone Weight </center></td>
</tr>

  <tr>
    <td>Methods </td>
    <td > </td>
    <td>small frame (bone 14%) </td>
      <td>medium frame (bone 16%) </td>
      <td>large frame  (bone 18%)</td>
  </tr>

  <tr>
    <td> Parillo Method</td>
    <td  > </td>
    <td id="boneweight"></td>
      <td id="boneweight1"></td>
      <td id="boneweight2"></td>
  </tr> 

   <tr>
    <td> Jackson and Pollock  Male</td>
    <td  > </td>
    <td id="jacboneweight"></td>
      <td id="jacboneweight1"></td>
      <td id="jacboneweight2"></td>
  </tr>

   <tr>
    <td> Jackson and Pollock  female</td>
    <td  > </td>
    <td id="fjacboneweight"></td>
      <td id="fjacboneweight1"></td>
      <td id="fjacboneweight2"></td>
  </tr>  


   <tr>
    <td> Cicumfarance Method</td>
    <td  > </td>
    <td id="Cicumfarance1"></td>
      <td id="Cicumfarance2"></td>
      <td id="Cicumfarance3"></td>
  </tr>

   <tr>
    <td>Muscle Weight</td>
    <td id="cell_4_1"></td>
    <td id="cell_4_2"></td>
      <td id="cell_4_3"></td>
      <td id="cell_4_4"></td>
  </tr>
 

</table>




<center><div style="margin-top: 20px;"> Table 2 calculation <button id="table_btn_2"> calculate</button></div></center>

<table>
  <tr>
    <th>NAME</th>
    <th>Percentage Segmental Fat</th>
    <th>Segmental Fat Weight</th>
    <th>  </th>
    <th>  </th>
    <th>  </th> 
  </tr>

   <tr>
  <td>Trunk Fat</td>
  <td id="cell2_1_1"></td>
  <td id="cell2_1_2"></td>
  <td id="cell2_1_3"></td>
  <td id="cell2_1_4"></td>
  <td id="cell2_1_5"></td>
  </tr>
     <tr>
  <td>Upper Limbs</td>
  <td id="cell2_2_1"></td>
  <td id="cell2_2_2"></td>
  <td id="cell2_2_3"></td>
  <td id="cell2_2_4"></td>
  <td id="cell2_2_5"></td>
  </tr>
     <tr>
  <td>Lower Limbs</td>
  <td id="cell2_3_1"></td>
  <td id="cell2_3_2"></td>
  <td id="cell2_3_3" ></td>
  <td id="cell2_3_4" ></td>
  <td id="cell2_3_5" ></td>
  </tr>   

   <tr style="background-color:lightblue;">
  <td >Whole Body Volume</td>
  <td id="cell2_4_1" colspan="5"></td>
  
  </tr>

    <tr >
  <td >Arm Segmental Muscle Weight</td>
  <td id="asmw" colspan="5"></td>
  
  </tr>

 <tr>
  <td >Forearm Segmental Muscle Weight</td>
  <td id="fsmw" colspan="5"></td> 
  </tr>
   <tr>
  <td >Thigh Segmental Muscle Weight</td>
  <td id="tsmw" colspan="5"></td> 
  </tr>
   <tr>
  <td >Calf Segmental Muscle Weight</td>
  <td id="csmw" colspan="5"></td> 
  </tr>
   <tr>
  <td >Upper Extrimites Muscle Weight</td>
  <td id="uemw" colspan="5"></td> 
  </tr>
   <tr>
  <td >Lower Extrimities Muscle Weight</td>
  <td id="lemw" colspan="5"></td> 
  </tr>
  <tr>
<td></td>
</tr>
<tr >
  <td colspan="6" style="text-align: center;">Basal Metabolic Rate</td>
  </tr>
<tr>
  <td>Women Bmr</td>
  <td id="wbmr" colspan="5" ></td>
</tr>
<tr>
  <td>Men Bmr</td>
  <td id="mbmr" colspan="5" ></td>
  </tr>

</table>  

<select style="margin-top: 10px;text-align: center;" name="afc_dropdown" id="afc_dropdown" >
  <option value="">AFC </option>
  <option value="1.2">Sedentary</option>
  <option value="1.375">Lightly active</option>
  <option value="1.55">Moderately active</option>
  <option value="1.725">Very  active</option>
  <option value="1.9">Extremely  active</option>
</select><br>



Total Energy Expanditure (BMR Method) (Male):<label id="teemale"></label> <br>
Total Energy Expanditure (BMR Method) (Female):<label id="teefemale"></label> <br>


Total Energy Expanditure (Mean) : <label ></label><input style="margin-top:10px;" type="text" name="TLTL"  id="teemean" value=""/> <br>

<!-- <select name="ratio_dropdown" id="ratio_dropdown" >
  <option value="">ratio </option>
  <option value ="1.2" attvalone = "" attvaltwo = "" attvalthree = "">(60:20:20) </option>
  <option value="1.375">(60:25:15)</option>
  <option value="1.55">(55:30:15)</option>
  <option value="1.725">(50:30:20)</option>
  <option value="1.9">(50:25:25)</option>
</select><br>  -->

<!-- <center><div style="margin-top: 20px;"> Table 3 calculation <button id="table_btn_3"> calculate</button></div></center> -->

<table>
  <tr>
    <th>Ratio  NAME</th>
    <th>(60:20:20) </th>
    <th>(60:25:15) </th>
    <th> (55:30:15) </th>
    <th> (50:30:20)  </th>
    <th> (50:25:25)  </th>  
  </tr>
 <tr>
  <td>Carbs Requirement </td>
  <td id="cell3_1_1"></td>
  <td id="cell3_1_2"></td>
  <td id="cell3_1_3"></td>
  <td id="cell3_1_4"></td>
  <td id="cell3_1_5"></td>
 </tr>
  <tr>
  <td>Protein Requirement </td>
  <td id="cell3_2_1"></td>
  <td id="cell3_2_2"></td>
  <td id="cell3_2_3"></td>
  <td id="cell3_2_4"></td>
  <td id="cell3_2_5"></td>
 </tr> 
  <td>Fats Requirement</td>
  <td id="cell3_3_1"></td>
  <td id="cell3_3_2"></td>
  <td id="cell3_3_3"></td>
  <td id="cell3_3_4"></td>
  <td id="cell3_3_5"></td>
 </tr>
 <tr>
  <td>Min Fluid Requirement (Lit.) </td>
  <td id="minfrl" colspan="6"> </td>
 </tr>
 <tr>
  <td>Max Fluid Requirement (Lit.) </td>
  <td id="maxfrl" colspan="6"> </td>
 </tr>
 <tr>
  <td> Height Weight Ratio </td>
  <td id="hwr" colspan="6"> </td>
 </tr>
  <tr>
  <td> Endomorphy </td>
  <td id="Endomorphy" colspan="6"> </td>
 </tr>
  <tr>
  <td>Mesomorphy </td>
  <td  id="Mesomorphy" colspan="6"> </td>
 </tr> 
  <tr>
  <td>Ectomorphy</td>
  <td  id="Ectomorphy" colspan="6"> </td>
 </tr> 
 <tr>
  <td>Somatotype</td>
  <td   id="Somatotype" colspan="6"> </td>
 </tr>
</table>










	          
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


<script>

 <!-- Body Mass Index formula hit  -->
$("#wthr_btn").click(function (){
var B28 =  $("#WaistC ").val();
var B29 =  $("#GC").val();
var bodyms = B28/B29;
$("#wthr").html(bodyms.toFixed(4));
});



// Sum of skinfolds formula hit 

$("#sos_btn").click(function (){

  var B12 = $("#BS").val();
  var B13 = $("#TS").val();
  var B14 = $("#SS").val();
  var B15 = $("#PS").val();
  var B16 = $("#MS").val();
  var B17 = $("#SSold").val();
  var B18 = $("#AS").val();
  var B19 = $("#TighhS").val();
  var B20 = $("#CalfS").val();

var soso = parseFloat(B12)+parseFloat(B13)+parseFloat(B14)+parseFloat(B15)+parseFloat(B16)+parseFloat(B17)+parseFloat(B18)+parseFloat(B19)+parseFloat(B20);

$("#sos").html(soso.toFixed(4));
});


// Waist to Hip ratio formula hit 

$("#bms_btn").click(function (){

var B8 =  $("#Weight").val();
var B7 =  $("#Height").val();

var bodyms = (B8/((B7/100)*(B7/100)));

  $("#bms").html(bodyms.toFixed(4));


});


// Parillo Method
$("#pm_for_btn").click(function (){

  var B6 = parseFloat($("#age").val());
  var B12 = parseFloat($("#BS").val());
  var B13 = parseFloat($("#TS").val());
  var B14 = parseFloat($("#SS").val());
  var B15 = parseFloat($("#PS").val());
  var B16 = parseFloat($("#MS").val());
  var B17 = parseFloat($("#SSold").val());
  var B18 = parseFloat($("#AS").val());
  var B19 = parseFloat($("#TighhS").val());
  var B20 = parseFloat($("#CalfS").val());

var bodyans = ((495/(1.112-(0.00043499*(B12+B13+B14+B17+B18+B19+B20))+(0.00000055*(B12+B13+B14+B17+B18+B19+B20)*(B12+B13+B14+B17+B18+B19+B20))-(0.00028826*B6))-450)+(495/(1.097-(0.00046971*(B12+B13+B14+B17+B18+B19+B20))+(0.00000056*(B12+B13+B14+B17+B18+B19+B20)*(B12+B13+B14+B17+B18+B19+B20))-(0.00012828*B6))-450))/2;

$("#pm_for").html(bodyans.toFixed(4));



});


// jpm formula hit 
$("#jpm_male_btn").click(function (){
var B6 = parseFloat($("#age").val());
    var B12 = parseFloat($("#BS").val());
  var B13 = parseFloat($("#TS").val());
  var B14 = parseFloat($("#SS").val());
  var B15 = parseFloat($("#PS").val());
  var B16 = parseFloat($("#MS").val());
  var B17 = parseFloat($("#SSold").val());
  var B18 = parseFloat($("#AS").val());
  var B19 = parseFloat($("#TighhS").val());
  var B20 = parseFloat($("#CalfS").val());

  var jpm_male = 495/(1.112-(0.00043499*(B12+B13+B14+B17+B18+B19+B20))+(0.00000055*(B12+B13+B14+B17+B18+B19+B20)*(B12+B13+B14+B17+B18+B19+B20))-(0.00028826*B6))-450;

  $("#jpm_male").html(jpm_male.toFixed(4));
});


$("#jpm_female_btn").click(function (){

var B6 = parseFloat($("#age").val());
    var B12 = parseFloat($("#BS").val());
  var B13 = parseFloat($("#TS").val());
  var B14 = parseFloat($("#SS").val());
  var B15 = parseFloat($("#PS").val());
  var B16 = parseFloat($("#MS").val());
  var B17 = parseFloat($("#SSold").val());
  var B18 = parseFloat($("#AS").val());
  var B19 = parseFloat($("#TighhS").val());
  var B20 = parseFloat($("#CalfS").val());

  var jpm_male = 495/(1.097-(0.00046971*(B12+B13+B14+B17+B18+B19+B20))+(0.00000056*(B12+B13+B14+B17+B18+B19+B20)*(B12+B13+B14+B17+B18+B19+B20))-(0.00012828*B6))-450;

  $("#jpm_female").html(jpm_male.toFixed(4));

});


// table button calculation hit 
$("#table_btn").click(function (){

    var F46 = parseFloat($("#pm_for").text());
    var F49 = parseFloat($("#jpm_male").text());
    var F50 = parseFloat($("#jpm_female").text());
    var F53 = parseFloat($("#manual").val());
    
    var B8 = parseFloat($("#Weight").val());
    
  var table_1_1 = (F46*B8)/100;
  var table_1_2 = (F49*B8)/100;
  var table_1_3 = (F50*B8)/100;
  var table_1_4 = (F53*B8)/100;

$("#cell_1_1").html(table_1_1.toFixed(4));
$("#cell_1_2").html(table_1_2.toFixed(4));
$("#cell_1_3").html(table_1_3.toFixed(4));
$("#cell_1_4").html(table_1_4.toFixed(4));

var C58 = table_1_1;
var D58 = table_1_2;
var E58 = table_1_3;
var F58 = table_1_4;


  var table_2_1 = B8-C58;
  var table_2_2 = B8-D58;
  var table_2_3 = B8-E58;
  var table_2_4 = B8-F58;


$("#cell_2_1").html(table_2_1.toFixed(4));
$("#cell_2_2").html(table_2_2.toFixed(4));
$("#cell_2_3").html(table_2_3.toFixed(4));
$("#cell_2_4").html(table_2_4.toFixed(4));


var boneweight = 0.14*table_2_1;
var boneweight1 = 0.16*table_2_1;
var boneweight2 = 0.18*table_2_1;


var jacboneweight = 0.14*table_2_2;
var jacboneweight1 = 0.16*table_2_2;
var jacboneweight2 = 0.18*table_2_2;


var fjacboneweight = 0.14*table_2_3;
var fjacboneweight1 = 0.16*table_2_3;
var fjacboneweight2 = 0.18*table_2_3;


var Cicumfarance1 = 0.14*table_2_4;
var Cicumfarance2 = 0.16*table_2_4;
var Cicumfarance3 = 0.18*table_2_4;





$("#boneweight").html(boneweight.toFixed(4));
$("#boneweight1").html(boneweight1.toFixed(4));
$("#boneweight2").html(boneweight2.toFixed(4));


$("#jacboneweight").html(jacboneweight.toFixed(4));
$("#jacboneweight1").html(jacboneweight1.toFixed(4));
$("#jacboneweight2").html(jacboneweight2.toFixed(4));


$("#fjacboneweight").html(fjacboneweight.toFixed(4));
$("#fjacboneweight1").html(fjacboneweight1.toFixed(4));
$("#fjacboneweight2").html(fjacboneweight2.toFixed(4));

$("#Cicumfarance1").html(Cicumfarance1.toFixed(4));
$("#Cicumfarance2").html(Cicumfarance2.toFixed(4));
$("#Cicumfarance3").html(Cicumfarance3.toFixed(4));

var C59 = table_2_1;
var D59 = table_2_2;
var E59 = table_2_3;
var F59 = table_2_4;

  var table_4_1 = 0.48*C59;
  var table_4_2 = 0.48*D59;
  var table_4_3 = 0.48*E59;
  var table_4_4 = 0.48*F59;

$("#cell_4_1").html(table_4_1.toFixed(4));
$("#cell_4_2").html(table_4_2.toFixed(4));
$("#cell_4_3").html(table_4_3.toFixed(4));
$("#cell_4_4").html(table_4_4.toFixed(4));


});


$("#table_btn_2").click(function (){

  var B8 = parseFloat($("#Weight").val());
  var B6 = parseFloat($("#age").val());
  var B12 = parseFloat($("#BS").val());
  // var B12 = parseFloat($("#BS").val());
  var B13 = parseFloat($("#TS").val());
  var B14 = parseFloat($("#SS").val());
  var B15 = parseFloat($("#PS").val());
  var B16 = parseFloat($("#MS").val());
  var B17 = parseFloat($("#SSold").val());
  var B18 = parseFloat($("#AS").val());
  var B19 = parseFloat($("#TighhS").val());
  var B20 = parseFloat($("#CalfS").val());
  


var table2_1_1 = ((B14+B15+B16+B17+B18)*100)/(B12+B13+B14+B15+B16+B17+B18+B19+B20);

    var C58 = parseFloat($("#cell_1_1").text());
    var D58 = parseFloat($("#cell_1_2").text());
    var E58 = parseFloat($("#cell_1_3").text());
    var F58 = parseFloat($("#cell_1_4").text());
    var B70 = table2_1_1;

var table2_1_2 = (C58*B70)/100;
var table2_1_3 = (D58*B70)/100;
var table2_1_4 =(E58*B70)/100;
var table2_1_5 =(F58*55)/100;

$("#cell2_1_1").html(table2_1_1.toFixed(4));
$("#cell2_1_2").html(table2_1_2.toFixed(4));
$("#cell2_1_3").html(table2_1_3.toFixed(4));
$("#cell2_1_4").html(table2_1_4.toFixed(4));
$("#cell2_1_5").html(table2_1_5.toFixed(4));

var table2_2_1 = ((B12+B13)*100)/(B12+B13+B14+B15+B16+B17+B18+B19+B20);

var B71 = table2_2_1;

var table2_2_2 = (C58*B71)/100;
var table2_2_3 = (D58*B71)/100;
var table2_2_4 = (E58*B71)/100;
var table2_2_5 = (F58*15)/100;

$("#cell2_2_1").html(table2_2_1.toFixed(4));
$("#cell2_2_2").html(table2_2_2.toFixed(4));
$("#cell2_2_3").html(table2_2_3.toFixed(4));
$("#cell2_2_4").html(table2_2_4.toFixed(4));
$("#cell2_2_5").html(table2_2_5.toFixed(4));

var table2_3_1 = ((B19+B20)*100)/(B12+B13+B14+B15+B16+B17+B18+B19+B20);
var B72 = table2_3_1;

var table2_2_2 = (C58*B72)/100;
var table2_2_3 = (D58*B72)/100;
var table2_2_4 = (E58*B72)/100;
var table2_2_5 = (F58*30)/100;

$("#cell2_3_1").html(table2_2_1.toFixed(4));
$("#cell2_3_2").html(table2_2_2.toFixed(4));
$("#cell2_3_3").html(table2_2_3.toFixed(4));
$("#cell2_3_4").html(table2_2_4.toFixed(4));
$("#cell2_3_5").html(table2_2_5.toFixed(4));


var B27 = parseFloat($("#CC").val());
var B28 = parseFloat($("#WaistC ").val());
var B29 = parseFloat($("#GC").val());
var B7 =  parseFloat($("#Height").val());




var bodyvolume = 3.14159*((B27+B28+B29)/3)*((B27+B28+B29)/3)*B7;

$("#cell2_4_1").html(bodyvolume.toFixed(4));

var B74 = bodyvolume;
var C59 = parseFloat($('#cell_2_1').text());
var B24 = parseFloat($('#AFC').val());
var B25 = parseFloat($('#FC').val());
var B31 = parseFloat($('#MtC').val());
var B33 = parseFloat($('#LtC').val());
var B35 = parseFloat($('#AL').val());
var B36 = parseFloat($('#RsrL').val());
var B38 = parseFloat($('#TLTL').val());
var B39 = parseFloat($('#CalfC').val());

var asmw = (((0.48*C59)*(((3.14159*(B24*B24)*B35)*100)/B74))/100)*2;
var fsmw = (((0.48*C59)*(((3.14159*(B25*B25)*B36)*100)/B74))/100)*2;
var tsmw = (((0.48*C59)*(((3.14159*(B31*B31)*B38)*100)/B74))/100)*2;
var csmw = (((0.48*C59)*(((3.14159*(B33*B33)*B39)*100)/B74))/100)*2;
var uemw = ((0.48*C59)*(((((3.14159*(B24*B24)*B35)+(3.14159*(B25*B25)*B36))*100)/B74)*2))/100;
var lemw = ((0.48*C59)*(((((3.14159*(B31*B31)*B38)+(3.14159*(B33*B33)*B39))*100)/B74)*2))/100;

$("#asmw").html(asmw.toFixed(4));
$("#fsmw").html(fsmw.toFixed(4));
$("#tsmw").html(tsmw.toFixed(4));
$("#csmw").html(csmw.toFixed(4));
$("#uemw").html(uemw.toFixed(4));
$("#lemw").html(lemw.toFixed(4));




var wbmr = ((10*B8)+(6.25*B7)-(5*B6))-161;
var mbmr = ((10*B8)+(6.25*B7)-(5*B6))+5;


$("#wbmr").html(wbmr.toFixed(4));
$("#mbmr").html(mbmr.toFixed(4));



});

$("#afc_dropdown").change(function(){

  var B13 = parseFloat($("#TS").val());
  var B14 = parseFloat($("#SS").val());
  var B15 = parseFloat($("#PS").val());
  var B16 = parseFloat($("#MS").val());
  var B17 = parseFloat($("#SSold").val());
  var B20 = $("#CalfS").val();
  var B23 = $("#ARC").val();

  var B33 = parseFloat($('#CalfC').val());
  var B41 = parseFloat($("#BFB").val());
  var B40 = parseFloat($("#BHB").val());
var C85 = parseFloat($("#mbmr").text());
var C84 = parseFloat($("#wbmr").text());
var D89 = parseFloat($("#afc_dropdown").val());
var B7 =  parseFloat($("#Height").val());
var B8 = parseFloat($("#Weight").val());
var teem =C85*D89 
var teef = C84*D89

$("#teemale").html(teem.toFixed(4));
$("#teefemale").html(teef.toFixed(4));


var mean = (teem+teef)/2;

$("#teemean").val(mean.toFixed(4));





// table 3 calculation 
// var C94 = 2100.00;
var C94 = mean;

var table3_1_1 = (C94*0.60)/4.1;
var table3_1_2 = (C94*0.60)/4.1;
var table3_1_3 = (C94*0.55)/4.1;
var table3_1_4 = (C94*0.50)/4.1;
var table3_1_5 = (C94*0.50)/4.1;


var table3_2_1 = (C94*0.20)/4.1;
var table3_2_2 = (C94*0.25)/4.1;
var table3_2_3 = (C94*0.30)/4.1;
var table3_2_4 = (C94*0.30)/4.1;
var table3_2_5 = (C94*0.25)/4.1;

var table3_3_1 = (C94*0.20)/9;
var table3_3_2 = (C94*0.15)/9;
var table3_3_3 = (C94*0.15)/9;
var table3_3_4 = (C94*0.20)/9;
var table3_3_5 = (C94*0.25)/9;

$("#cell3_1_1").html(table3_1_1.toFixed(4));
$("#cell3_1_2").html(table3_1_2.toFixed(4));
$("#cell3_1_3").html(table3_1_3.toFixed(4));
$("#cell3_1_4").html(table3_1_4.toFixed(4));
$("#cell3_1_5").html(table3_1_5.toFixed(4));

$("#cell3_2_1").html(table3_2_1.toFixed(4));
$("#cell3_2_2").html(table3_2_2.toFixed(4));
$("#cell3_2_3").html(table3_2_3.toFixed(4));
$("#cell3_2_4").html(table3_2_4.toFixed(4));
$("#cell3_2_5").html(table3_2_5.toFixed(4));

$("#cell3_3_1").html(table3_3_1.toFixed(4));
$("#cell3_3_2").html(table3_3_2.toFixed(4));
$("#cell3_3_3").html(table3_3_3.toFixed(4));
$("#cell3_3_4").html(table3_3_4.toFixed(4));
$("#cell3_3_5").html(table3_3_5.toFixed(4));


var minfrl = C94/1000;
var maxfrl = (C94/1000)*2.5;
// var hwr = (B7/B8*Math.pow(B);
var hwr = (B7/Math.pow(B8,0.333));
var Endomorphy = -0.7182+0.1451*((B13+B14+B17)*(170.18/B7))-0.00068*(Math.pow(((B13+B14+B17)*(170.18/B7)),2))+0.0000014*(Math.pow(((B13+B14+B17)*(170.18/B7)),3));




var Mesomorphy = (0.858*B40+0.601*B41+(0.188*(B23-(B13/10)))+(0.161*(B33-(B20/10))))-(0.131*B7)+4.5;

var B102 = hwr;
if(B102>40.75){
var Ectomorphy =  (0.732*(B7/Math.pow(B8,0.333))-28.58);

}else if(B102>38.28) {
var Ectomorphy = (0.463*(B7/Math.pow(B8,0.333))-17.63)
}else{
  var Ectomorphy =0.1;
}

// var Ectomorphy = IF(B102>40.75,(0.732*(B7/(B8^0.333))-28.58),IF(B102>38.28,(0.463*(B7/(B8^0.333))-17.63),0.1));

// var Somatotype = "Endomorph",IF(AND(MAX(B103,B104,B105)=B103,(MAX(B104,B105))-MIN(B104,B105)<=1.5,B103>B104,B103>B105)=TRUE,"Balance Endomorph",IF(AND(MAX(B104,B105)-MIN(B104,B105)>1.5,B104>B105),"Mesomorphic Endomorph",IF(AND(MIN(B103,B104,B105)=B103,MAX(B104,B105)-MIN(B104,B105)<1.5)=TRUE,"Mesomorph Endomorph",IF(AND(MIN(B103,B104,B105)=B104,MAX(B103,B105)-MIN(B103,B105)<1.5)=TRUE,"Endomorph Ectomorph",IF(AND(MIN(B103,B104,B105)=B105,(MAX(B103,B104)-MIN(B103,B104)<1.5))=TRUE,"Mesomorph Endomorph",IF((MAX(B103,B104,B105)=B103),IF(OR(B104=B105,MAX(B104,B105)-MIN(B104,B105)<=1.5)=TRUE,"Balance Endomorph",IF(B104>B105,"Mesomorphic Endomorph","Ectomorphic Endomorph")),IF((MAX(B103,B104,B105)=B104),IF(OR(B105=B103,MAX(B105,B103)-MIN(B105,B103)<=1.5)=TRUE,"Balance Mesomorph",IF(B105>B103,"Endomorphic Mesomorph","Ectomorphic Mesomorph")),IF((MAX(,B103,B104,B105)=B105),IF(OR(B104=B103,MAX(B104,B103)-MIN(B104,B103)<=1.5)=TRUE,"Balance Ectomorph",IF(B104>B103,"Mesomorphic Ectomorph","Endomorphic Ectomorph")),"None"))))))))))));



$("#minfrl").html(minfrl.toFixed(4));
$("#maxfrl").html(maxfrl.toFixed(4));
$("#hwr").html(hwr.toFixed(4));
$("#Endomorphy").html(Endomorphy.toFixed(4));
$("#Mesomorphy").html(Mesomorphy.toFixed(2));
$("#Ectomorphy").html(Ectomorphy.toFixed(2));

});






</script>
<style>
  input {
  margin-top: 10px;
}
</style>

</body>

</html>
