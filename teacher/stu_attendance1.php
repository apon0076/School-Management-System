<?php 
include '../header&footer/header.php';

		include '../connection.php';

	 date_default_timezone_set('Asia/Dhaka');
	 // get current date
	$current_date= date("Y-m-d");
	$in_time= date("h:i:sa");

	$class=$_POST['class'];

	// select query fo checking user already given attendance or not? 
	$query_check= "SELECT * FROM attendance WHERE att_date='$current_date' AND type_or_class='$class'";
	$run_check=mysqli_query($conn,$query_check);

	// check attandance is counted or not
	if (mysqli_num_rows($run_check)>0) {
echo "<script>alert('Attendance Already Taken!');window.location='stu_attendance.php'</script>";
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<title>Attendance</title>
</head>
<body>
	<br><br>

	


	<?php
	// timezone for Dhaka city
	 date_default_timezone_set('Asia/Dhaka');
	 // get current date
	$current_date= date("Y-m-d");

		$class         =   $_POST['class'];
   	 
			
			$sql= "SELECT * FROM student WHERE class= '$class' ";
			$result = mysqli_query($conn, $sql);


	$query_check= "SELECT * FROM attendance WHERE att_date='$current_date'";
	$run_check=mysqli_query($conn,$query_check);

	?>
			<form action="insert_attendance_sql.php" method="post">
				<table col-sm-8 offset-2 align="center" border=1 class="table table-striped">
				<thead>
				    <tr>
				      <th scope="col">SL</th>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				<input type="hidden" name="class" value="<?php echo $class; ?>">

				<?php 
	  				$sl=1;
//echo "a".$sl;
		  			while($row = mysqli_fetch_array($result)) {

		  		 ?>
				<tbody>
				<tr>
			      <th scope="row"><?php echo $sl++; ?></th>
			      <td> <?php echo $row['stu_id']; ?> </td>
			      <td><?php echo $row['name']; ?></td>
			      <td>
			      	<input type="hidden" name="st_id[]" value="<?php echo $row['stu_id']; ?>">
			      	<input type='radio' name='a<?php echo $row['stu_id']; ?>[]' value='Present' checked>Present &nbsp; 
			      	<input type='radio' name='a<?php echo $row['stu_id']; ?>[]' value='Absent'>Absent
			      </td>
			      
			    </tr>
			    <?php
			  		}
			  	?>
			    
			  </tbody>
				</table><br>
				<div class="col text-center">
		                <button class="btn btn-primary center-block" name="submit">Submit</button>
		        </div><br><br>
			</form>

</body>
</html>
<?php include '../header&footer/footer.php';?>