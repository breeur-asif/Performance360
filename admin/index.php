<?php

session_start();

if($_SESSION["adminid"] == ""){
	header("Location: login.php");
}
else{
	


	header("Location: admindashboard.php");
	
}

?>