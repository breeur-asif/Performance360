 <?php
error_reporting(0);
session_start();
include 'config.php';
$user_id =$_SESSION["id"];

if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{

  $name = $_SESSION["name"];


}

  $sql3 ="select * from appoinment where user_id = '$user_id' and status = 2 ";

$result_app1 = mysqli_query($conn, $sql3);
$counter1 = 1;
while($res1 = mysqli_fetch_assoc($result_app1)){

 $tableview1 = $tableview1."<tr><td>".$counter1."</td>
                                        <td>".date("d-m-Y", strtotime($res1['date']))."</td> <td> ".$res1['time']."</td>
                                                  <td> ".$res1['email']."</td>
                                                  <td> ".$res1['other_c']." </td>

                                                  <td ><p style='color:blue' > Upcoming   <p>

                                                           </td>  
                                                   
                                              </tr>";

$counter1++;
}


 $sql2 ="select * from appoinment where user_id = '$user_id'";

$result_app = mysqli_query($conn, $sql2);
$counter = 1;
while($res = mysqli_fetch_assoc($result_app)){

if($res['status'] == 1){$tableview = $tableview."<tr><td>".$counter."</td>
                                        <td>".date("d-m-Y", strtotime($res['date']))."</td> <td> ".$res['appoinment']."</td>
                                                  <td> ".$res['email']."</td>
                                                  <td> ".$res['other_c']." </td>



                                                  <td > <p style='color:green' > Done <p>

                                                           </td>  
                                                   
                                              </tr>";


}else if($res['status'] == 2){

  $tableview = $tableview."<tr><td>".$counter."</td>
                                        <td>".date("d-m-Y", strtotime($res['date']))."</td> <td> ".$res['appoinment']."</td>
                                                  <td> ".$res['email']."</td>
                                                  <td> ".$res['other_c']." </td>



                                                  <td ><p style='color:blue' > Reschedule <p>

                                                           </td>  
                                                   
                                              </tr>";
}else{
  $tableview = $tableview."<tr><td>".$counter."</td>
                                        <td>".date("d-m-Y", strtotime($res['date']))."</td> <td> ".$res['appoinment']."</td>
                                                  <td> ".$res['email']."</td>
                                                  <td> ".$res['other_c']." </td>



                                                  <td> Upcoming <button class='btn btn-info getappid' id='".$res['id']."'  data-toggle='modal' data-target='#modalAppointment1'  > Rechedule </button>

                                                           </td>  
                                                   
                                              </tr>";

}


$counter++;
}


