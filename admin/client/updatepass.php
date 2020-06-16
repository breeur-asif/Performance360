<?php
error_reporting(0);

include "config.php";

// session_start();
if (isset($_POST['submit'])) {


 if($_POST['password'] == $_POST['password1']){


  	$Pass = md5($_POST['password']);


    	  $sql = "UPDATE users SET password = '$Pass'  WHERE  id = '".$_POST['cid']."'";  
 
   	 $result = mysqli_query($conn, $sql);

  	  if ($result > 0) {
 echo "<script>alert('Successfully Password Reset ')
			
  	  	  </script>";  

$yourURL="login.php";
echo ("<script>location.href='$yourURL'</script>");

  	  	 
     // header("Location: login.php");
}else{
  echo "<script>alert('invalid credintial')</script>";  
}
  }else {
  	echo "<script>alert('Password and Confirm password Does Not Match')</script>)";
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

  <title>SB Admin 2 - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Reset Password?</h1>
                    <p class="mb-4"> reset your password!</p>
                  </div>
                  <form class="user" action="updatepass.php" method="post">	
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="New Password" autocomplete="off">
                        <input type="hidden"  name="cid" value="<?php echo  $_GET['id'] ?>">
                    </div>
     <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="password1" name="password1" placeholder="Confirm Password" autocomplete="off">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                  <!-- <button type="submit"   class="btn btn-primary btn-user btn-block" value="Reset Password"></button> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>

                  <div class="text-center">
                    <a class="small" href="login.php">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>


?>