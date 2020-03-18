<?php include '../header&footer/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
	<title>Add Salary</title>
</head>
<body>

	<div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Add Salary</h1>
      
        <form action="" method="POST" class="col-sm-6 offset-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Designation</label>
              <input type="text" class="form-control" name="designation" aria-describedby="emailHelp" placeholder="Designation" required="">
            </div>

		
            <div class="form-group">
              <label for="exampleInputEmail1">Amount</label>
              <input type="text" class="form-control" name="amount" aria-describedby="emailHelp" placeholder="Amount" required="">
            </div>

            	
            <br> <br> <br>

            

              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Add</button>
              </div>
        </form>
    </div>
    
  </div>


	<?php
	include '../connection.php';

	  if (isset($_POST['submit'])) {

	    $designation  =   $_POST['designation'];
	    $amount       =   $_POST['amount'];



	   
	        $sql= "INSERT INTO salary_info(designation, salary) VALUES('$designation', '$amount')";
	        $query= mysqli_query($conn, $sql);
	        if ($query) {
	        	echo "<script>alert('Salary Added Successfully'); window.location='add_salary.php';</script>";
	        }
	        
	}
	    
	  
	?>



	
</body>
<?php include '../header&footer/footer.php';?>


</html>