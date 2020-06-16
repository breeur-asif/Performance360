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

  <title>Competition Calendar (Client View)</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
<br>


<br>


				<div class="card" style="width: 18rem;">
				  <div class="card-header bg-success">
				 <h2>   20/20/2019</h2>
                 GMAAA
				  </div>

				</div>
				<br>
				<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

				<br>

				<div class="card" style="width: 18rem;">
  <div class="card-header bg-info">
		<h2> 10/11/2019 </h2>
		 MSAAA Swimming Competation
  </div>
 </div>


<br><center><i class="fa fa-arrow-down" aria-hidden="true"></i></center>

<br>
<div class="card" style="width: 18rem;">
  <div class="card-header bg-warning">
     <h2>12/12/2019 </h2>
   National Swimming Championship
  </div>

</div>
</div>

<div class="col-lg-9">

				<div class="row">
		  					<div class="col-lg-12 mb-12">
									<div class="card">
									  <div class="card-header">
									    MSAA Swimming Competation(10/11/2019)
									  </div>
									  <div class="card-body">

											<div class="form-group row">
												<label class="col-md-2 control-label" for="selectbasic">Competation Name:</label>
												<div class="col-md-10">
											<input type="text" name="name" value="">
												</div>
											</div>

<!-- 2nd -->
<div class="form-group row">
<label class="col-md-3 control-label" for="selectbasic">Competation Date  form</label>
<div class="col-md-3">
<input type="text" name="name" value="">
</div>
<label class="col-md-2 control-label" for="selectbasic">To</label>

<div class="col-md-4">
<input type="text" name="name" value="">
</div>
</div>



<!-- table-->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th></th>
        <th>Select Event</th>
        <th>Preformance Expection </th>
        <th>Your Result</th>
        <th>Post Competation Winning result </th>
        <th>Postion</th>
       <!-- <th>Reg. Date</th>
        <th>Followup Date</th>
        <th>Sports</th>-->
        <th></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>Event1</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">6</span></td>
      </tr>
      <tr>
        <td>Event2</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">2</span></td>
      </tr>
      <tr>
        <td>Event3</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">2</span></td>
      </tr>
      <tr>
        <td>Event4</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">2</span></td>
      </tr>
      <tr>
        <td>Event5</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">2</span></td>
      </tr>
      <tr>
        <td>Event6</td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>
        <td><input type="text" name="name" value=""></td>

        <td><span class="badge badge-danger badge-counter">2</span></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="row">
<div class="col-md-1"></div>
	<div class="col-md-2">
		<div class="card">
  <div class="card-header">
    Strength
  </div>
  <div class="card-body">

  </div>
</div>
</div>
<div class="col-md-2">
	<div class="card">
  <div class="card-header">
    Weakness
  </div>
  <div class="card-body">

  </div>
</div>
</div>
<div class="col-md-2">
	<div class="card">
  <div class="card-header">
    Opportunity
  </div>
  <div class="card-body">

  </div>
</div>
</div>
<div class="col-md-2">
	<div class="card">
  <div class="card-header">
Threads  </div>
  <div class="card-body">

  </div>
</div>
</div>

<div class="col-md-3"><button type="button" class="btn btn-primary">Save</button><br>
<button type="button" class="btn btn-secondary">Back</button>
</div>




</div>







									  </div>
									</div>





      						</div>
					</div>





</div>
</div>
</div>









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

</body>

</html>
