function login($username, $password){
	
	$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["id"];
	    }
	} else {
	    echo "No User Exists";
	}

}