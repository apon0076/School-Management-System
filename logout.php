<?php	
	
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "school";


	$conn = new mysqli($hostname,$username,$password,$dbname);

	if($conn->connect_error) {
	    die("Connection Fail".$conn->connect_error);
	}
  if (isset($_GET['loged_out'])) {
  	session_start();

	date_default_timezone_set('Asia/Dhaka');

	 // get current date
	$current_date= date("Y-m-d");
	$out_time= date("h:i:sa");
	$current_user_id=$_SESSION['current_uid'];


	$sql="UPDATE attendance SET out_time='$out_time' WHERE user_id='$current_user_id' AND att_date='$current_date'";
	mysqli_query($conn, $sql);
	

    session_destroy();
    header("Location: index.php");
  }
?>