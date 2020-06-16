<?php

session_start();
include "config.php";

if($_SESSION["id"] == ""){
header("Location: login.php");
}
else{

$name = $_SESSION["name"];

}


if (isset($_POST['submit'])) {
 
 
 $randomid = rand(999,9999);
  $target_dir = "img/report/";
    $imageFileType = strtolower(pathinfo(basename($_FILES["myFile"]["name"]),PATHINFO_EXTENSION));
    $target_file = $target_dir . $_SESSION["id"] . 'rep'. $randomid . "." . $imageFileType;
    move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file);



$medical_report = $_POST['medical_report'];
  $file_upload = $target_file;

  $start_date = $_POST['start_date'];
 

$sql= "INSERT INTO `medical_report`(`medical_report`,`user_id`,`byadmin`, `file_upload`, `start_date`, `cr_date`) VALUES ('$medical_report','".$_SESSION["id"]."',0,'$file_upload','$start_date',now()) ";

if (mysqli_query($conn, $sql)) {
  header("location: medicalreport.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


// mysqli_close($conn);

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
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admindashboard.php">
        <div class="sidebar-brand-text mx-3"><i class="fas fa-arrow-left"></i> Back to  Admin Panel </div>
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
            <h1 class="h3 mb-0 text-gray-800">Medical Report</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
           <div class="card-body">
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
    white-space: nowrap;

}

/*tr:nth-child(even) {*/
/*  background-color: #dddddd;*/
/*}*/
</style>
           
<div class="container-fluid">
<div class="row">
<div class="col-lg-3">
  
  
  
  
  <div class="card getdataform" style="width: auto;" >
 <div class="card-header bg-success">
<h5>  Upload a Medical Report</h5>

 </div>
 
 

</div>
<br>

<div class="card getdata"  style="width: auto;">
 <div class="card-header bg-secondry">
<h5>   Past Medical Report  
</h5>
 </div>

</div><br>





<!--<div class="card getdataform" style="width: auto;" >-->
<!-- <div class="card-header bg-success">-->
<!--<h5>  Upload a Medical Report</h5>-->

<!-- </div>-->

<!--</div>-->


<!--<div class="card  getdata123  " style="width: auto;">-->
<!-- <div class="card-header bg-info">-->
<!--    <h5> See Past Medical Report By Admin </h5>-->
<!--  </div>-->

<!--</div>-->
        


<div class="card  getdata1  " style="width: auto;">
 <div class="card-header bg-warning">
    <h5> Schedule a Medical Test </h5>
  </div>

</div>
              <br>

             <center> <h3> Reminder List</h3></center>

                <?php

$sql2 = "SELECT * FROM  scheduletest where user_id='".$_SESSION['id']."'";

$result3 = mysqli_query($conn, $sql2);  


while($row1 = mysqli_fetch_assoc($result3)){

?>


<div class="card  " style="width:auto;"   id= "<?php echo $row1['id']; ?>" >
<div class="card-header bg-info">

<center> <h4><b><?php echo $row1['title']; ?> </b></h4></center>
<center><h3><b><?php echo date("d-m-Y", strtotime($row1['date']) );?> </b></h3></center>
 
</div>

</div>

<br>



<?php } ?>




</div>

<div class="col-lg-9" >

<div class="row">
  <div class="col-lg-12 mb-12" >
<div class="card">

 <div class="card-body cardset" >
                                   




<!--<div class="table-responsive" id="maindata1">-->
<!-- <table class="display table table-striped table-bordered" id="" width="100%" cellspacing="0">-->
<!--   <thead>-->
<!--     <tr>-->
<!--                      <th> Sr.no </th>-->
<!--       <th>Date</th>-->
<!--       <th>Report  Name </th>-->
<!--                        <th>File </th>-->
<!--     </tr>-->
<!--   </thead>-->

<!--   <tbody>-->
                    <?php


                                          //$sql = "SELECT * FROM medical_report where user_id = '".$_SESSION['id']."' and byadmin = 1   ";
                                          //$result = mysqli_query($conn, $sql);
                                          // echo $result;
                                          //  die;
                                          //if (mysqli_num_rows($result) > 0) {
                                              // output data of each row
                                           //   $counter =1;
                                              
                                           //   while($row = mysqli_fetch_assoc($result)) {
                                           //       echo "<tr>
                                           //       <td>" . $counter . "</td>
                                           //       <td>" .date("d-m-Y", strtotime( $row["start_date"])) . "</td>
                                           //       <td>" . $row["medical_report"] . "</td>
                                               
                                           //<td><a href='".$row["file_upload"]."' target='_blank'> View </a></td>
                                                 
                                                         
                                                           

                                           //             </tr>";
                                                        
                                           //             $counter++;
                                          //    }
                                          //}

                                      ?>
                                      
 
<!--   </tbody>-->
<!-- </table>-->
<!--</div>-->




<div class="table-responsive" id="maindata">
 <table class="display table table-striped table-bordered" id="" width="100%" cellspacing="0">
   <thead>
     <tr>
                      <th> Sr.no </th>
       <th>Date</th>
       <th>Report  Name </th>
                        <th>File </th>
     </tr>
   </thead>

   <tbody>
                    <?php


                                          $sql = "SELECT * FROM medical_report where user_id = '".$_SESSION['id']."' and byadmin = 0 ";
                                          $result = mysqli_query($conn, $sql);
                                          // echo $result;
                                          //  die;
                                          if (mysqli_num_rows($result) > 0) {
                                              // output data of each row
                                              $counter =1;
                                              
                                              while($row = mysqli_fetch_assoc($result)) {
                                                  echo "<tr>
                                                  <td>" . $counter . "</td>
                                                  <td>" .date("d-m-Y", strtotime( $row["start_date"])) . "</td>
                                                  <td>" . $row["medical_report"] . "</td>
                                               
                                           <td><a href='".$row["file_upload"]."' target='_blank'> View </a></td>
                                                 
                                                         
                                                           

                                                        </tr>";
                                                        
                                                        $counter++;
                                              }
                                          }

                                      ?>
                                      
 
   </tbody>
 </table>
</div>








<br>

<div class="form-group row medicalformhide">
<div class="col-md-12"><h1> <center>Upload Report </center></h1></div>
</div>

<form class="medicalformhide" action="medicalreport.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                             <div class="col-md-6">
                                              Report Title:
                                             </div>
                                             <div class="col-md-6">
                                              Choose Report File:
                                             </div>

                                           </div>  
                                    <div class="row">
                                      <div class="col-md-6">
  <input type="text" id="medical_report" name="medical_report">
                                
                                                               
 </div>

                                      <div class="col-md-6">
                                        <input type="file" id="myFile" name="myFile">
                                      </div>
                                    </div>

    <div class="row" style="padding-top: 15px;">
                                             <div class="col-md-6">
                                              Select Date:
                                             </div>
                                             <div class="col-md-6">
                                           
                                             </div>

                                           </div>

                                      <div class="row" >
                                      <div class="col-md-6">
                                        <input type="date" name="start_date"  placeholder="dd/mm/yyyy"value=""> &nbsp;&nbsp;
                                       </div>
                                       <div class="col-md-6">
                                       <button type="submit"  name ="submit"  class="btn btn-primary">upload</button>
                                      </div>



                                    </div><!--row-->



                       </form>



    <br>

              <div class="form-group  medicalformhide1">
              <div class="col-md-12"> <h1><center>Schedule Test </center></h1></div>
           

<!-- <form class="testformhide" method="post"  id="testform"> -->

 
   <div class="row">
                      <div class="col-md-6">
                      <label> Date <span style="color:red">*</span>:  </label>  
                      <input type="date" name="start_date" id="testdate" value="">
                      </div>
                      <div class="col-md-6">
                      <label> Test Name <span style="color:red">*</span>: </label>
                      <input type="text" name="testname" id="testname" >
                      </div>
                     </div>  
        <div class="row">
        <div class="col-md-3">
        </div> <div class="col-md-4">

        <center>
          <button type="button"  name="button" id="Scheduletest"  class="btn btn-primary">upload</button></center>
        </div>
        <div class="col-md-5">
        </div>
        </div>



<!-- </form> -->

</div>
</div>







 </div>
</div>





      </div>
</div>





</div>
</div>













<!--card end-->
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

<!-- 30/4/2020 -->
<script>

$( document ).ready(function() {

$(document).ready(function() {
    $('table.display').DataTable();
} );

   $('#maindata').hide();
   $('#maindata1').hide();
   $('.cardset').hide();
   $('.medicalformhide').hide();
   $('.medicalformhide1').hide();
});

  $('.getdataform').click(function(){
    $('#maindata').hide();
    $('#maindata1').hide();
    $('.medicalformhide1').hide();
    $('.cardset').show();
      $('.medicalformhide').show();


});



  $('.getdata').click(function(){
   
  $('.medicalformhide').hide();
  $('.medicalformhide1').hide();
  $('#maindata1').hide();
$('.cardset').show();
     $('#maindata').show();
  // var data_id =this.id ;

// $.ajax({
//     type: 'post',
//     url: 'functions/clientinjuery.php',
 
   
//     data : { 'data_id' : data_id },
//     success: function (data) {
   

//         var data = jQuery.parseJSON(data);
// $('#input_starttime').val(data[0].timepicker);

// $("#"+ data[0].injuryclass).prop("checked", true);
// (data[0].user_id);
// $('#competation_name').val(data[0].competation_name);



// }
// });    
  })

  $('.getdata1').click(function(){

      $('.medicalformhide').hide();
      $('#maindata').hide();
      $('#maindata1').hide();
      $('.cardset').show();
      $('.medicalformhide1').show();  
});  


//   $('.getdata123').click(function(){

//       $('.medicalformhide').hide();
//       $('#maindata').hide();
    
//       $('.cardset').show();
//       $('.medicalformhide1').hide();  
//         $('#maindata1').show();
// });


$('#Scheduletest').click(function(){

      if($("#testdate").val() == ""){  
        $("#testdate").focus();
        return;
      }

  if($("#testname").val() == ""){  
        $("#testname").focus();
        return;
      }

var   testdate= $("#testdate").val();
var testname  = $("#testname").val();


  $.ajax({
    type: 'post',
    url: ' functions/Scheduletest.php',
    data: { 'testname': testname, 'testdate': testdate },
    success: function (data) {


if(data == 1){

alert('success');

location.reload();



}else{

  alert("fail");

}
    // var result=data;
    // $('#result').attr("value",result);

    }
});


});



</script>
</body>

</html>