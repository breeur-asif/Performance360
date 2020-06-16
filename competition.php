<?php
error_reporting(0);
session_start();
include "config.php";

if($_POST["data_id"]){
  
   $sql2 = "SELECT * FROM calender where calender_id ='".$_POST["data_id"]."'";

$result2 = mysqli_query($conn, $sql2);  

while($row = mysqli_fetch_assoc($result2)) {
  
  $competation_name = $row['competation_name'];
  
}
}
if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{

  $name = $_SESSION["name"];

}
if (isset($_POST['submit'])) {


  // print_r($_POST);
  // die;
$user_id = $_SESSION['id'];
$calid = $_POST['calid'];
$competation_name = $_POST['competation_name'];
$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];
$event1 = $_POST['Medications1'];
$event1s = implode('||' , $event1);

$performance1 = $_POST['performance1'];
$performance1s = implode('||' , $performance1);


$result1 = $_POST['result1']; 
$result1s = implode('||' , $result1);

$post1 = $_POST['post1'];
$post1s = implode('||' , $post1);

$postion1 = $_POST['postion1'];
$position1s = implode('||' , $postion1);

$strength = $_POST['strength'];
$weakness = $_POST['weakness'];
$opportunity = $_POST['opportunity'];
$threads = $_POST['threads'];
    

