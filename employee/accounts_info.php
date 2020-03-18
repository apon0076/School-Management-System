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
		

	    // $sql="SELECT *  FROM accounts WHERE status='Diposite';";
	    // $query=mysqli_query($conn, $sql);






		$sql1="SELECT SUM(amount) AS count FROM accounts WHERE status='Diposite'";

		$duration = $conn->query($sql1);
		while($record = $duration->fetch_array()){
		    $total = $record['count'];
		}

		// echo $total;

		$sql11="SELECT SUM(amount) AS count1 FROM accounts WHERE status='Cost'";

		$duration1 = $conn->query($sql11);
		while($record1 = $duration1->fetch_array()){
		    $total1 = $record1['count1'];
		}
		?>
		<br>
		<?php
		// echo $total1;

		$balance=0;
		$balance=$total-$total1
		?>
		<br>
		
		<!-- <?php echo $balance; ?> -->
	

	<table>
	  <tr>
	    <th>Total Earn</th>
	    <th>Total Cost</th>
	    <th>Balance</th>
	  </tr>
	  <tr>
	    <td><?php echo $total; ?></td>
	    <td><?php echo $total1; ?></td>
	    <td><?php echo $balance; ?></td>
	  </tr>
	  
	</table>




<br><br>
<?php include '../header&footer/footer.php';?>
	</body>
</html>