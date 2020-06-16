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

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



  <style>


  .project-tab {
      padding: 10%;
      margin-top: -8%;
  }
  .project-tab #tabs{
      background: #007b5e;
      color: #eee;
  }
  .project-tab #tabs h6.section-title{
      color: #eee;
  }
  .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
      color: #0062cc;
      background-color: transparent;
      border-color: transparent transparent #f3f3f3;
      border-bottom: 3px solid !important;
      font-size: 16px;
      font-weight: bold;
  }
  .project-tab .nav-link {
      border: 1px solid transparent;
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem;
      color: #0062cc;
      font-size: 16px;
      font-weight: 600;
  }
  .project-tab .nav-link:hover {
      border: none;
  }

  </style>

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
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i  class="fas fa-fw fa-plus"></i>
          <span>Add New</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="sport_event.php">
          <i class="fas fa-fw fa-glass"></i>
          <span>Sport View Database</span></a>
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
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-bicycle"></i>
          <span>Sports Events Database</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">Profile:</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

	          <!-- DataTales Example -->
	          <div class="card shadow mb-4">
	            <div class="card-body">
                <section id="tabs" class="project-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile Sport</a>
                                                <a class="nav-item nav-link" id="nav-nutritional-tab" data-toggle="tab" href="#nav-nutritional" role="tab" aria-controls="nav-nutritional" aria-selected="false">Nutritional </a>
                                                <!-- <a class="nav-item nav-link" id="nav-medical-tab" data-toggle="tab" href="#nav-medical" role="tab" aria-controls="nav-medical" aria-selected="false">Medical History</a>
                                                <a class="nav-item nav-link" id="nav-bodycomp-tab" data-toggle="tab" href="#nav-bodycomp" role="tab" aria-controls="nav-bodycomp" aria-selected="true">Body Comp</a>
                                                <a class="nav-item nav-link" id="nav-phy-tab" data-toggle="tab" href="#nav-phy" role="tab" aria-controls="nav-phy" aria-selected="false">Physical Skill</a> -->
                                                <!--<a class="nav-item nav-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-family" aria-selected="false">Project Tab 3</a> -->
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                              <div class="container">
                                                <div class="row">
                                                  <div class="col-sm-3">
                                                    <div class="text-center">
                                                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                                      <h6>Upload a different photo...</h6>
                                                      <input type="file" class="text-center center-block file-upload">
                                                    </div>                                      </div>
                                                  <div class="col-sm-9">
                                                    <form>
                                                      <div class="form-group row">

                                                              <div class="col-md-12">
                                                                <label for="first_name"><h6>Name:</h6></label>
                                                                <input type="text" class="form-control" name="fname" id="first_name" placeholder="full name" title="enter your first name if any.">
                                                              </div>
                                                    </div><!--Name-->
                                                    <div class="form-group row">
                                                          <div class="col-md-6 " for="radios">Gender</div>
                                                       <div class="col-md-6 ">
                                                         <label class="radio-inline" for="radios-0">
                                                          <input type="radio" name="radios" id="radios-0" value="Male" checked="checked">
                                                                   Male
                                                                 </label>
                                                         <label class="radio-inline" for="radios-1">
                                                         <input type="radio" name="radios" id="radios-1" value="Female">
                                                             Female
                                                             </label>

                                                       </div>
                                                    </div><!--Gender-->
                                                    <div class="form-group row">

                                                       <div class="col-md-6">
                                                         <label for="dob"><h6>DOB:</h6></label>
                                                         <input type="text" class="form-control" name="dob"  placeholder="mmddyyyy" title="enter your first name if any."></div>
                                                       <div class="col-md-6">
                                                          <label for="dob"><h6>Age:</h6></label>
                                                         <input type="text" class="form-control" name="age"  placeholder="age" title="enter your first name if any.">
                                                         </div>

                                                    </div>	<!-- DOB-->
                                                    <div class="form-group row">

                                                       <div class="col-md-6">
                                                         <label for="phone"><h6>Phone</h6></label>
                                                         <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                                         </div>
                                                         <div class="col-md-6">
                                                                       <label for="email"><h6>Email</h6></label>
                                                                       <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                                         </div>
                                                    </div><!--Email-->

                                                    <div class="form-group row">
                                                       <div class="col-md-6 control-label" for="selectbasic">Sports</div>
                                                       <div class="col-md-6">
                                                                 <select id="selectbasic" name="selectbasic" class="form-control">
                                                                   <option value="Badminton">Badminton</option>
                                                                   <option value="Football">Football</option>
                                                                   <option value="Swimming">Swimming</option>
                                                                 </select>
                                                       </div>
                                                    </div><!-- Sport--->


                                                    <div class="form-group row">

                                                       <div class="col-md-6">
                                                         <label for="phone"><h6>Event:</h6></label>

                                                          </div>
                                                         <div class="col-md-6">
                                                           <input type="checkbox" name="chkl[ ]" value=""><br />
            <input type="checkbox" name="chkl[ ]" value=""><br />
            <input type="checkbox" name="chkl[ ]" value=""><br />
            <input type="checkbox" name="chkl[ ]" value=""><br />
            <input type="checkbox" name="chkl[ ]" value=""> <br />
                                                         </div>
                                                    </div>

                                                    <div class="form-group row">
                                                       <div class="col-md-6 control-label" for="selectbasic">Highest Level Achieved:</div>
                                                       <div class="col-md-6">
                                                                 <select id="selectbasic" name="selectbasic" class="form-control">
                                                                   <option value="International">International</option>
                                                                   <option value="National">National</option>
                                                                   <!-- <option value="Swimming">Swimming</option> -->
                                                                 </select>
                                                       </div>
                                                    </div><!--level-->
                                                    <div class="form-group row">
                                                     <div class="col-md-6 control-label" for="selectbasic">Blood Group:</div>
                                                     <div class="col-md-6">
                                                                 <select id="selectbasic" name="selectbasic" class="form-control">
                                                                   <option value="A">A-</option>
                                                                   <option value="A+">A+</option>
                                                                   <option value="B-">B-</option>
                                                                   <option value="B+">B+</option>
                                                                   <option value="AB-">AB-</option>
                                                                   <option value="AB+">AB+</option>
                                                                   <option value="O-">O-</option>
                                                                   <option value="O+">O+</option>
                                                                 </select>
                                                     </div>
                                                   </div><!--bg-->
                                                   <div class="form-group row">

                                                       <div class="col-md-6">
                                                           <label for="email"><h6>Occuption:</h6></label>
                                                           <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                                       </div>
                                                       <div class="col-md-6">
                                                                     <label for="email"><h6>Occuption Name:</h6></label>
                                                                     <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                                       </div>
                                                   </div>

                                                   <div class="form-group row">

                                                   <div class="col-md-6">
                                                             <label for="phone"><h6>Occuption Phone</h6></label>
                                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                                   </div>
                                             </div>


                                             <hr>
                                              <h2>Other History</h2>
                                             <div class="form-group row">

                                           <div class="col-md-6">
                                             <label for="email"><h6>Father Name:</h6></label>
                                             <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                               </div>
                                               <div class="col-md-6">
                                                   <label for="phone"><h6>Father Phone</h6></label>
                                                   <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                               </div>
                           </div>
                                             <div class="form-group row">
                                                   <div class="col-md-6">
                                                      <label for="email"><h6>Email</h6></label>
                                                       <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                                   </div>
                                                   <div class="col-md-6">
                                                 <label for="phone"><h6>Occuption: </h6></label>
                                               <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">

                                                 </div>
                           </div>


                           <div class="form-group row">
                              <div class="col-md-6 control-label" for="radios">Both parents Working</div>
                              <div class="col-md-6 ">
                                <label class="radio-inline" for="radios-0">
                                  <input type="radio" name="radios" id="radios-0" value="yes" checked="checked">
                                  Yes
                                </label>
                                <label class="radio-inline" for="radios-1">
                                  <input type="radio" name="radios" id="radios-1" value="no">
                                  No
                                </label>
                                <!-- <label class="radio-inline" for="radios-2">
                                  <input type="radio" name="radios" id="radios-2" value="Other">
                                  Other
                                </label> -->
                              </div>
                            </div>
                            <input type="submit" name="Submit" value="NEXT">

                                                    </form>
                                                   </div>

                                                </div>
                                              </div>
                                            </div><!-- tab-profile-->
                                            <div class="tab-pane fade show active" id="nav-nutritional" role="tabpanel" aria-labelledby="nav-nutritional-tab"><hr>
                                              <h4>Nutritional </h4>
            <form>


              <div class="form-group row">
                 <div class="col-md-6 control-label" for="selectbasic">Nutritional Prefence:</div>
                 <div class="col-md-6">
                   <select id="selectbasic" name="nutrition_preferences" class="form-control">
                     <option value="">Casein Free Diet - No Milk-</option>
                     <option value="">DASH Diet - Dietary Approach to Stop Hypertension</option>
                     <option value="">Diabetic Diet - for Diabetes</option>

                     <option value="">Extreme Non-Veg Diet - Eats all the animals</option>
                     <option value="">Flexitarian Diet - Occasional Chicken and Fish in diet</option>
                     <option value="">ruitarian Diet - Fruits, nuts, seeds & vegetarian diet</option>
                     <option value="">Gluten free Diet - No Gluten</option>

                     <option value="">Jain Diet </option>
                     <option value="">Lacto-Ovo-Vegetarian Diet - Vegetarian who eats eggs and milk</option>
                     <option value="">Lacto-Vegetarian Diet - Vegetarians who drink milk</option>
                     <option value="">Pescatarian Diet - Vegetarian diet with Seafood. </option>
                     <option value="">Vegan Diet - Vegetarian diet but no animal products like milk</option>
                     <option value="">Other </option>


                   </select>
                 </div>
               </div>
               <div class="form-group row">

                   <div class="col-md-6">
                       <label><h6> Food Alleragy/Restriction </h6></label>
                       <input type="text" class="form-control" name="foodalleragy/restriction" placeholder="">
                   </div>
                   <div class="col-md-6">
                    <label><h6>Reason for food Restriction </h6></label>
                      <input type="text" class="form-control" name="reason_for_food_restriction" placeholder="">
                  </div>
               </div>
               <div class="form-group row">
                   <div class="col-md-6 control-label" for="selectbasic">Nutritional Prefence:</div>
                   <div class="col-md-6">


                     <select id="selectbasic" name="list_of_all_medicine" class="form-control">

                       <option value="B-">Medications</option>
                       <option value="B+">Supplements</option>
                       <option value="AB-">Vitamins </option>
                       <option value="AB+">Inhaler</option>
                       <option value="O-">Birth control</option>
                       <option value="O+">Hormones</option>
                     </select>
                   </div>
                 </div>


                 <style>
                 table {
                     margin: 25px 0;
                     width: 1000px;
                 }

                 table th, table td {
                     padding: 10px;
                     text-align: center;
                 }

                 table, th, td {
                     border: 1px solid;
                 }
                 </style>


                   <!-- Script to add table row -->




                  <table id="myTable">



                    <tr>
                <td>Row1 cell1</td>
                <td>Name & Brand</td>
                <td>Dosage</td>
                <td>Times per day</td>
              </tr>




                                    <button type="button" onclick="myFunction()">Add new</button>


                              </table>




                              <script>
            function myFunction() {
              var table = document.getElementById("myTable");
              var row = table.insertRow(1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell2 = row.insertCell(2);
                var cell2 = row.insertCell(3);
              cell1.innerHTML = "New Row";


            }
            </script>








                              <div class="form-group row">
                                <div class="col-md-4 control-label" for="radios">Smoking Habit:</div>
                                <div class="col-md-2">
                                  <label class="radio-inline" for="radios-0">
                                    <input type="radio" name="smoking_habit" id="radios-0" value="yes" checked="checked">
                                    Yes
                                  </label>
                                  <label class="radio-inline" for="radios-1">
                                    <input type="radio" name="smoking_habit" id="radios-1" value="no">
                                    No
                                  </label>
                                  <!-- <label class="radio-inline" for="radios-2">
                                    <input type="radio" name="radios" id="radios-2" value="Other">
                                    Other
                                  </label> -->
                                </div>


                                    <div class="col-md-6">

                                         <h6>How Much:  </h6><input type="text" class="form-control" name="" placeholder="" title="enter your first name if any.">
                                    </div>

                              </div>



                              <div class="form-group row">
                                <div class="col-md-4 control-label" for="radios">Drinking Habit:</div>
                                <div class="col-md-2 ">
                                  <label class="radio-inline" for="radios-0">
                                    <input type="radio" name="drinking_habit" id="radios-0" value="yes" checked="checked">
                                    Yes
                                  </label>
                                  <label class="radio-inline" for="radios-1">
                                    <input type="radio" name="drinking_habit" id="radios-1" value="no">
                                    No
                                  </label>
                                  <!-- <label class="radio-inline" for="radios-2">
                                    <input type="radio" name="radios" id="radios-2" value="Other">
                                    Other
                                  </label> -->
                                </div>


                                    <div class="col-md-6">
                                      <label for="first_name"><h6>How Much:  </h6></label>
                                        <input type="text" class="form-control" name="dfef" placeholder="" title="enter your first name if any.">
                                    </div>
                                </div





                                        <center>	<br>
                                          <input type="submit" name="Submit" value="SAVE">


                                      </center>
            </form>
                                            </div>




                                            </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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

</body>

</html>








 33
