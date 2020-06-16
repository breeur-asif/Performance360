<?php
error_reporting(0);
session_start();


include "config.php";



$user_id = $_SESSION['id'];

if($_SESSION["id"] == ""){
  header("Location: login.php");
}
else{

  $name = $_SESSION["name"];

}



if (isset($_POST['submit'])) {



          $time = $_POST['time'];
          $injuryclass = $_POST['injuryclass'];
          $place_injury = $_POST['place_injury'];

          $activty_phase = $_POST['activty_phase'];
          $elaborate = $_POST['elaborate'];
          $phase_injury = $_POST['phase_injury'];
          $bodypart_injury = $_POST['bodypart_injury'];

          $bodypart = $_POST['bodypart'];
          $natural_of_injury = $_POST['natural_of_injury'];
          $natural = $_POST['natural'];
          $mechanism_injuly = $_POST['mechanism_injuly'];
          $mechanism = $_POST['mechanism'];
          $first_Aid_given = $_POST['first_Aid_given'];
          $first_Aid = $_POST['first_Aid'];
          $given = $_POST['given'];
          $fname = $_POST['fname'];
          $designation = $_POST['designation'];
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $by_who_dia = $_POST['by_who_dia'];
          $by_whom = $_POST['by_whom'];
          $dia_specail = $_POST['dia_specail'];
          $treatement = $_POST['treatement'];
          $medicalif= $_POST['medicalif'];
          $Advice_given = $_POST['Advice_given'];
          $advice_injury= $_POST['advice_injury'];
          $adviceprec = $_POST['adviceprec'];
          $advicepre = $_POST['advicepre'];
          $ref = $_POST['ref'];
          $referral = $_POST['referral'];
          $injury_date=$_POST['injury_date'];

 

$sql ="INSERT INTO `add_injury`(`user`,`injury_date`,`time`, `injuryclass`, `place_injury`, `elaborate`, `activty_phase`, `phase_injury`, `bodypart_injury`, `bodypart`, `natural_of_injury`, `natural`, `mechanism_injuly`, `mechanism`, `first_Aid_given`, `first_Aid`, `given`, `fname`, `designation`, `mobile`, `email`, `by_who_dia`, `by_whom`, `dia_specail`, `treatement`,`medicalif`, `Advice_given`, `advice_injury`, `adviceprec`, `advicepre`, `ref`, `referral`,`cr_date`) VALUES ('$user_id', '$injury_date', '$time','$injuryclass','$place_injury','$elaborate','$activty_phase','$phase_injury','$bodypart_injury','$bodypart','$natural_of_injury','$natural','$mechanism_injuly','$mechanism','$first_Aid_given','$first_Aid','$given','$fname','$designation','$mobile','$email','$by_who_dia','$by_whom','$dia_specail','$treatement','$medicalif','$Advice_given','$advice_injury','$adviceprec','$advicepre','$ref','$referral',now())";



if (mysqli_query($conn, $sql)) {
    echo "<script> alert('New record created successfully');


     </script>";

      header("Location: clientinjuery.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
             <!--    <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> --> <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
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
            <h1 class="h3 mb-0 text-gray-800">Injury</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="card" style="width:auto;">
                        <div class="card-header bg-gray">

                               <h5>Injury History</h5>
                        </div>


              <br>
         <!--      <div class="card-body">

              <button class="btn btn-secondary" onclick="" >Add Injury </button><br>
              <br> -->


                                                   




<?php

$sql2 = "SELECT * FROM  add_injury where user='".$_SESSION['id']."' order by injury_date ";

$result3 = mysqli_query($conn, $sql2);  


while($row1 = mysqli_fetch_assoc($result3)){
	

?>

<?php $array = array("lightgreen", "#FFE4C4","#F0FFFF", "lightblue", "orange", "pink", "#FFF8DC","#1cc88a"); ?>
<div class="card getdata " style="width:auto;"   id= "<?php echo $row1['id']; ?>" >
<div class="card-header " style="background-color:<?php echo $array[array_rand($array, 1)] ?>" >
<h4><?php echo   date("d-m-Y", strtotime($row1['injury_date'] ) ); ?></h4>

<h4><?php if($row1['injuryclass'] == 'illness'){echo $row1['injuryclass']; }else{ echo $row1['injuryclass'].' Injury'; } ?></h4>
<h4><?php echo $row1['bodypart_injury']; ?></h4>
<?php echo $row1['place_injury']; ?>
</div>
</div>

<center><img src="arrow.png" ></center>
<br>



<?php } ?> 


<center><button  style="width:200px;" type="button"  id="refreshbtn"  class="btn btn-info">Add Injury</button></center>


              </div>
              </div>

              <div class="col-lg-9">

                      <div class="row">
                              <div class="col-lg-12 mb-12" id="hideinjuryform">
                                <div class="card">

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
    /* white-space: nowrap; */

}

/*tr:nth-child(even) {*/
/*  background-color: #dddddd;*/
/*}*/
</style>


<form action="clientinjuery.php" method="post" id="mainform">


              <!-- table-->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tr>
                      <th> Date of Injury</th>
                      <th> <div class="form-row show-inputbtns">
        <input type="date" data-date-inline-picker="false" data-date-open-on-focus="true"  name="injury_date"  id="injury_date"/>
    </div></th>
                     </tr>
 <tr>
                       <th>Times of Injury</th>
                       <th>

          
                       
<div>
<input type="time"  id="time" name="time" />
</div>
     
                       
                       
                       <!-- <div class="md-form">
                         <input placeholder="Selected time" type="time" id="input_starttime" class="form-control timepicker" name="timepicker">
                        <label for="input_starttime">12 hours</label>
                          </div> -->
                       </th>

                    </tr>
                    <tr>
                      <th>Injury Classification</th>
                      <th><label class="radio-inline" for="Exacerbated">
                                 <input type="radio" name="injuryclass" id="Exacerbated" value="Exacerbated" checked="checked">
                                 Exacerbated Injury ( Is A Recent Worsening Of An Unresolved Injury )
                               </label><br>
                               <label class="radio-inline" for="illness">
                                 <input type="radio" name="injuryclass" id="illness" value="illness">
                                 Illness ( Cough / Fever etc )
                               </label><br>
                               <!--<label class="radio-inline" for="New">-->
                               <!--  <input type="radio" name="injuryclass" id="New" value="New" checked="checked">-->
                               <!--  New injury-->
                               <!--</label>-->
                               <label class="radio-inline" for="Recurrent">
                                 <input type="radio" name="injuryclass" id="Recurrent" value="Recurrent">
                                 Recurrent Injury ( Same Injury, Subsequent Incident With  An 'Injury Free' Period Between Incidents )
                               </label><br>
                               <label class="radio-inline" for="New">
                                 <input type="radio" name="injuryclass" id="New" value="New">
                                 New injury
                               </label>

                          <!-- <select name="injuryclass">

                            <option value="Exacerbated injury[is a recent worsening of an unresolved injury]">Exacerbated injury[is a recent worsening of an unresolved injury]</option>
<option value="illness[Cough/Fever etc]">illness[Cough/Fever etc]</option>
<option value="New injury">New injury</option>
<option value="Recurrent injury(same injury.subsequent incident with  an injury free' period between incidents)">Recurrent injury(same injury.subsequent incident with  an injury free' period between incidents)</option>
                          </select> -->
                      </th>

                      </tr>
                      <tr>
                                <th>Place of Injury</th>
                          <th> <select name="place_injury" id="place_injury" >
                                <option value="Off Ground[E.g Home, School,Etc]">Off Ground ( E.g Home, School etc )</option>
                            <option value="On Ground while competition">On Ground While Competition</option>
                            <option value="On Ground While training">On Ground While Training</option>
                            <option value="travel">Travel</option>
                              </select><div><br>
                              Elaborate : <br>
                              <textarea id="elaborate" rows="2" cols="50" name="elaborate"> </textarea> </div>

                            </th>
                        </tr>
                        <tr>
                          <th>Activity Phase When Injury Happened</th>
                          <th><select name="activty_phase" onchange='other(this);' id="activty_phase">
                              <option value="Competation">Competition</option>
                                <option value="Training">Training</option>
                                <option value="Travel">Travel</option>
                                <option value="Warm-up">Warm-up</option>
                              <option value="Other_Activity">Other Activity</option>
                            </select><br>

                         <div id="Other_Activity">

                      Specify(If Other Activity):
                      <input type="text" id="Other_Activity" name="phase_injury" value="">
                        </th>
                         </tr>
                         <tr>
                          <th>Body  Part  Injury</th>
                          <th> <select name="bodypart_injury" onchange='Body(this);' id="bodypart_injury">
                                    <option value="Abdomen">Abdomen</option>
                                    <option value="Ankle">Ankle</option>
                                    <option value="Elbow">Elbow</option>
                                    <option value="Face">Face</option>
                                    <option value="Foot">Foot</option>
                                    <option value="Forearm">Forearm</option>
                                    <option value="Hand">Hand</option>
                                    <option value="Head">Head</option>
                                    <option value="Hip">Hip</option>
                                    <option value="Knee">Knee</option>
                                    <option value="Lower Back">Lower Back</option>
                                    <option value="Lower Leg">Lower Leg</option>
                                    <option value="Neck">Neck</option>
                                    <option value="Pelvis">Pelvis</option>
                                    <option value="Shoulder">Shoulder</option>
                                    <option value="Thorax">Thorax</option>
                                    <option value="Thigh">Thigh</option>
                                    <option value="Upper Arm">Upper Arm</option>
                                    <option value="Wrist">Wrist</option>
                                      <option value="Other_Body">Other</option>

                                        </select><br>
                                        <div id="Other_Body">

If Other,Can Choose Multiple Options                      <input type="text" id="Other_Body1" name="bodypart">
 </div>
                        </tr>
                        <tr>
                         <th>Nature of Injury</th>
                                                            <th><select name="natural_of_injury" onchange='Natural(this)' id="natural_of_injury">
                                        <option value="Allergy">Allergy</option>
                                        <option value="Blister">Blister</option>
                                        <option value="Blood">Blood</option>
                                        <option value="Bruise">Bruise</option>
                                        <option value="Burn">Burn</option>
                                        <option value="Cramps">Cramps</option>
                                        <option value="Crushing injury">Crushing Injury</option>
                                        <option value="Dehydration">Dehydration</option>
                                        <option value="Dental injury">Dental Injury</option>
                                        <option value="Joint Relocated  ">Joint Relocated </option>
                                        <option value="Electric injuly">Electric Injury</option>
                                        <option value="Eye injury">Eye Injury</option>
                                        <option value="Fatigue">Fatigue</option>
                                        <option value="Foreign Body">Foreign Body</option>
                                        <option value="Fracture">Fracture</option>
                                        <option value="Head injury">Head Injury</option>
                                        <option value="Hyperthermia">Hyperthermia</option>
                                        <option value="Inflammation">Inflammation</option>
                                        <option value="Infection">Infection</option>
                                        <option value="Injury to Internal Organs">Injury to Internal Organs</option>
                                        <option value="Insect bite">Insect bite</option>
                                        <!--<option value="Insect bite">Insect bite</option>-->
                                        <option value="Ligament">Ligament</option>
                                        <option value="Muscle">Muscle</option>
                                        <option value="Nerve injury">Nerve Injury</option>
                                        <option value="Open Wound">Open Wound</option>
                                        <option value="Overuse">Overuse</option>
                                        <option value="Sprain">Sprain</option>
                                        <option value="Strain">Strain</option>
                                        <option value="Swelling">Swelling</option>
                                        <option value="Tendon">Tendon</option>
                                        <option value="Vessel injury">Vessel Injury</option>


                                        <option value="Natural_other">Other</option>

                                      </select>
                                      <div id="Natural_other">

                          Special(If Other): <input type="text"  id="Natural_other1" name="natural">
                        </div></th>

                         </tr>
                         <tr>
                            <th>Mechanism of Injury</th>
                                                    <th> <select name="mechanism_injuly" onchange='Mechanism(this);' id="mechanism_injuly">
                                <option value="Environmental">Environmental</option>
                                <option value="Fall">Fall</option>
                                <option value="Hit">Hit</option>
                                <option value="Struck">Struck</option>

                                <option value="Mechanism_Other">Other</option>
                              </select> 

                              <div id="Mechanism_Other"> Explain In Detail: <input type="text" id="Mechanism_Other1" name="mechanism"></th>

                                </div> 


                                    </tr>
                                    <tr>
                                   <th>First Aid Given</th>
                                      <th> <select name="first_Aid_given" onchange='First_A(this);' id="first_Aid_given">
                                          <option value="Bracing / Splint / Plaster">Bracing / Splint / Plaster</option>
                                          <option value="Crutches">Crutches</option>
                                            <option value="ICE (ice,compression,elevation)">ICE (Ice  Compression,Elevation)</option>
                                            <!--<option value="ICE">ICE</option>-->
                                            <option value="Join Relocated">Dislocation</option>
                                            <option value="Manual Therapy">Manual Therapy</option>
                                            <option value="Massage">Massage</option>
                                            <option value="Medication">Medication</option>
                                            <option value="None Given">None Given</option>
                                            <!--<option value="None Given">None Given</option>-->
                                            <option value="None Needed">None Needed</option>
                                            <option value="RICER (Rest,Ice,Compression,Elevation Referral)">RICER ( Rest,Ice,Compression,Elevation, Referral  )</option>
                                            <option value="Strapping/Taping">Strapping / Taping</option>
                                            <option value="Wound Management">Wound Management </option>


                                          <option value="First_A_Other">Other</option>

                                        </select><br><div id="First_A_Other1"> Specify:<br><input type="text" name="first_Aid" id="first_Aid">
                                        </div></th>


</tr>
<tr>
 <th>First Aid was Given By</th>
    <th>  <select name="given" id="given">
 <option value="Doctor">Doctor</option>
                              <option value="No One">No One</option>
                              <option value="Parent/Guatdian">Parent / Guardian</option>
                              <option value="Physio">Physio</option>
                              <option value="Self">Self</option>
                              <option value="Trainer">Trainer</option>
                                          <option value="Other">Other</option>


</select>
 
<br><br><div class="row"><div class="col-xl-4">Give Name :</div><div class="col-xl-8"><input type="text"   name="fname" id="fname"></div>
</div><br> 
<div class="row"><div class="col-xl-4">Designation :</div><div class="col-xl-8"> <input type="text"  name="designation" id="designation"></div>
</div><br> 
<div class="row"><div class="col-xl-4">Mobile Number :</div><div class="col-xl-8"><input type="number"   name="mobile" id="mobile"></div>
</div><br> 
<div class="row"><div class="col-xl-4">Email:</div><div class="col-xl-8"><input type="email" id="email" name="email"></div>
</div>
 </th>
    

</tr>
<tr>
 <th>By whom it was Diagnosis</th>
                                                        <th> <select name="by_who_dia" onchange='First_b(this);' id="by_who_dia">
                                    <option value="Doctor">Doctor</option>
                              <option value="No One">No One</option>
                              <option value="Parent/Guatdian">Parent / Guardian</option>
                              <option value="Physio">Physio</option>
                              <option value="Self">Self</option>
                              <option value="Trainer">Trainer</option>
                                    <option value="by_who_dia_Other">Other</option>

    </select>
    <div id="by_who_dia_Other">Specify:<input type="text"  name="by_whom" id="by_who_dia1"></th>

</tr>
<tr>
 <th>What was Diagnosis</th>
    <th>                     
<input type="text"  name="dia_specail" id="dia_what"></th>


</tr><tr>
 <th>Treatment</th>
    <th>                      <input type="text" name="treatement" value="" id="treatement">
 

</tr>
<tr>
 <th>Medication If Needed</th>
    <th>                      <input type="text" name="medicalif" value="" id="medicalif"> </th>



</tr>
<tr>
<th>Advice Given To Injured Athlete </th>
    <th> <select name="Advice_given"   onchange='advice_name(this);' id="Advice_given">
       <option value="Refund to play immediately">Return To Play Immediately</option>
                          <option value="Rest 1-3 days">Rest for 1 - 3 Days</option>
                           <option value="Rest for 3-7 days">Rest for 3 - 7 Days</option>
                          <option value="Rest 7-14 days">Rest for 7 - 14 Days</option>
                           <option value="Rest for 14 - 28 days">Rest for 14 - 28 Days</option>
                          <option value="Rest for 1 - 3 months">Rest for 1 - 3 Months</option>
                         
                         
                          <option value="Rest for more than 3 months">Rest for more than 3 Months</option>
                         

<option value="Advice_Other">Other</option>

</select><div id="Advice_Other">Specify(If other):<input type="text" id="Advice_Other1" name="advice_injury"></div></th>

           </tr>
           <tr>
            <th>Advice Given For Precaution </th>
<th><input type="text"  name="adviceprec" id="adviceprec"> <br><br> <br>What Precautions Need To Be Taken :<br><input type="text"  name="advicepre" id="advicepre"></th>
          </tr>
          <tr>
                      <th>Referral</th>
                            <th><select name="ref" onchange='ref_name(this);' id="ref">
                                        <option value="Dentist">Dentist</option>
                              <option value="Endocrinologist">Endocrinologist</option>
                              <option value="General Physician">General Physician</option>
                              <option value="Massage Therapist">Massage Therapist</option>
                              <option value="Neurologist">Neurologist</option>
                              <option value="None Needed">None Needed</option>
                              <option value="Ophthalmologist">Ophthalmologist</option>
                              <option value="Orthopedic Doctor">Orthopedic Doctor</option>
                              <option value="Physio">Physio</option>
                              <option value="Podiatrist">Podiatrist</option>
                              <option value="Psychologist">Psychologist</option>
                              <option value="Surgeon">Surgeon</option>


          <option value="ref_Other">Other</option>


        </select>
        <div id="ref_Other">
        Specify(If other):<input type="text" id="ref_Other1" name="referral"></th>

  </tr>

               </table>
                </div>
<!-- table end-->
               <button type="submit"  name ="submit" class="btn btn-primary">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <!-- <input class="btn btn-secondary" id="refreshbtn" value="Add Injury"> -->



</form>

              </div>

                                  </div>
                                </div>
                              </div>
                        </div>

              </div>
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
  <script>

$( document ).ready(function() {
   $('#hideinjuryform').hide();
});


  $('.getdata').click(function(){
    
  $('#hideinjuryform').show();

    
  var data_id =this.id ;

$.ajax({
    type: 'post',
    url: 'functions/clientinjuery.php',
  
    
    data : { 'data_id' : data_id },
    success: function (data) {
   

        var data = jQuery.parseJSON(data);
        
         $('#injury_date').val(data[0].injury_date);
$('#time').val(data[0].time);

$("#"+ data[0].injuryclass).prop("checked", true);
// (data[0].user_id);
// $('#competation_name').val(data[0].competation_name);
 $("#place_injury").val(data[0].place_injury).attr("selected","selected");
$('#elaborate').val(data[0].elaborate);

 $("#activty_phase").val(data[0].activty_phase).attr("selected","selected");
$('#Other_Activity').val(data[0].phase_injury);

 $("#bodypart_injury").val(data[0].bodypart_injury).attr("selected","selected");
 $('#other_body1').val(data[0].phase_injury);


  $("#natural_of_injury").val(data[0].natural_of_injury).attr("selected","selected");
 $('#Natural_other1').val(data[0].natural); 



  $("#mechanism_injuly").val(data[0].mechanism_injuly).attr("selected","selected");
 $('#Mechanism_Other1').val(data[0].mechanism);  

 $("#first_Aid_given").val(data[0].first_Aid_given).attr("selected","selected");
 $('#first_Aid').val(data[0].first_Aid);
 $('#fname').val(data[0].fname);
 $('#designation').val(data[0].designation);
 $('#mobile').val(data[0].mobile);
 $('#email').val(data[0].email);



 $("#by_who_dia").val(data[0].by_who_dia).attr("selected","selected");

 $('#by_who_dia1').val(data[0].by_whom);


 $('#dia_what').val(data[0].dia_specail);
 $('#treatement').val(data[0].treatement);
 $('#medicalif').val(data[0].medicalif);
 $('#Advice_Other1').val(data[0].medicalif);
 $("#Advice_given").val(data[0].Advice_given).attr("selected","selected"); 


 $('#adviceprec').val(data[0].adviceprec);
  $('#advicepre').val(data[0].advicepre);

 $("#ref").val(data[0].ref).attr("selected","selected"); 
  $('#ref_Other1').val(data[0].referral);


 // disable property
 $('#email').prop("readonly", true);

 $('#first_Aid').prop("readonly", true);
 $('#fname').prop("readonly", true);
 $('#designation').prop("readonly", true);
 $('#mobile').prop("readonly", true);
$('#dia_what').prop("readonly", true);
 $('#treatement').prop("readonly", true);
 $('#medicalif').prop("readonly", true);
 $('#Advice_Other1').prop("readonly", true);
 $('#elaborate').prop("readonly", true);
 $('#other_body1').prop("readonly", true);
 $('#Natural_other1').prop("readonly", true);
 $('#Mechanism_Other1').prop("readonly", true); 
 $('#adviceprec').prop("readonly", true); 
 $('#advicepre').prop("readonly", true); 


 // select disable code
 
  $('#time').prop("readonly", true);
   $('#injury_date').prop("readonly", true);
} 
});    
  })







  $("#refreshbtn").click(function(){
      // location.reload();

        $('#hideinjuryform').show();
      $("#mainform")[0].reset();
 $('#email').prop("readonly", false);

 $('#first_Aid').prop("readonly", false);
 $('#fname').prop("readonly", false);
 $('#designation').prop("readonly", false);
 $('#mobile').prop("readonly", false);
$('#dia_what').prop("readonly", false);
 $('#treatement').prop("readonly", false);
 $('#medicalif').prop("readonly", false);
 $('#Advice_Other1').prop("readonly", false);
 $('#elaborate').prop("readonly", false);
 $('#other_body1').prop("readonly", false);
 $('#Natural_other1').prop("readonly", false);
 $('#Mechanism_Other1').prop("readonly", false); 
 $('#adviceprec').prop("readonly", false); 
 $('#advicepre').prop("readonly", false); 
  $('#time').prop("readonly", false);
   $('#injury_date').prop("readonly", false);

 // select disable code
 
     
  });




  // $('#input_starttime').pickatime({});

$("#Other_Activity").hide();
function  other(s2){
  
  if(s2.value=="Other_Activity")
  {
    $("#Other_Activity").show();
  }
  else{
        $("#Other_Activity").hide();


  }
}
 $("#Other_Body").hide();
function  Body(s2){
  
  if(s2.value=="Other_Body")
  {
    $("#Other_Body").show();
  }
  else{
        $("#Other_Body").hide();


  }
}
$("#Natural_other").hide();
function  Natural(s2){
  
  if(s2.value=="Natural_other")
  {
    $("#Natural_other").show();
  }
  else{
        $("#Natural_other").hide();


  }
}
$("#First_A_Other").hide();
function  First_A(s2){
  
  if(s2.value=="First_A_Other")
  {
    $("#First_A_Other").show();
  }
  else{
        $("#First_A_Other").hide();


  }
}
$("#Mechanism_Other").hide();
function  Mechanism(s2){
  
  if(s2.value=="Mechanism_Other")
  {
    $("#Mechanism_Other").show();
  }
  else{
        $("#Mechanism_Other").hide();


  }
}
  

$("#ref_Other").hide();
function  ref_name(s2){
  
  if(s2.value=="ref_Other")
  {
    $("#ref_Other").show();
  }
  else{
        $("#ref_Other").hide();


  }
}
$("#Advice_Other").hide();
function  Advice_name(s2){
  alert(ghghgjh);
  if(s2.value=="Advice_Other")
  {
    $("#Advice_Other").show();
  }
  else{
        $("#Advice_Other").hide();


  }
}


 $("#by_who_dia_Other").hide();
function  First_b(s2){
  
  if(s2.value=="First_A_Other")
  {
    $("#by_who_dia_Other").show();
  }
  else{
        $("#by_who_dia_Other").hide();


  }
}
 



</script>
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