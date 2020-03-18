<?php 
include '../header&footer/header.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
  <title>Admin Login</title>
  <style>
   

  </style>
</head>

<body>
  

  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Admin Login</h1>
      
        <form action="" method="POST" class="col-sm-6 offset-3">
            <div class="form-group">
              <label for="exampleInputEmail1">User ID</label>
              <input type="text" class="form-control" name="user_id" aria-describedby="emailHelp" placeholder="User ID" required="">
            </div>

		
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="Password" class="form-control" name="pass" aria-describedby="emailHelp" placeholder="Password" required="">
            </div>

            	
            <br> <br> <br>

            

              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Login</button>
              </div>
        </form>
    </div>
    
  </div>


<?php
if(isset($_POST["submit"]))
  {
    $user_id=$_POST["user_id"];
    $pass=$_POST["pass"];
    $type="admin";


    $query= "SELECT * FROM login where user_id='$user_id' and pass='$pass' and type='$type'";
    $run_adm=mysqli_query($conn,$query);


    if(mysqli_num_rows($run_adm)>0)
    {
      $_SESSION['admin_loged']=true;
      $_SESSION['admin_id']=$user_id;
      echo "<script>window.location='admin_dashboard.php'</script>";
    }
    else{
      echo "<script>alert('Sorry Records not Matched'); window.location='index.php'</script>";
    }
  }

?>

</body>


  
</html>
<?php include '../header&footer/footer.php';?>