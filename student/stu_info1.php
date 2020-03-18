
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
	<title>Student info</title>
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

			$class         =   $_POST['class'];
   	 
			
			$sql= "SELECT * FROM student WHERE class= '$class' ";
			$result = mysqli_query($conn, $sql);

		?>
		

		<br>
		
		

	<table>
	  <tr>
	    <th>SL</th>
	    <th>Name</th>
	    <th>Student ID</th>
	    <th>Phone</th>
	    <th>Address</th>
	    <th>Group</th>
	    <th>Gender</th>
	  </tr>

	  <?php
	  $sl=1;
	  	while ($row=mysqli_fetch_array($result)) { ?>


	  <tr>
	    <td><?php echo $sl++; ?></td>
	    <td><?php echo $row['name']; ?></td>
	    <td><?php echo $row['stu_id']; ?></td>
	    <td><?php echo $row['phone']; ?></td>
	    <td><?php echo $row['address']; ?></td>
	    <td><?php echo $row['stu_group']; ?></td>
	    <td><?php echo $row['gender']; ?></td>
	  </tr>
	  	<?php
	  	}
	  ?>
	  
	</table>




<br><br>
	
</body>
</html>