if($calid > 0 ){

$sql = "UPDATE `calender` SET `competation_name`='".$competation_name."',`date_from`='".$date_from."',`date_to`='".$date_to."',`event1`='".$event1s."',`performance1`='".$performance1."',`result1`='".$result1s."',`post1`='".$post1s."',`postion1`='".$position1s."',`strength`='".$strength."',`weakness`='".$weakness."',`opportunity`='".$opportunity."',`threads`='".$threads."',`cr_date`=now() WHERE calender_id ='".$calid."' ";


if (mysqli_query($conn, $sql)) {
    echo " record updated successfully";
    
     header("location: competition.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
}else{


   
   $sql = "INSERT INTO `calender`(`user_id`,`competation_name`, `date_from`, `date_to`, `event1`, `performance1`, `result1`, `post1`, `postion1`,  `strength`, `weakness`, `opportunity`, `threads`, `cr_date`) VALUES ('$user_id','$competation_name','$date_from','$date_to','$event1s','$performance1s','$result1s','$post1s','$position1s','$strength','$weakness','$opportunity','$threads',now())";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
     header("location: competition.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
}

  }

$sportdata ='<option> select sport event </option>';
 $sqlsports = "select * from sport_event where `sport` = '".$_SESSION['sport']."' order by sport ";
$resultsports = mysqli_query($conn, $sqlsports);

while($sport = mysqli_fetch_assoc($resultsports)){

  $sportdata = $sportdata ."<option value='".trim($sport['sport']).'___'.trim($sport['event'])."'> ".$sport['sport'].'-'.$sport['event']. " </option> ";
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
  <link href=" vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=" css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href=" vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
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
        <div class="sidebar-brand-text mx-3"> Performance 360</div>
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
            <!--     <a class="dropdown-item" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">    Competition Calendar </h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">
 <!--- 1st  nav-->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
             <!-- start page -->
             <div class="container-fluid">
              <div class="row">
                <div class="col-lg-3">
             <br>

             <br>
                      
<?php 

 $sql3 = "SELECT * FROM calender where user_id ='".$_SESSION['id']."' order by date_from";

$result3 = mysqli_query($conn, $sql3);  

$counter =1;

while($row = mysqli_fetch_assoc($result3)) {

?>

<?php $array = array("lightgreen", "#FFE4C4","#F0FFFF", "lightblue", "orange", "pink", "#FFF8DC","#1cc88a"); ?>
<div class="card getdata " style="width:auto;"   id= "<?php echo $row['calender_id']; ?>" >
<div class="card-header "  style="background-color:<?php echo $array[array_rand($array, 1)] ?>">
<center><h4><?php echo  date("d-m-Y", strtotime($row['date_from'])); ?></h4></center>
<center><h3><?php echo $row['competation_name']; ?></h3></center>
</div>
</div>
<center><img src="arrow.png" ></center>
<br>

<?php 
  } ?> 
              
<div class="card getdatanew " style="width:auto;"   id= "<?php echo $row['calender_id']; ?>" >
<div class="card-header bg-success">
<h4><center>Add Event </center></h4>
</div>
</div>

        
             </div>

             <!-- end  nav-->
             <div class="col-lg-9"  id="mainform">

                    <div class="row">
                            <div class="col-lg-12 mb-12">
                              <div class="card">

                                <div class="card-body">
<form action="competition.php" method="post" id="form1" >
                                  <div class="form-group row">
                                    <label class="col-lg-4 control-label" for="selectbasic">Competition Name</label>
                                    <div class="col-lg-8">
                                  <input type="text" name="competation_name" id="competation_name" value="<?php echo $competation_name; ?>">
                                  <input type="hidden" id="calid" name="calid" value="">
                                    </div>
                                  </div>

             <!-- 2nd -->
             <div class="form-group row">
             <label class="col-lg-4 control-label" for="selectbasic">Competition Start Date  </label>
             <div class="col-lg-8">
             <input  type="date" name="date_from"  id="date_from" value="">
           </div>
         </div>

             <div class="form-group row">
             <label class="col-lg-4 control-label" for="selectbasic">Competition End Date  </label>
             <div class="col-lg-8">
             <input style="width:auto" type="date" name="date_to" id="date_to" value="">
           </div>
         </div>
           <!--   &nbsp;
             To&nbsp; -->

             <!-- table-->
             <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
                   <tr>
                     <th rowspan="2"> Sr no: </th>
                     <th rowspan="2">Select Event</th>
                     <th rowspan="2">Performance Expectation </th>
                     <th colspan="3"><center>Post Competition</center></th>
                     

                
                     

                   </tr>
                   <tr>
                   
                 
                   <th>Your Result</th>
                     <th> Winning Result </th>
                     <th>Position</th>
</tr>
                 </thead>

                 <tbody>
                   <tr>
                     <td>Events </td>
                     <td><select id="Medications" name="Medications1[]" class="dynamictable">
                      <?php echo $sportdata ?> 
                   
                 
                    </select></td>
                     <td><input type="text" name="performance1[]" id="performance" value=""></td>
                     <td><input type="text" name="result1[]" id="result" value=""></td>
                     <td><input type="text" name="post1[]" id="post" value=""></td>
                     <td><input type="text" name="postion1[]" id="postion" value=""></td>

                   </tr>
              <!--      <tr>
                     <td>Event2</td>
                     <td><input type="text" name="event2" value=""></td>
                     <td><input type="text" name="performance2" value=""></td>
                     <td><input type="text" name="result2" value=""></td>
                     <td><input type="text" name="post2" value=""></td>
                     <td><input type="text" name="postion2" value=""></td>

                   </tr> -->
                    
                    
                 </tbody>
               </table>

<button type="button" class='delete'>- Delete</button>
<button type="button" class='addmore'>+ Add More</button>

             </div>
             <div class="row">
   
              <div class="col-md-6">
                <div class="card" style="width:auto;">
               <div class="card-header">
                 Strength
               </div>
               <div class="card-body">
<textarea  style="width:100%; height: 150px;" name="strength"  id="strength" value=""></textarea>
               </div>
             </div>
             </div>


             <div class="col-md-6">
              <div class="card" style="width:auto;">
               <div class="card-header">
                   Weakness
               </div>
               <div class="card-body">
<textarea  style="width:100%; height: 150px;" name="weakness" id="weakness" value=""></textarea>
               </div>
             </div>
             </div>
 </div>  <div class="row">

             <div class="col-md-6">
              <div class="card" style="width:auto;">
               <div class="card-header">
                 Opportunity
               </div>
               <div class="card-body">
<textarea  style="width:100%; height: 150px;"  name="opportunity" id="opportunity" value=""></textarea>
               </div>
             </div>
             </div>


             <div class="col-md-6">
              <div class="card" style="width:auto;">
               <div class="card-header">
             <h7>Threats </h7> </div>
               <div class="card-body">
<textarea  style="width:100%; height: 150px;" name="threads" id="threads" value=""></textarea>
               </div>
             </div>
             </div>


              </div>
              <br>
            </br>

             <div><button type="submit" class="btn btn-primary" name="submit">Save</button>&nbsp;&nbsp;
     <!--         <input class="btn btn-secondary" id="refreshbtn" value="Add competition"> -->
             </div>

</form>
               </div>
                              </div>





                              </div>
                      </div>





             </div>












           </div>
          </div>
             <!-- end page -->
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
  <script src=" vendor/jquery/jquery.min.js"></script>

 
  <script src=" vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src=" vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src=" js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src=" vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src=" js/demo/chart-area-demo.js"></script>
  <script src=" js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src=" vendor/datatables/jquery.dataTables.min.js"></script>
  <script src=" vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src=" js/demo/datatables-demo.js"></script>

<script>

$( document ).ready(function() {
   $('#mainform').hide();
});



  $('.getdatanew').click(function(){

  // $("form")[0].reset();
$(".case").prop('checked', true);

  $('.delete').trigger('click')

  $('#mainform').show();

$('#calid').val(0);

// location.reload();
  $("#form1")[0].reset();
$('#competation_name').prop("readonly", false);

$('#date_from').prop("readonly", false);
$('#date_to').prop("readonly", false);
$('#event1').prop("readonly", false);
$('#performance1').prop("readonly", false);
$('#result1').prop("readonly", false);
$('#postion1').prop("readonly", false);
$('#strength').prop("readonly", false);
$('#weakness').prop("readonly", false);

$('#opportunity').prop("readonly", false);
$('#threads').prop("readonly", false);





});

  $('.getdata').click(function(){

      $('#mainform').show();
    
  var data_id =this.id;
  
  

$.ajax({
    type: 'post',
    url: ' functions/competition.php',
  
    
    data : { 'data_id' : data_id },
    success: function (data) {

$(".case").prop('checked', true);

  $('.delete').trigger('click')

        var data = jQuery.parseJSON(data);








$('#calid').val(data[0].calender_id);
(data[0].user_id);
$('#competation_name').val(data[0].competation_name);
$('#date_from').val(data[0].date_from);
$('#date_to').val(data[0].date_to);

  var result04 = data[0].event1.split('||');
  var result = data[0].performance1.split('||');
  var result01 = data[0].result1.split('||');
  var result02 = data[0].post1.split('||');
  var result03 = data[0].postion1.split('||');


// alert(result04[0])
// alert(result04[1])
// alert(result04[2])
// alert(result04[3])
// return false;

 $("#Medications").val(result04[0]).attr("selected","selected"); 

$('#performance').val(result[0]);
$('#result').val(result01[0]);
$('#post').val(result02[0]);
$('#postion').val(result03[0]);



    



var p = 1;

for (var i = 2; i <= result.length; i++) {


  $('.addmore').trigger('click');
   $('#Medications'+i).val(result04[p]).attr("selected","selected");
  $('#performance1'+i).val(result[p]);
  $('#result1'+i).val(result01[p]);
  $('#post1'+i).val(result02[p]);
  $('#postion1'+i).val(result03[p]);
p++;
}




$('#strength').val(data[0].strength);
$('#weakness').val(data[0].weakness);
$('#opportunity').val(data[0].opportunity);
$('#threads').val(data[0].threads);

// $('#Medications').val(data[0].event1).selected();

// DISABLE PROPERTY

$('#competation_name').prop("readonly", true);

$('#date_from').prop("readonly", true);
$('#date_to').prop("readonly", true);
$('#event1').prop("readonly", true);
$('#performance1').prop("readonly", true);
$('#result1').prop("readonly", true);
$('#postion1').prop("readonly", true);
$('#strength').prop("readonly", true);
$('#weakness').prop("readonly", true);

$('#opportunity').prop("readonly", true);
$('#threads').prop("readonly", true);




} 
});
    
    
    
    
  })


$(".delete").on('click', function() {
  $('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
  check();
i=2;
});


var i=2;
$(".addmore").on('click',function(){
  count=$('table tr').length;
    var data="<tr><td style='padding:15px 0px;' ><input type='checkbox' class='case' />";
    data +=" Event"+i+"</td> <td><select id='Medications"+i+"' name='Medications1[]' class='dynamictable'><?php echo $sportdata ?> </select></td><td><input type='text' name='performance1[]' id='performance1"+i+"' value=''></td><td><input type='text' name='result1[]' id='result1"+i+"' value=''></td><td><input type='text' id='post1"+i+"' name='post1[]' value=''></td> <td><input type='text' id='postion1"+i+"' name='postion1[]' value=''></td></tr>";
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



  $("#refreshbtn").click(function(){
      location.reload();
  });

  
</script>




</body>

</html>