if (isset($_POST['submit'])) {


if(isset($_POST['appid'])){

   $sql = "UPDATE `appoinment` SET `date`='".$_POST['date']."',`time`='".$_POST['time']."',`status`=2 WHERE  id = '".$_POST['appid']."' ";


}else{

 $sql = "INSERT INTO `appoinment`(`user_id`, `name`, `email`, `date`, `time`, `appoinment`, `other_c`, `cr_date`) VALUES ($user_id,'".$_SESSION["name"]."','".$_SESSION["username"]."','".$_POST['date']."','".$_POST['time']."','".$_POST['appointment_for2']."','".$_POST['comment']."',now())";
}

if(mysqli_query($conn, $sql)){
echo '<script> alert("success"); </script> ' ;
header('location:booking.php');

 }else{

echo '<script> alert("error"); </script> ' ;

 }
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
 
</head>

<body id="page-top">
<div class="loader"></div>

  <!-- Page Wrapper -->
  <div id="wrapper">

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
        <?php   include "header.php"; ?>





    <br>
   

 
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
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Settings-->
                <!--</a>-->
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
            <h1 class="h3 mb-0 text-gray-800">Appointment </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                 <div class="row">
                  <div class="col-lg-6"> <button type="button" class="nav-link" data-toggle="modal" data-target="#modalAppointment"><span style="color:black">Make an Appointment</span></button>

<div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="booking.php" method="post">
              <div class="form-group">
                <label  class="text-black">Date</label>
                <input type="date" class="form-control" name="date">
              </div>
               
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label  class="text-black">Time</label>
                     
                  </div>    
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                  <select name="time">
                                              <option value="Morning">Morning</option>
                                              <option value="Afternoon">Afternoon</option>
                                              <option value="Evening">Evening</option>
                                             
                                            </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                                        <div class="col-md-4">
                                        <label class="text-black">Appointment for</label></div>
                                        <div class="col-md-8">
                                             <select name="appointment_for2" style="max-width: 230px" >
                                              <option value="Body Composition Assessment">Body Composition Assessment</option>
                                              <option value="Posture Assessment">Posture Assessment
                        </option>
                                              <option value="Performance Evaluation Tests">Performance Evaluation Tests</option>
                                             
                                            </select>

                                          </div>
                                      </div>
             
 <div class="form-group">
                <label  class="text-black">Information</label>
                <textarea name="comment"  class="form-control" cols="10" rows="5"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div></div>
                  <div class="col-lg-6">
                     <!-- <button type="button" class="nav-link" data-toggle="modal" data-target="#modalAppointment1"><span style="color:black">Schedule New Meeting</span></button> -->
                              <br>

                                <div class="modal fade" id="modalAppointment1" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Reschedule Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form action="booking.php" method="post">
              <div class="form-group">
                <label  class="text-black">Date</label>
                <input type="date" class="form-control" name="date">
              </div>
               
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label  class="text-black">Time</label>
                     
                  </div>    
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                  <select name="time" style="width: 100%;  border-radius:5px; ">
                                              <option value="Morning">Morning</option>
                                              <option value="Afternoon">Afternoon</option>
                                              <option value="Evening">Evening</option>
                                             
                                            </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                                        <div class="col-md-4">
                                 <!--        <label class="text-black">Appointment for</label></div>
                                        <div class="col-md-8">
                                             <select name="appointment_for2" style="max-width: 230px" >
                                              <option value="Body Composition Assessment">Body Composition Assessment</option>
                                              <option value="Posture Assessmen">Posture Assessment
                        </option>
                                              <option value="Performance Evaluation Tests">Performance Evaluation Tests</option>
                                             
                                            </select>

                                          </div> -->
                                      </div>
             
 <div class="form-group"><!-- 
                <label  class="text-black">Information</label>
                <textarea name="comment"  class="form-control" cols="10" rows="5"></textarea> -->
                <input  type="hidden" name="appid"   id="appid" >
              </div>
              <div class="form-group">
               <input type="submit" name="submit" value="Save" class="btn btn-primary">
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div></div></div>
                <div class="container-fluid">
                  <div class="row">
                   

              <div class="col-lg-12">
                  <div class="row">
                      <div class="col-lg-12 mb-12">
                          <div class="card">
                              <div class="card-body">
                                    <div class="card"><!--app-->
                                        <div class="card-header">
                                          Appointment
                                        </div>
                                        <div class="card-body">
                                           <div class="table-responsive">
                                       <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                              <tr>
                                                 
                                                  <th></th>
                                                <th>Date</th>
                                                <th>Appointment For </th>
                                                <th>Email</th>
                                                  <th> Information</th>
                                                  <th>Status</th>
                                              </tr>
                                            </thead>

                                            <tbody>
                                                  <?php echo $tableview; ?>
                                                </tbody>
                                                <!-- <button onclick="" >Done </button>
                                                  <button onclick="location.href='booking.php' >Upcoming </button> -->
                                              </table>
                                            </div>
                                        </div>
                                      </div><!-- app end--><br><br><br>
                                      <div class="card"><!--reschdule-->
                                        <div class="card-header">
                                          Rescheduling
                                        </div>
                                        <div class="card-body">
                                           <div class="table-responsive">
                                       <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                              <tr>
                                             
                                                         
                                                  <th></th>
                                                <th>Preferred Date</th>
                                                <th>Preferred Time </th>
                                                <th>Email</th>
                                                  <th> Other Comment</th>
                                                  <th>Status</th>
                                                   
                                              </tr>
                                            </thead>

                                            <tbody>
                                                  <?php echo $tableview1; ?>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
                <input type="submit" value="Back" class="btn btn-primary">
              </div>
                                        </div>
                                      </div><!-- reschidule-->


                                     
             
                               </div><!-- card -body> main-->
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
  $('.getappid').click(function(){



$("#appid").val(this.id);


});

</script>

</body>

</html>