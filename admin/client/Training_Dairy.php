<?php
error_reporting(0);
session_start();

include "config.php";
  $user_id = $_SESSION["id"];
if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{
 
  $name = $_SESSION["name"];
 
}


$sql1 = " SELECT  * FROM training_dairy WHERE  DATE(timestamp) = CURDATE() and user_id = '".$user_id."'";

$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {

     while($row1 = mysqli_fetch_assoc($result1)) {

              // print_r($row1);
              $ahr = $row1['ahr'];
              $losn = $row1['losn'];
              $qosn = $row1['qosn'];
              $tst = $row1['tst'];
              $tet = $row1['tet'];
              $s1at = $row1['s1at'];
              $s1tv = $row1['s1tv'];
              $s1ts = $row1['s1ts'];
              $s1tw = $row1['s1tw'];
              $s1ms = $row1['s1ms'];
               $s1cw = $row1['s1cw'];
              $s1rpe = $row1['s1rpe'];
              $s1hrbw = $row1['s1hrbw']; 
                 $s1hrac = $row1['s1hrac']; 
                 $s1on = $row1['s1on']; 
                 $a_b = $row1['a_b']; 
                 $a_l = $row1['a_l']; 
                 $losd = $row1['losd']; 
                 $qosd = $row1['qosd']; 
                 $s1tst = $row1['s1tst']; 
                 $s1tet = $row1['s1tet']; 
                 $s2at = $row1['s2at'];
                 $s2tf = $row1['s2tf'];
                 $s2tv = $row1['s2tv'];
                 $s2ts = $row1['s2ts'];
                 $s2tw = $row1['s2tw'];
                 $s2ms = $row1['s2ms'];
                 $s2cw = $row1['s2cw'];
                  $s2rpe = $row1['s2rpe'];
                   $s2hrbw = $row1['s2hrbw'];
                    $s2hrac = $row1['s2hrac'];
                     $s2on = $row1['s2on'];
                     $s1tf=$row1['s1tf']; //plz add field
                     $day=$row1['day']; //plz add field


     }  



}
     

// die;

