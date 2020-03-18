<?php include '../header&footer/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

	<title>Authorization</title>
</head>
<body>

	<?php
		include '../connection.php';
		

	    $sql="SELECT *  FROM teacher WHERE status=0;";
	    $query=mysqli_query($conn, $sql);


	?>


	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">SL</th>
	      <th scope="col">Name</th>
	      <th scope="col">User ID</th>
	      <th scope="col">Email</th>
	      <th scope="col">Phone</th>
	      <th scope="col">Status</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	$sl=1;
	  		while ($row=mysqli_fetch_array($query)) {

	  		 ?>
	    <tr>
	      <th scope="row"><?php echo $sl++; ?></th>
	      <td> <?php echo $row['name']; ?> </td>
	      <td><?php echo $row['tec_id']; ?></td>
	      <td><?php echo $row['mail']; ?></td>
	      <td><?php echo $row['phone']; ?></td>
	      <td> 
	      	<a href="t_authorization.php?approve=<?php echo $row['tec_id']; ?>" type="button" class="btn btn-primary">Approve</a>
			<a href="t_authorization.php?reject=<?php echo $row['tec_id']; ?>" type="button" class="btn btn-danger">Reject</a>
	      </td>
	    </tr>
	    <?php
	  		}
	  	?>
	    
	  </tbody>
	</table>
	
	<?php
	if (isset($_GET['approve'])) {
		$u_id=$_GET['approve'];
		$sql="UPDATE login SET status=1 WHERE user_id='$u_id'";
		$sql2="UPDATE teacher SET status=1 WHERE tec_id='$u_id'";

		if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
          echo "<script>alert('User has been Approved'); window.location='t_authorization.php';</script>";
		}
	}
	if (isset($_GET['reject'])) {
		$u_id=$_GET['reject'];
		$sql="DELETE FROM login WHERE user_id='$u_id'";
		$sql2="DELETE FROM teacher WHERE tec_id='$u_id'";

		if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
          echo "<script>alert('User has been Rejected'); window.location='t_authorization.php';</script>";
		}
	}
	?>
</body>
<br>
<?php include '../header&footer/footer.php';?>
</html>