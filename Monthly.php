<?php
date_default_timezone_set("Asia/Calcutta"); 
session_start();

if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{
  
  $name = $_SESSION["name"];
  
}

 // echo date("d");
// $str = ltrim(date("d"), "0"); 

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
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Profile-->
                <!--</a>-->
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
               <!--  <a class="dropdown-item" href="#">
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
            <h1 class="h3 mb-0 text-gray-800"> </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                
<body>




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
  white-space:nowrap;
}

/*tr:nth-child(even) {*/
/*  background-color: #dddddd;*/
/*}*/
</style>

<h2>Monthly Training Diary</h2>
<center style="padding-bottom: 15px" ><a href="Training_Dairy.php"  class="btn btn-primary">  Back  </a></center>


<div class="table-responsive">
<table style="width:100%">
  <tr>
    <th colspan="2" style="">Month <?php echo $today = date("F  Y"); ?></th>

<?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<th>Day  $x</th> ";
}
?> 

  
  
  </tr>
  <tr>
    <td colspan="2">Awakening Heart Rate</td>
    

    <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' id='ahr$x' name='' id='' readonly/></td>";
}
?> 
  
  
  </tr>
  <tr>
    <td colspan="2">Length of Sleep ( Night )</td>
      <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='losn$x'  readonly/></td>";
}
?> 
  
  </tr>
   <tr>
    <td colspan="2">Quality of Sleep ( Night )</td>
      <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='qosn$x' readonly/></td>";
}
?> 
  
  </tr>
   <tr><td rowspan="13"><center>Session 1 </center> </td>
    <td> Training Start Time :</td>
     <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='tst$x' readonly /></td>";
}
?> 
  </tr>

  </tr>
   <tr>
    <td>Training End Time :</td>
      <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='tet$x' readonly/></td>";
}
?> 
  
  </tr>

<tr>

          
          <td>Activity / Training ( Detail )  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1at$x'  readonly/></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Thoughts / Feelings </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1tf$x' readonly /></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Total Volume  </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1tv$x' readonly /></td>";
}
?> 
        </tr>
         <tr>
       
          <td>Tiredness Sensation   </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1ts$x' readonly /></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Training Willingness </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1tw$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
         
          <td>Muscle Soreness  </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1ms$x' readonly/></td>";
}
?> 
        </tr> <tr>
         
          <td>Competitive Willingness  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1cw$x' readonly /></td>";
}
?> 
        </tr> <tr>
        
          <td>Rated Perceived Exertion  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1rpe$x' readonly /></td>";
}
?> 
        </tr> 
        <tr>
         
          <td >Heart Rate Before Warm-up  </td>
              <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1hrbw$x' readonly /></td>";
}
?> 
        </tr>
        <tr>
         
          <td >Heart Rate After  Cooldown 3'  </td>
           <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1hrac$x' readonly/></td>";
}
?> 
        </tr>
        <tr>
         
          <td >Other Notes </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {  
  echo "<td><input type='text' name='' id='s1on$x' readonly/></td>";
}
?> 
      
   
  </tr>


   <tr>
      <td colspan="2">Appetite ( Breakfast )</td>
        <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='a_b$x' readonly /></td>";
}
?> 
      
  </tr>
   <tr>
      <td colspan="2"> Appetite ( Lunch )</td>
       <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='a_l$x' readonly/></td>";
}
?> 
      
  </tr> 

  <tr>
      <td colspan="2">Length of Sleep ( Day )</td>
        <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='losd$x' readonly/></td>";
}
?> 
      
  </tr>
  <tr>
      <td colspan="2">Quality of Sleep ( Day )</td>
        <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='qosd$x' readonly/></td>";
}
?> 
  </tr>  <tr>
  <td rowspan="13"><center>Session 2 </center> </td>
      <td>Training Start Time : </td>
        <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1tst$x' readonly/></td>";
}
?> 
      
  </tr>  <tr>
      <td>Training End Time : </td>
        <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s1tet$x' readonly /></td>";
}
?> 
      
  </tr>
  <tr>


          <!-- <td rowspan="11"><center>  Session 2</center> </td> -->
          <td>Activity / Training <br>( Detail )  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2at$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Thoughts / <br>Feelings  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2tf$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Total Volume  </td>
              <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2tv$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
       
          <td>Tiredness Sensation   </td>
           <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2ts$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
        
          <td>Training Willingness </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2tw$x' readonly/></td>";
}
?> 
        </tr>
         <tr>
         
          <td>Muscle Soreness  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2ms$x' readonly/></td>";
}
?> 
        </tr> <tr>
         
          <td>Competitive Willingness  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2cw$x' readonly /></td>";
}
?> 
        </tr> <tr>
        
          <td>Rated Perceived Exertion  </td>
            <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2rpe$x' readonly/></td>";
}
?> 
        </tr> 
        <tr>
         
          <td>Heart Rate Before Warm-up  </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2hrbw$x' readonly/></td>";
}
?> 
        </tr>
        <tr>
         
          <td>Heart Rate After  Cooldown 3'  </td>
           <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2hrac$x' readonly/></td>";
}
?> 
        </tr>
        <tr>
         
          <td>Other Notes </td>
             <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='s2on$x' readonly/></td>";
}
?> 
   
   
  </tr>
  <tr>
      <td colspan="2"> Appetite ( Dinner )</td>
       <?php  
