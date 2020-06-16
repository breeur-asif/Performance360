<?php

session_start();
error_reporting(0);
include "config.php";

$query="SELECT * FROM `exercises` ORDER BY `exercise_group` ASC";
$result=mysqli_query($conn,$query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select id="ExerciseGroup" name="ExerciseGroup[]" class="form-control" >
              <?php while($row1=mysqli_fetch_array($result)):;?>  
              <option value="<?php echo $row1[0]; ?>  "><?php echo $row1[1]; ?> </option>
              
<?php endwhile; ?> 
             
					    </select>
</body>
</html>