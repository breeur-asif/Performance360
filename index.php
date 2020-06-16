<?php

session_start();

if($_SESSION["id"] == ""){
	header("Location: login.php");
}
else{
	
	header("Location: dashboard.php");
	
}

?>