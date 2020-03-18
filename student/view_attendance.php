<?php include '../header&footer/header.php';?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
	<title>Accounts Overview</title>
	<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
</head>
	<body>
		<?php
		include '../connection.php';
		
		$stu_id=$_SESSION['stu_id'];
    $query= "SELECT * FROM attendance where user_id='$stu_id'";
    $run_adm=mysqli_query($conn,$query);

		?>
		<br>
		
		<!-- <?php // echo $balance; ?> -->
	

	<table>
	  <tr>
	    <th>SL</th>
	    <th>Date</th>
	    <th>ID</th>
	    <th>Status</th>
	  </tr>

	  <?php
	  $sl=1;
	  	while ($row=mysqli_fetch_array($run_adm)) { ?>


	  <tr>
	    <td><?php echo $sl++; ?></td>
	    <td><?php echo $row['att_date']; ?></td>
	    <td><?php echo $row['user_id']; ?></td>
	    <td><?php echo $row['status']; ?></td>
	  </tr>
	  	<?php
	  	}
	  ?>
	  
	</table>




<br><br>
<?php include '../header&footer/footer.php';?>
	</body>
</html>