<?php

session_start();
error_reporting(0);
include "config.php";

if($_SESSION["id"] == ""){
	header("Location: login.php");
}
else{
	
	$name = $_SESSION["name"];
	
}

 $tp = $_GET['tp'];


$check =  $_GET['w'];

if($check == 1){
  $session  = '1';
$day = 'monday';

}else if($check == 2){
   $session  = '1';
$day = 'tuesday';
}else if($check == 3){
   $session  = '1';
$day = 'wednessday';
}else if($check == 4){
   $session  = '1';
$day = 'thursday';
}else if($check == 5){
   $session  = '1';
 $day = 'friday';
}else if($check == 6){
   $session  = '1';
$day = 'saturday';
}else if($check == 7){
   $session  = '1';
$day = 'sunday';
}else if($check == 8){
   $session  = '2';
$day = 'monday';
}
  else if($check == 9){
   $session  = '2';
$day = 'tuesday';
}else if($check == 10){
   $session  = '2';
$day = 'wednessday';
}else if($check == 11){
   $session  = '2';
$day = 'thursday';
}else if($check == 12){
   $session  = '2';
 $day = 'friday';
}else if($check == 13){
   $session  = '2';
$day = 'saturday';
}else if($check == 14){
   $session  = '2';
$day = 'sunday';
}


// <?php 

$urlgetdata = $_GET['w'];

