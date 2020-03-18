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
  <title>Add Admin</title>
  <style>
   

  </style>
</head>

<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Add Admin</h1>
      
        <form action="" method="POST" class="col-sm-8 offset-2" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Admin ID</label>

              <input type="text" class="form-control" name="admin_id" aria-describedby="emailHelp" placeholder="Admin ID" required="">
            </div>
			
			<div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="Password" class="form-control" name="pass" aria-describedby="emailHelp" placeholder="Password" required="">
            </div>
		
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Phone" required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Address" required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="Email" required="">
            </div>
<!-- 
            Add Image <br> <input type="file" name="image" required><br> <br> -->

Add Image<input type="file" name="image">
            
			<br>
			<br>

			

            

              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Submit</button>
              </div>
        </form>
    </div>
    
  </div>


<?php
    $u_id_exist=false;
include '../connection.php';
  if (isset($_POST['submit'])) {

    $name         =   $_POST['name'];
    $a_id         =   $_POST['admin_id'];
    $pass         =   $_POST['pass'];
    $phone        =   $_POST['phone'];
    $address      =   $_POST['address'];
    $mail         =   $_POST['mail'];
    $type         =   "admin";
    $img_loc      =   $_FILES['image']['name'];



    $sql="SELECT * FROM login";
    $check_id_query=mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_array($check_id_query)) {

      if ($row['user_id']==$a_id) {
          $u_id_exist=true;
      }
    }
    if ($u_id_exist==true) {
          echo "<script>alert('Sorry UserID already taken choose another one'); window.location='add_admin.php';</script>";
    }
    else
    {
        $sql1= "INSERT INTO admin(admin_id, name, phone, address, mail, image) VALUES('$a_id', '$name', '$phone', '$address', '$mail', '$img_loc')";

        $sql11= "INSERT INTO login(user_id, pass, type) VALUES('$a_id', '$pass', '$type')";


        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql11)) {
          move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $_FILES['image']['name']);
          echo "<script>alert('Admin Infromation Added Successfully'); window.location='admin_dashboard.php';</script>";
        }
    }
  }
?>

  

<?php include '../header&footer/footer.php';?>

</body>






