<?php include 'header&footer/header.php';?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
  <title>Sign Up</title>
  <style>
   

  </style>
</head>

<body>
  

  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Sign Up</h1>
      
        <form action="" method="POST" class="col-sm-6 offset-3" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">User ID</label>
              <?php
                if (isset($_SESSION['msg'])) { ?>
                  <p style="color: red;"><?php echo $_SESSION['msg']; ?></p>
                <?php
                }
              ?>
              <input type="text" class="form-control" name="user_id" aria-describedby="emailHelp" placeholder="User ID" required="">
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

		
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="Password" class="form-control" name="pass" aria-describedby="emailHelp" placeholder="Password" required="">
            </div>
			
			<div class="form-group">
              <label for="exampleInputEmail1">Designation</label>
              <input type="text" class="form-control" name="designation" aria-describedby="emailHelp" placeholder="Designation" required="">
            </div>
            

			Type
			<br>
			<select name="type" class="btn btn-secondary dropdown-toggle, col-sm-12 offset-0">
							  <option value="teacher">Teacher</option>
                <option value="g_employee">General Employe</option>
                <option value="s_manager">Student Manager</option>
							  <option value="a_manager">Accounts Manager</option>
							  
							  
						</select>	
            <br> <br> <br>


            Add Image <br> <input type="file" name="image" ><br> <br>


              <div class="col text-center">
                <button class="btn btn-primary center-block" name="submit">Sign Up</button>
              </div>
        </form>
    </div>
    
  </div>

<?php
include 'connection.php';
  if (isset($_POST['submit'])) {

    $name         =   $_POST['name'];
    $u_id         =   $_POST['user_id'];
    $phone        =   $_POST['phone'];
    $address      =   $_POST['address'];
    $mail         =   $_POST['mail'];
    $pass         =   $_POST['pass'];
    $designation  =   $_POST['designation'];
    $type         =   $_POST['type'];
    $img_loc      =   $_FILES['image']['name'];

    $t_type="teacher";

    $u_id_exist=false;

    $sql="SELECT * FROM login";
    $check_id_query=mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_array($check_id_query)) {

      if ($row['user_id']==$u_id) {
          $u_id_exist=true;
      }
    }
    if ($u_id_exist==true) {
        $_SESSION['msg'] = "**Entered user id already taken, Choose another one**";
    }
    else
    {
      if ($type==$t_type) {
        $sql1= "INSERT INTO teacher(tec_id, name, phone, address, mail, designation, image) VALUES('$u_id', '$name', '$phone', '$address', '$mail', '$designation', '$img_loc')";

        $sql11= "INSERT INTO login(user_id, pass, type) VALUES('$u_id', '$pass', '$type')";

        $query1=mysqli_query($conn, $sql1);
        $query11=mysqli_query($conn, $sql11);
        if ($query1 && $query11) {
          move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name']);
          echo "<script>alert('Your Registration is Pending for Review..Thank you'); window.location='index.php';</script>";
        }
      }
      else
      {
        $sql2= "INSERT INTO employee(emp_id, name, phone, address, mail, designation, image) VALUES('$u_id', '$name', '$phone', '$address', '$mail', '$designation', '$img_loc')";

        $sql22= "INSERT INTO login(user_id, pass, type) VALUES('$u_id', '$pass', '$type')";

        $query2=mysqli_query($conn, $sql2);
        $query22=mysqli_query($conn, $sql22);
        if ($query2 && $query22) {
          move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name']);
          echo "<script>alert('Your Registration is Pending for Review..Thank you'); window.location='index.php';</script>";
        }
      }
    }
  }
?>
  


</body>


  <?php include 'header&footer\footer.php';?>
</html>