$query="SELECT * FROM `exercises` ORDER BY `exercise_group` ASC";
$result1=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query);
 $sql = "SELECT * FROM `excersice_prescription` WHERE user_id = '".$_SESSION['id']."' and check_id = '".$urlgetdata."' ";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) { 



 while($row = mysqli_fetch_assoc($result)) {



$session_title = $row['session_title'];
$session_color = $row['session_color'];
$exercise_group = $row['exercise_group'];
$exercise_name = $row['exercise_name'];
$sets_1 = $row['sets_1'];
$rep_1 = $row['rep_1'];
$intensity = $row['intensity'];
$recovery = $row['recovery'];



// <?php 
// if($row['number_of_session'] == 2){ 


//  } 
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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

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
            <h1 class="h3 mb-0 text-gray-800">Select Exercise from Database</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
              <form id='excercise'>
	            <div class="card-body">
						            	
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="textinput">Session Title</label>  
					  <div class="col-md-5">
					  <input id="Title" name="Title" type="text" placeholder="Session Title" class="form-control input-md" value="<?php echo $session_title ?>" >
            <input id="trainingphase" name="trainingphase" type="hidden" >
					    
					  </div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="selectbasic">Select Colour</label>
					  <div class="col-md-5">
					    <select id="selectbasic" name="Colour" class="form-control"  >
					      <option value="Red">Red</option>
					      <option value="Blue">Blue</option>
					    </select>
					  </div>
					</div>
					<input type="hidden" id="check" name="check" value="<?php echo $check ?>">
          <input type="hidden" id="day" name="day" value="<?php echo $day ?>">
          <input type="hidden" id="sesion" name="sesion" value="<?php echo $session ?>">
          <input type="hidden" id="trainingphase" name="trainingphase" value="<?php echo $tp ?>">


					<!--Table-->
					<table id="tablePreview" class="table table-bordered">
					<!--Table head-->
					  <thead>
					    <tr>
					      <th>Sr. No.</th>
					      <th>Exercise Group</th>
					      <th>Exercise Name</th>
					      <th>Sets</th>
					      <th>Reps</th>
					      <th>Intensity</th>
					      <th>Recovery</th>
					    </tr>
					  </thead>
					  <!--Table head-->
					  <!--Table body-->
					  <tbody>
					    <tr>
					      <td> 1</td>
					      <td>
					    <select id="ExerciseGroup" name="ExerciseGroup[]" class="form-control" >
              <?php while($row1=mysqli_fetch_array($result1)):;?>  
              <option value="<?php echo $row1[1]; ?>  "><?php echo $row1[1]; ?> </option>
              
<?php endwhile; ?> 
             
					    </select></td>
					      <td>
					    <select id="ExerciseName" name="ExerciseName[]" class="form-control" value="<?php echo $exercise_name ?>" >
              <?php while($row1=mysqli_fetch_array($result2)):;?>  
              <option value="<?php echo $row1[2]; ?>  "><?php echo $row1[2]; ?> </option>
              
<?php endwhile; ?> 
					    </select></td>
					      <td>
					    <select id="Sets" name="Sets[]" class="form-control" value="<?php echo $sets_1 ?>" >
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					    </select></td>
					      <td>
					    <select id="Reps" name="Reps[]" class="form-control" value="<?php echo $rep_1 ?>" >
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					    </select></td>
					      <td><input id="Intensity" name="Intensity[]" type="text" placeholder="Intensity" class="form-control input-md" value="<?php echo $intensity ?>" ></td>
					      <td><input id="Recovery" name="Recovery[]" type="text" placeholder="Recovery" class="form-control input-md" value="<?php echo $recovery ?>" ></td>

					    </tr>
					  </tbody>


					  <!--Table body-->
					</table>
					<!--Table-->
<button type="button" class='delete'>- Delete</button>
<button type="button" class='addmore'>+ Add More</button>
         <center>  <button   id="save_btn" class="btn btn-primary"> save</button> <a href="exerciseprescription.php" class="btn btn-primary"> Back</a></center>


	            </div>
</form>

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

<script>

$( document ).ready(function() {
     document.getElementById("selectbasic").value = "<?php echo $session_color ?>";
     document.getElementById("ExerciseGroup").value = "<?php echo $exercise_group ?>";
     document.getElementById("exercise_name").value = "<?php echo $exercise_name ?>";
     document.getElementById("Sets").value = "<?php echo $sets_1 ?>";
     document.getElementById("Reps").value = "<?php echo $rep_1 ?>";
     document.getElementById("exercise_name").value = "<?php echo $exercise_name ?>";
});


$('#save_btn').click(function(){


  // alert('success');

// alert($('#Nutritional').serialize());

$.ajax({
    type: 'post',
    url: '../../functions/excercise.php',
    data: $('#excercise').serialize(),
    success: function (data) {
alert(data);
console.log(data);
return false;
    // var result=data;
    // $('#result').attr("value",result);

if(data >= 1){

alert('success');

window.location.href="exerciseprescription.php";


}else{

  alert("fail");
location.reload();

}

    }
});

});




$(".delete").on('click', function() {
  $('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
  check();
i=2;
});


var i=2;
$(".addmore").on('click',function(){
  count=$('table tr').length;
    var data="<tr><td> <input type='checkbox' class='case' /> "+i+"</td><td><select id='ExerciseGroup"+i+"' name='ExerciseGroup[]' class='form-control' > <?php while($row1=mysqli_fetch_array($result1)):;?>   <option value='<?php echo $row1[1]; ?>  '><?php echo $row1[1]; ?> </option><?php endwhile; ?>  </select></td><td><select id='ExerciseName' name='ExerciseName[]' class='form-control' value='' ><option value='Cardio'>Cardio</option><option value='Plyometrics'>Plyometrics</option><option value='Stretches'>Stretches</option><option value='Strength'>Strength</option> </select></td> <td><select id='Sets' name='Sets[]' class='form-control' value='' ><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select></td> <td><select id='Reps' name='Reps[]' class='form-control' value='' ><option value='1'>1</option>  <option value='2'>2</option><option value='3'>3</option> </select></td> <td><input id='Intensity' name='Intensity[]' type='text' placeholder='Intensity' class='form-control input-md' value='' ></td> <td><input id='Recovery' name='Recovery[]' type='text' placeholder='Recovery' class='form-control input-md' value='' ></td></tr>";
  $('table').append(data);
  i++;
});





function select_all() {
  $('input[class=case]:checkbox').each(function(){ 
    if($('input[class=check_all]:checkbox:checked').length == 0){ 
      $(this).prop("checked", false); 
    } else {
      $(this).prop("checked", true); 
    } 
  });
}

function check(){
  obj=$('table tr').find('span');
  $.each( obj, function( key, value ) {
  id=value.id;
  $('#'+id).html(key+1);
  });



  }


</script>



</body>

</html>
