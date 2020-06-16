<?php

session_start();
include "config.php";

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
        <a class="nav-link" href="clientinjuery.php">
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
            <h1 class="h3 mb-0 text-gray-800">Sport Event Database</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body">


                <!--sport Event start-->

                <div class="card-header">
                Sports Event
                </div>
                <div class="card-body">


<form>
                <div class="form-group row">
                    <label class="col-md-2 control-label" for="selectbasic">Sports</label>
                    <div class="col-md-10">
                  <input type="text" name="sport" value="">
                    </div>
                  </div>



                <div class="form-group row">
                    <label class="col-md-2 control-label" for="selectbasic">Event:</label>
                    <div class="col-md-10">
                  <input type="text" name="event" value="">
                    </div>
                  </div>  


                  <div class="form-group row">
                    <label class="col-md-2 control-label" for="selectbasic">Parameter</label>
                    <div class="col-md-10">
                 <select style="margin-top: 10px;text-align: center;" name="Parameter" id="Parameter" >
  
  <option value="Distance">Distance</option>
  <option value="">Parameter </option>
<option value="1.725">Rank</option>

<option value="Time">Time</option>
<option value="Weight">Weight</option>

</select>
                    </div>
                  </div>


                <div class="form-group row">
                <label class="col-md-2 control-label" for="selectbasic">Unit</label>
                <div class="col-md-10">
 <input type="text" name="Unit_input" value="">

                 <select style="margin-top: 10px;text-align: center; display: none;" name="Unit_grams" id="Unit_grams"  >
  <option value="">Parameter </option>
  <option value="kg">kg</option>
  <option value="grams">grams</option>
</select>
                 <select style="margin-top: 10px;text-align: center;  display: none; " name="Unit_distance" id="Unit_distance" >
  <option value="">Parameter </option>
  <option value="cm">cm</option>
  <option value="meters">meters</option>
  <option value="km">km</option>
</select>



                </div>
                </div>
                </div>

                <div class="row">

    <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="save">Save</button>
                <!-- <button type="button" class="btn btn-info ">List</button> -->
                <button type="button"  class="btn btn-secondary" onclick="location.href='dashboard.php';" >Back</button>
                </div><br>

</form>


                <div class="col-md-10">
                <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                          <th>Sport</th>
                          <th>Event</th>
                             <th>Parameter</th>
                          <th>Unit</th>
                          <th>Measure</th>
                                 <th>Date</th>
                       
                      
                        
                      </tr>
                    </thead>
                    <tfoot>
                         <tr>
                          <th>Sport</th>
                          <th>Event</th>
                          <th>Parameter</th>
                          <th>Unit</th>
                          <th>Measure</th>
                          <th>Date</th>
                       
                      
                        
                      </tr>
                    </tfoot>

                         <tbody>
                    
<?php 

$sql = "SELECT * FROM sports_event where user_id = '".$_SESSION['id']."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 

 while($row = mysqli_fetch_assoc($result)) {  
?>

                      <tr>
                        <td><?php echo $row['sport_name'] ?></td>
                        <td><?php echo $row['event'] ?></td>
                        <td><?php echo $row['parameter'] ?></td>
                        <td><?php echo $row['input_unit'] ?></td>
                        <td><?php echo $row['unit_measuring'] ?></td>
                        <td><?php echo $row['cr_date'] ?></td>
             
                       
                      </tr>



<?php
 }

}
  ?>                      
                    </tbody>
                </table>
                </div>
                </div>

            
                </div>


                <!--sport Event End-->

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

<script>


  $("#Parameter").change(function(){

var parameter_value = this.value;

if(parameter_value == 'Distance'){
$('#Unit_grams').hide();
$('#Unit_grams').val('');
  $('#Unit_distance').show();





}else if(parameter_value == 'Weight'){
  $('#Unit_distance').hide();
$('#Unit_distance').val('');
$('#Unit_grams').show();  

}




  });

$("#save").click(function(){

// alert("herere");
// alert($('form').serialize());
// return false;
  $.ajax({
            type: 'post',
            url: 'functions/sport_event.php',
            data: $('form').serialize(),
            success: function (data) {

   
              var lastinsertid = data;
              if(data > 0){
              alert('success');
              location.reload();

            }else{
              alert("someting went wrong ");  
            }
            }
          });

});

</script>

</body>

</html>
