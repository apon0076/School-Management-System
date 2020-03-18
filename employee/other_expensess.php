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
  <title>Other Expensess</title>
  <style>
   

  </style>
</head>

<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Other Expensess</h1>
      
        <form action="" method="POST" class="col-sm-8 offset-2">

            <div class="form-group">
              <label for="exampleInputEmail1">User ID</label>
              <input type="text" class="form-control" name="user_id" aria-describedby="emailHelp" placeholder="User ID" required="">
            </div>

		
            <div class="form-group">
              <label for="exampleInputEmail1">Amount</label>
              <input type="text" class="form-control" name="amount" aria-describedby="emailHelp" placeholder="Amount" required="">
            </div>


            <div class="form-group">
              <label for="exampleInputEmail1">Purpose</label>
              <input type="text" class="form-control" name="purpose" aria-describedby="emailHelp" placeholder="Purpose" required="">
            </div>

			
			

			Date
			<br>
				<input id="datepicker" width="100%" />
				    <script>
				        $('#datepicker').datepicker({
				            uiLibrary: 'bootstrap4'
				        });
				    </script>	
			<br>
			<br>

				
            <br> 

            

              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Submit</button>
              </div>
        </form>
    </div>
    
  </div>


  


</body>


<?php include '../header&footer/footer.php';?>

</html>



