<?php include 'header&footer/header.php';  ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	   
	   	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

		<style>
			@import url('https://fonts.googleapis.com/css?family=Numans');

			html,body{
			background-image: url('photos/login_background.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			height: 100%;
			font-family: 'Numans', sans-serif;
			}

			.container{
			height: 100%;
			align-content: center;
			}

			.card{
			height: 370px;
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0,0,0,0.5) !important;
			}

			.social_icon span{
			font-size: 60px;
			margin-left: 10px;
			color: #FFC312;
			}

			.social_icon span:hover{
			color: white;
			cursor: pointer;
			}

			.card-header h3{
			color: white;
			}

			.social_icon{
			position: absolute;
			right: 20px;
			top: -45px;
			}

			.input-group-prepend span{
			width: 50px;
			background-color: #FFC312;
			color: black;
			border:0 !important;
			}

			input:focus{
			outline: 0 0 0 0  !important;
			box-shadow: 0 0 0 0 !important;

			}

			.remember{
			color: white;
			}

			.remember input
			{
			width: 20px;
			height: 20px;
			margin-left: 15px;
			margin-right: 5px;
			}

			.login_btn{
			color: black;
			background-color: #FFC312;
			width: 100px;
			}

			.login_btn:hover{
			color: black;
			background-color: white;
			}

			.links{
			color: white;
			}

			.links a{
			margin-left: 4px;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Sign In</h3>
						
					</div>
					<div class="card-body">

						<form action="" method="post" name="login">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>

								<input type="text" class="form-control" name="username" placeholder="username">
								
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="password">
							</div>
							<div class="row align-items-center remember">
								<input type="checkbox">Remember Me
							</div>
							<div class="form-group">
								<input type="submit"  name="login" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Don't have an account?<a href="sign_up.php">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="#">Forgot your password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	
	include 'header&footer/footer.php';

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "school";


	$conn = new mysqli($hostname,$username,$password,$dbname);

	if($conn->connect_error) {
	    die("Connection Fail".$conn->connect_error);
	}


	if(isset($_POST["login"]))
	{

		$user_name=$_POST["username"];
		$pass=$_POST["password"];
		$stu="student";
		$tec="teacher";
		$g_employee="g_employee";
		$s_manager="s_manager";
		$a_manager="a_manager";


		$query= "SELECT * FROM login where user_id='$user_name' and pass='$pass' and type='$stu'";
		$run_stu=mysqli_query($conn,$query);


		$query_tec= "SELECT * FROM login where user_id='$user_name' and pass='$pass' and type='$tec'";
		$run_tec=mysqli_query($conn,$query_tec);


		$query_g_employee= "SELECT * FROM login where user_id='$user_name' And pass= '$pass' And type='$g_employee'";
		$run_g_employee=mysqli_query($conn,$query_g_employee);


		$query_s_manager= "SELECT * FROM login where user_id='$user_name' And pass= '$pass' And type='$s_manager'";
		$run_s_manager=mysqli_query($conn,$query_s_manager);


		$query_a_manager= "SELECT * FROM login where user_id='$user_name' And pass= '$pass' And type='$a_manager'";
		$run_a_manager=mysqli_query($conn,$query_a_manager);


		if(mysqli_num_rows($run_stu)>0)
		{
			$_SESSION['stu_loged']=true;
			$_SESSION['stu_id']=$user_name;
			echo "<script>window.location='student/stu_dashboard.php'</script>";
		}

		else if(mysqli_num_rows($run_tec)>0)
		{	
			$tec_approved=false;
			while ($tec_row=mysqli_fetch_array($run_tec)) {

				if ($tec_row['status']==1) {
					$tec_approved=true;
				}
			}
				if ($tec_approved==true) {
					$_SESSION['tec_loged']=true;
					$_SESSION['tec_id']=$user_name;
					$_SESSION['current_uid']=$user_name;

					// timezone for Dhaka city
					 date_default_timezone_set('Asia/Dhaka');

					 // get current date
					$current_date= date("Y-m-d");
					$in_time= date("h:i:sa");

					if ($in_time<"08:00:00") {
						$status="in-time";
					}
					else{
						$status="Late";
					}

					// select query fo checking user already given attendance or not? 
					$query_check= "SELECT * FROM attendance WHERE user_id='$user_name' AND att_date='$current_date'";
					$run_check=mysqli_query($conn,$query_check);

					// check attandance is counted or not
					if (mysqli_num_rows($run_check)<1) {

						$sql="INSERT INTO attendance(user_id, type_or_class, att_date, in_time, status) VALUES('$user_name', '$tec', '$current_date', '$in_time', '$status')";
						mysqli_query($conn, $sql);
					}

					echo "<script>alert('Welcome to Teachers Panel'); window.location='teacher/tec_dashboard.php'</script>";
				}
				else{
					echo "<script>alert('Your Account is not Approve yet.. Thank You');window.location='index.php'</script>";
				}	
		}

		else if(mysqli_num_rows($run_g_employee)>0)
		{	

			while ($gemp_row=mysqli_fetch_array($run_g_employee)) {
				$status=$gemp_row['status'];
			}
				if ($status==1) {
					$_SESSION['gemp_loged']=true;
					$_SESSION['emp_id']=$user_name;
					$_SESSION['current_uid']=$user_name;

					// timezone for Dhaka city
					 date_default_timezone_set('Asia/Dhaka');

					 // get current date
					$current_date= date("Y-m-d");
					$in_time= date("h:i:sa");

					if ($in_time<"08:00:00") {
						$status="in-time";
					}
					else{
						$status="Late";
					}

					// select query fo checking user already given attendance or not? 
					$query_check= "SELECT * FROM attendance WHERE user_id='$user_name' AND att_date='$current_date'";
					$run_check=mysqli_query($conn,$query_check);

					// check attandance is counted or not
					if (mysqli_num_rows($run_check)<1) {

						$sql="INSERT INTO attendance(user_id, type_or_class, att_date, in_time, status) VALUES('$user_name', '$g_employee', '$current_date', '$in_time', '$status')";
						mysqli_query($conn, $sql);
					}

					echo "<script>window.location='employee/g_employee_dashboard.php'</script>";
				}
				else{
					echo "<script>alert('Your Account is not Approve yet.. Thank You');window.location='index.php'</script>";
				}		
		}

		else if(mysqli_num_rows($run_s_manager)>0)
		{
			while ($sm_row=mysqli_fetch_array($run_s_manager)) {
				$status=$sm_row['status'];
			}
				if ($status==1) {
					$_SESSION['sman_loged']=true;
					$_SESSION['emp_id']=$user_name;
					$_SESSION['current_uid']=$user_name;

					// timezone for Dhaka city
					 date_default_timezone_set('Asia/Dhaka');

					 // get current date
					$current_date= date("Y-m-d");
					$in_time= date("h:i:sa");

					if ($in_time<"08:00:00") {
						$status="in-time";
					}
					else{
						$status="Late";
					}

					// select query fo checking user already given attendance or not? 
					$query_check= "SELECT * FROM attendance WHERE user_id='$user_name' AND att_date='$current_date'";
					$run_check=mysqli_query($conn,$query_check);

					// check attandance is counted or not
					if (mysqli_num_rows($run_check)<1) {

						$sql="INSERT INTO attendance(user_id, type_or_class, att_date, in_time, status) VALUES('$user_name', '$s_manager', '$current_date', '$in_time', '$status')";
						mysqli_query($conn, $sql);
					}

					echo "<script>window.location='employee/s_manager_dashboard.php'</script>";	
				}
				else{
					echo "<script>alert('Your Account is not Approve yet.. Thank You');window.location='index.php'</script>";
				}			
		}

		else if(mysqli_num_rows($run_a_manager)>0)
		{
			while ($am_row=mysqli_fetch_array($run_a_manager)) {
				$status=$am_row['status'];
			}
				if ($status==1) {
					$_SESSION['aman_loged']=true;
					$_SESSION['emp_id']=$user_name;
					$_SESSION['current_uid']=$user_name;

					// timezone for Dhaka city
					 date_default_timezone_set('Asia/Dhaka');

					 // get current date
					$current_date= date("Y-m-d");
					$in_time= date("h:i:sa");

					if ($in_time<"08:00:00") {
						$status="in-time";
					}
					else{
						$status="Late";
					}

					// select query fo checking user already given attendance or not? 
					$query_check= "SELECT * FROM attendance WHERE user_id='$user_name' AND att_date='$current_date'";
					$run_check=mysqli_query($conn,$query_check);

					// check attandance is counted or not
					if (mysqli_num_rows($run_check)<1) {

						$sql="INSERT INTO attendance(user_id, type_or_class, att_date, in_time, status) VALUES('$user_name', '$a_manager', '$current_date', '$in_time', '$status')";
						mysqli_query($conn, $sql);
					}

					echo "<script> window.location='employee/a_manager_dashboard.php'</script>";
				}
				else{
					echo "<script>alert('Your Account is not Approve yet.. Thank You');window.location='index.php'</script>";
				}				
		}

		else
		{
			// header("Location: index.php");	
			echo "<script>alert('Record Not Matched'); window.location='index.php'</script>";
			
		}
	}
	
?>