for ($x = 1; $x <= 31; $x++) {
  echo "<td><input type='text' name='' id='aptdinner$x' readonly/></td>";
}
?> 
      
  </tr> 
  
</table>
</div>


<!-- <a href="form2.html" > <button> Monthly  </button></a> -->


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
$( document ).ready(function() {

// alert('herere');

$.ajax({
    type: 'post',
    url: 'functions/monthlytrainingdata.php',
  
    
    
    success: function (data) {
   
        var data = jQuery.parseJSON(data);
// alert(data[0].id);
// alert(data[0].timestamp);
// alert(data[1].id);
// alert(data[2].id);
// alert(data[3].id);

// alert(data);



// alert(data[0].day);
// alert(data[1].day);
// return false;

var x;
 
for (x = 0; x <= data.length - 1; x++) {
  // echo "<td><input type='text' name='' id='' readonly/></td>";


// var  abc = parseInt(data[x].day) 
// var final = abc + 1;
// alert(final);

  $('#ahr'+data[x].day).val(data[x].ahr);
  $('#losn'+data[x].day).val(data[x].losn);
  $('#qosn'+data[x].day).val(data[x].qosn);
  $('#tst'+data[x].day).val(data[x].tst);
  $('#tet'+data[x].day).val(data[x].tet);
  $('#s1at'+data[x].day).val(data[x].s1at);
  $('#s1tv'+data[x].day).val(data[x].s1tv);
  $('#s1tf'+data[x].day).val(data[x].s1tf);
  $('#s1ts'+data[x].day).val(data[x].s1ts);
  $('#s1tw'+data[x].day).val(data[x].s1tw);
  $('#s1ms'+data[x].day).val(data[x].s1ms);
  $('#s1cw'+data[x].day).val(data[x].s1cw);
  $('#s1rpe'+data[x].day).val(data[x].s1rpe);
  $('#s1hrbw'+data[x].day).val(data[x].s1hrbw);
  $('#s1hrac'+data[x].day).val(data[x].s1hrac);
  $('#a_b'+data[x].day).val(data[x].a_b);
  $('#a_l'+data[x].day).val(data[x].a_l);
  $('#losd'+data[x].day).val(data[x].losd);
  $('#qosd'+data[x].day).val(data[x].qosd);
  $('#s1tst'+data[x].day).val(data[x].s1tst);

  $('#s1tet'+data[x].day).val(data[x].s1tet);
  $('#s2at'+data[x].day).val(data[x].s2at);
  $('#s2tf'+data[x].day).val(data[x].s2tf);
  
  $('#s2tv'+data[x].day).val(data[x].s2tv);
  $('#s2ts'+data[x].day).val(data[x].s2ts);
  $('#s2tw'+data[x].day).val(data[x].s2tw);
  $('#s2ms'+data[x].day).val(data[x].s2ms);
  $('#s2cw'+data[x].day).val(data[x].s2cw);
  $('#s2rpe'+data[x].day).val(data[x].s2rpe);
  $('#s2hrbw'+data[x].day).val(data[x].s2hrbw);
  $('#s2hrac'+data[x].day).val(data[x].s2hrac);
  $('#s2on'+data[x].day).val(data[x].s2on);
  $('#aptdinner'+data[x].day).val(data[x].aptdinner);
  $('#s1on'+data[x].day).val(data[x].s1on);

   
}






// console.log(data);
// return false;


   }


 });
 });




</script>

</body>

</html>