if(isset($_POST['submit'])){
  // echo $day;
  // die;
  
$todayday = ltrim(date("d"), "0");


if($todayday == $day ){

echo "<script> alert('currently u cannot update ! ') </script>";
echo  '<script> location.href = "Training_Dairy.php"; </script>'; 
// exit();
}else{


 $sql = "INSERT INTO `training_dairy`( `user_id`, `ahr`, `losn`, `qosn`, `tst`, `tet`, `s1at`, `s1tv`, `s1ts`, `s1tw`, `s1ms`, `s1cw`, `s1rpe`, `s1hrbw`, `s1hrac`, `s1on`, `a_b`, `a_l`, `losd`, `qosd`, `s1tst`, `s1tet`, `s2at`, `s2tf`, `s2tv`, `s2ts`, `s2tw`, `s2ms`, `s2cw`, `s2rpe`, `s2hrbw`, `s2hrac`, `s2on`,`s1tf`,`day`, `cr_date`) VALUES ($user_id,'".$_POST['ahr']."','".$_POST['losn']."','".$_POST['qosn']."','".$_POST['tst']."','".$_POST['tet']."','".$_POST['s1at']."','".$_POST['s1tv']."','".$_POST['s1ts']."','".$_POST['s1tw']."','".$_POST['s1ms']."','".$_POST['s1cw']."','".$_POST['s1rpe']."','".$_POST['s1hrbw']."','".$_POST['s1hrac']."','".$_POST['s1on']."','".$_POST['a_b']."','".$_POST['a_l']."','".$_POST['losd']."','".$_POST['qosd']."','".$_POST['s1tst']."','".$_POST['s1tet']."','".$_POST['s2at']."','".$_POST['s2tf']."','".$_POST['s2tv']."','".$_POST['s2ts']."','".$_POST['s2tw']."','".$_POST['s2ms']."','".$_POST['s2cw']."','".$_POST['s2rpe']."','".$_POST['s2hrbw']."','".$_POST['s2hrac']."','".$_POST['s2on']."','".$_POST['s1tf']."','".$todayday."',now())";

// }
$result = mysqli_query($conn, $sql);

echo '<script> alert("success") </script>';

echo  '<script> location.href = "Training_Dairy.php"; </script>'; 
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

  <title>Training</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
 
  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script> -->
 
</head>

<body id="page-top">
<div class="loader"></div>

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
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              <!--   <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
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
            <h1 class="h3 mb-0 text-gray-800"> Training Diary</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
               
<body>

<!--<h2>Training Diary</h2>-->


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

/*tr:nth-child(even) {*/
/*  background-color: #dddddd;*/
/*}*/
</style>

<center style="padding-bottom: 15px" ><a href="Monthly.php"  class="btn btn-primary">  Monthly  </a></center>
<form action="" method="post">

<table style="width:100%">
  <tr>
    <th colspan="2" >Day</th>
   
    <th>Today <?php echo $today = date("m/d/Y");	 ?>  </th>
 
  </tr>
  <tr>
    <td colspan="2">Awakening Heart Rate</td>
    <td><input type="text" name="ahr" id="ahr" value="<?php echo $ahr; ?>" /></td>
 
  </tr>
  <tr>
    <td colspan="2">Length of Sleep ( Night )</td>
    <td><input type="text" name="losn" id="losn"  value="<?php echo $losn; ?>" /></td>
 
  </tr>
   <tr>
    <td colspan="2"> Quality of Sleep ( Night )</td>
    <td><input type="text" name="qosn" id="qosn" value="<?php echo $qosn; ?>" /></td>
 
  </tr>
   <tr>
    <td colspan="2">Training Start Time : </td>
    <td><input type="text" name="tst" id="tst" value="<?php echo $tst; ?>" /></td>
 
  </tr>

  </tr>
   <tr>
    <td colspan="2">Training End Time :</td>
    <td><input type="text" name="tet" id="tet" value="<?php echo $tet; ?>" /></td>
 
  </tr>

<tr>


     
          <td rowspan="11">Session 1 </td>
          <td>Activity / Training ( Detail )  </td>
           <td><textarea  type="text" name="s1at" id="s1at" /><?php echo $s1at; ?> </textarea> </td>
       </tr>
       <tr>
       
          <td>Thoughts / Feelings  </td>
           <td><input type="text" name="s1tf" id="s1tf" value="<?php echo $s1tf; ?>"  /> </td>
        </tr>
         <tr>
       
          <td>Total Volume  </td>
           <td><input type="text" name="s1tv" id="s1tv"  value="<?php echo $s1tv; ?>" /> </td>
        </tr>
         <tr>
       
          <td>Tiredness Sensation   </td>
           <td><input type="text" name="s1ts" id="s1ts" value="<?php echo $s1ts; ?>" /> </td>
        </tr>
         <tr>
       
          <td>Training Willingness </td>
           <td><input type="text" name="s1tw" id="s1tw" value="<?php echo $s1tw; ?>" /> </td>
        </tr>
         <tr>
         
          <td>Muscle Soreness  </td>
           <td><input type="text" name="s1ms" id="s1ms" value="<?php echo $s1ms; ?>" /> </td>
        </tr> <tr>
         
          <td>Competitive Willingness  </td>
           <td><input type="text" name="s1cw" id="s1cw"value="<?php echo $s1cw; ?>" /> </td>
        </tr> <tr>
       
          <td>Rated Perceived Exertion  </td>
           <td><input type="text" name="s1rpe" id="s1rpe" value="<?php echo $s1rpe; ?>" /> </td>
        </tr>
        <tr>
         
          <td>Heart Rate Before Warm-up  </td>
           <td><input type="text" name="s1hrbw" id="s1hrbw" value="<?php echo $s1hrbw; ?>" /> </td>
        </tr>
        <tr>
         
          <td>Heart Rate After  Cooldown 3'  </td>
           <td><input type="text" name="s1hrac" id="s1hrac" value="<?php echo $s1hrac; ?>" /> </td>
        </tr>
        <tr>
         
          <td>Other Notes </td>
           <td><input type="text" name="s1on" id="s1on" value="<?php echo $s1on; ?>" /> </td>
        </tr>





   <tr>
      <td colspan="2">Appetite ( Breakfast )</td>
      <td><input type="text" name="a_b" id="a_b" value="<?php echo $a_b; ?>" /></td>
     
  </tr>
   <tr>
      <td colspan="2">Appetite ( Lunch )</td>
      <td><input type="text" name="a_l" id="a_l" value="<?php echo $a_l; ?>" /></td>
     
  </tr>

  <tr>
      <td colspan="2">Length of Sleep ( Day )</td>
      <td><input type="text" name="losd" id="losd" value="<?php echo $losd; ?>" /></td>
     
  </tr>
  <tr>
      <td colspan="2" >Quality of Sleep ( Day )</td>
      <td><input type="text" name="qosd" id="qosd" value="<?php echo $qosd; ?>" /></td>
     
  </tr>
   <tr>
      <td colspan="2">Training Start Time : </td>
      <td><input type="text" name="s1tst" id="s1tst" value="<?php echo $s1tst; ?>" /></td>
     
  </tr>  
  <tr>
      <td colspan="2">Training End Time : </td>
      <td><input type="text" name="s1tet" id="s1tet" value="<?php echo $s1tet; ?>" /></td>
     
  </tr>
  <tr>

 
          <td rowspan="11">Session 2 </td>
          <td>Activity / Training ( Detail )  </td>
           <td><textarea type="text" name="s2at" id="s2at"  /> <?php echo $s2at; ?></textarea>  </td>
        </tr>
         <tr>
       
          <td>Thoughts / Feelings  </td>
           <td><input type="text" name="s2tf" id="s2tf" value="<?php echo $s2tf; ?>" /> </td>
        </tr>
         <tr>
       
          <td>Total Volume  </td>
           <td><input type="text" name="s2tv" id="s2tv" value="<?php echo $s2tv; ?>" /></td>
        </tr>
         <tr>
       
          <td>Tiredness Sensation   </td>
           <td><input type="text" name="s2ts" id="s2ts" value="<?php echo $s2ts; ?>" /> </td>
        </tr>
         <tr>
       
          <td>Training Willingness </td>
           <td><input type="text" name="s2tw" id="s2tw" value="<?php echo $s2tw; ?>" /> </td>
        </tr>
         <tr>
         
          <td>Muscle Soreness  </td>
           <td><input type="text" name="s2ms" id="s2ms" value="<?php echo $s2ms; ?>" /></td>
        </tr> <tr>
         
          <td>Competitive Willingness  </td>
           <td><input type="text" name="s2cw" id="s2cw" value="<?php echo $s2cw; ?>" /> </td>
        </tr> <tr>
       
          <td>Rated Perceived Exertion  </td>
           <td><input type="text" name="s2rpe" id="s2rpe" value="<?php echo $s2rpe; ?>" /></td>
        </tr>
        <tr>
         
          <td>Heart Rate Before Warm-up  </td>
           <td><input type="text" name="s2hrbw" id="s2hrbw" value="<?php echo $s2hrbw; ?>" /> </td>
        </tr>
        <tr>
         
          <td>Heart Rate After  Cooldown 3'  </td>
           <td><input type="text" name="s2hrac" id="s2hrac" value="<?php echo $s2hrac; ?>" /> </td>
        </tr>
        <tr>
         
          <td>Other Notes </td>
           <td><input type="text" name="s2on" id="s2on" value="<?php echo $s2on; ?>" /></td>
        </tr>


   
 
</table>

<input type="submit"  name="submit"  value ="Save"   class="btn btn-primary"  />
</form>




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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>

<!-- </body>
</html>
 -->