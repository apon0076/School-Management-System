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
  <title>Attendance</title>
  <style>
   

  </style>
</head>

<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Student Info</h1>
      
        <form action="stu_attendance1.php" method="POST" class="col-sm-8 offset-2">

            Class
			<br>

      <select name="class" class="btn btn-secondary dropdown-toggle, col-sm-12 offset-0">
        
                <option value="">Select</option>
                <option value="06">Six</option>
                <option value="07">Seven</option>
                <option value="08">Eight</option>
                <option value="09">Nine</option>
                <option value="10">Ten</option>
                
                
      </select>



			
			

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



