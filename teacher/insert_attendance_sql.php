<?php
include '../connection.php';
	// timezone for Dhaka city
	 date_default_timezone_set('Asia/Dhaka');
	 // get current date
	$current_date= date("Y-m-d");
	$in_time= date("h:i:sa");

	$class=$_POST['class'];
	
foreach ($_POST['st_id'] as $stu_id) {
	$i=0;


	$status=$_POST['a'.$stu_id][$i];

	$sql="INSERT INTO attendance(user_id, type_or_class, att_date, status) VALUES('$stu_id', '$class', '$current_date', '$status')";
	mysqli_query($conn, $sql);
	$i++;
}


echo "<script>alert('Record are Successfully Submitted!');window.location='stu_attendance.php'</script>";


?>