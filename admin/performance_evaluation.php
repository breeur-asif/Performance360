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


$skill = $_POST['skill'];
  $test_name = $_POST['test_name'];

  $unit = $_POST['unit'];
   $description_test = $_POST['description_test'];
   $photo_file = $_POST['photo_file'];
 $group = $_POST['group'];
 $novice = $_POST['novice'];
   $intermediate = $_POST['intermediate'];
 $expert = $_POST['expert'];




$sql= "INSERT INTO `performance`(`skill`, `test_name`, `unit`, `description_test`, `photo_file`, `group_s`, `novice`, `intermediate`, `expert`, `cr_date`)VALUES ('$skill','$test_name',' $unit','$description_test','$photo_file','$group','$novice','$intermediate','$expert',now())";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    header('Location: performance_evaluation.php');
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

  <title> Performance Evaluation Database</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">
<div class="loader"></div>

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
            <h1 class="h3 mb-0 text-gray-800">Performance Evaluation Database</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body">


                  
       <div class="row">
        
        
        

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">    
            <form action="performance_evaluation.php" method="post">
                                                     <div class="form-group row">

                                                             <div class="col-md-6">
                                                               <label for="first_name"><h6>Skill:  </h6></label></div>
                                                               <div class="col-md-6">
                                                               <input type="text" class="form-control" name="skill"   value="">
                                                             </div>
                                                   </div><!--Name-->  
                                                  
                                                   <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="dob"><h6>Test Name:</h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="test_name" value="" ></div>
                                                      </div>
                                                       <div class="form-group row">

                                                      <div class="col-md-6">
                                                         <label for="dob"><h6>Unit:</h6></label></div>
                                                             <div class="col-md-6">
                                                        <input type="text" class="form-control" name="unit"  value="">
                                                        </div>

                                                   </div> <!-- DOB-->
                                                  
                                                   
                                                       <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6>Description:</h6></label></div>
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" name="description_test" id="phone" value="">
                                                        </div>
                                                      </div>
                                                     <div class="form-group row">

                                                      <div class="col-md-6">
                                                        <label for="phone"><h6>Photo:</h6></label></div>
                                                        <div class="col-md-6">
                                                        <input name="photo_file" type="file" placeholder="Logo" class="form-control input-md" required=""><br>
                                                        </div>
                                                      </div>
                                                       <div class="form-group row">
                                                        <div class="col-md-6">Target Group:</div>

                                                      <div class="col-md-6">
                    <select id="Group" name="group" class="form-control">

                      <option value="Youth <12 Years">Youth <12 Years</option>
                      <option value="Adolescence 12-16 years">Adolescence 12-16 Years</option>
                      <option value="Adult >16 Years">Adult >16 Years </option>
                       
                    </select>
                  </div>
                </div>
                                                            
           </div>
<!--           <center>     -->
<!--      <button type="submit" class="btn btn-primary" name="submit">Save</button>-->
<!--<button type="button" class="btn btn-secondary">Back</button></center> -->
<!--</form>-->
           
             
           </div>

	               
	            </div>
              <div class="row"><!-- color table Row-->
        
        
        

            <!-- Content Column -->
            <div class="col-lg-9 mb-9">
              <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Score:</th>
                        <th bgcolor="#FF0000" >1</th>
                        <th bgcolor="#FF0000">2</th>
                        <th bgcolor="#F8C471" >3</th>
                        <th bgcolor="#F8C471">4</th>
                        <th bgcolor="#FFFF2B">5</th>
                        <th bgcolor="#FFFF2B">6</th>
                        <th bgcolor="#8DFA09">7</th>
                        <th bgcolor="#8DFA09">8</th>
                        <th bgcolor="#93D444">9</th>
                        <th bgcolor="#93D444">10</th>
                      </tr>
                    </thead>
                   
                    <tbody>
<tr>
                        <td>Novice:</td> 
                        <td bgcolor="#FF0000"><input type="radio" name="novice" value="1"></td>
                        <td bgcolor="#FF0000"><input type="radio" name="novice" value="2"></td>
                       <td bgcolor="#F8C471"> <input type="radio" name="novice" value="3"></td>
                       <td bgcolor="#F8C471"><input type="radio" name="novice" value="4"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="novice" value="5"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="novice" value="6"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="novice" value="7"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="novice" value="8"></td>
                        <td bgcolor="#93D444"><input type="radio" name="novice" value="9"></td>
                        <td bgcolor="#93D444"><input type="radio" name="novice" value="10"></td>
                      </tr>
                     <tr>

                        <td>Intermediate:</td>
                       <td bgcolor="#FF0000"><input type="radio" name="intermediate" value="1"></td>
                        <td bgcolor="#FF0000"><input type="radio" name="intermediate" value="2"></td>
                       <td bgcolor="#F8C471"> <input type="radio" name="intermediate" value="3"></td>
                       <td bgcolor="#F8C471"><input type="radio" name="intermediate" value="4"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="intermediate" value="5"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="intermediate" value="6"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="intermediate" value="7"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="intermediate" value="8"></td>
                        <td bgcolor="#93D444"><input type="radio" name="intermediate" value="9"></td>
                        <td bgcolor="#93D444"><input type="radio" name="intermediate" value="10"></td>
                      </tr>
                      <tr>
                        <td>Expert:</td>
                       <td bgcolor="#FF0000"><input type="radio" name="expert" value="1"></td>
                        <td bgcolor="#FF0000"><input type="radio" name="expert" value="2"></td>
                       <td bgcolor="#F8C471"> <input type="radio" name="expert" value="3"></td>
                       <td bgcolor="#F8C471"><input type="radio" name="expert" value="4"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="expert" value="5"></td>
                        <td bgcolor="#FFFF2B"><input type="radio" name="expert" value="6"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="expert" value="7"></td>
                        <td bgcolor="#8DFA09"><input type="radio" name="expert" value="8"></td>
                        <td bgcolor="#93D444"><input type="radio" name="expert" value="9"></td>
                        <td bgcolor="#93D444"><input type="radio" name="expert" value="10"></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
            </div>
             <div class="col-lg-3 mb-3">
             	 <button type="button" class="btn btn-info"><a href="performance_test.php">List</a></a></button><br><br>
	    <button type="submit" class="btn btn-primary" name="submit">Save</button><br><br>
<button type="button" class="btn btn-secondary"><a href="admindashboard.php">Back</a></button>
</form>
             	</div>
            
          </div><!-- color table-->
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
