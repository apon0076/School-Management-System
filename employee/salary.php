<?php include '../header&footer/header.php';?>
<br>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <title>Salary</title>
  <style>
   #datepicker{
    width: 100%;
   }

  </style>
</head>

<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Salary</h1>
      
        <form action="" method="POST" class="col-sm-8 offset-2">

            <div class="form-group">
              <label for="exampleInputEmail1">User ID</label>
              <input type="text" class="form-control" name="user_id" aria-describedby="emailHelp" placeholder="User ID" required="">
            </div>

		
            <div class="form-group">
              <label for="exampleInputEmail1">Amount</label>
              <input type="text" class="form-control" name="amount" aria-describedby="emailHelp" placeholder="Amount" required="">
            </div>


            Purpose
			<br>
			<select name="purpose" class="btn btn-secondary dropdown-toggle , col-sm-12 offset-0">
							  <option value="Salary">Salary</option>
							  <option value="Other Benefits">Other benefits</option>
							  
							  
						</select>

			<br>
			<br>
      Date
			<input type="date" name="date" id="datepicker">
			<br>

				
            <br> 

            

              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Submit</button>
              </div>
        </form>
    </div>
    
  </div>


  


</body>


<?php 
  include '../connection.php';

    if (isset($_POST["submit"])) 
    {
      $u_id  = $_POST["user_id"];
      $amount     = $_POST["amount"];
      $purpose    = $_POST["purpose"];
      $date       = $_POST["date"];
      $status     = "Cost";
      

        $sql= "INSERT INTO accounts(user_id, purpose, status, amount, trnx_date) VALUES('$u_id', '$purpose', '$status', '$amount', '$date')"; 

        $query=mysqli_query($conn, $sql);
        if ($query) {
          echo "<script>alert('Payment Done..Thank you'); window.location='salary.php';</script>";
        }
    }



  include '../header&footer/footer.php';
?>
</html>



