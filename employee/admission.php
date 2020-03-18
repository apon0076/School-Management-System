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
  <title>Admission</title>
  <style>
   

  </style>
</head>

<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center text-success">Student Information</h1>
      
        <form action="" method="POST" class="col-sm-8 offset-2"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Studen ID</label>
              <input type="text" class="form-control" name="stu_id" aria-describedby="emailHelp" placeholder="Studen ID" required="">
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


            Group
			<br>
			<select name="stu_group" class="btn btn-secondary dropdown-toggle , col-sm-12 offset-0">
							  <option value="N/A">Not Applicable</option>
							  <option value="Science">Science</option>
							  <option value="Arts">Arts</option>
							  <option value="Commerce">Commerce</option>
							  
						</select>

			<br>
			<br>

			Gender
			<br>
			<select name="gender" class="btn btn-secondary dropdown-toggle, col-sm-12 offset-0">
							  <option value="Male">Male</option>
							  <option value="Female">Female</option>
							  <option value="Other">Other</option>
							  
						</select>	
			<br>
			<br>

			Class
			<br>
			<select name="class" class="btn btn-secondary dropdown-toggle, col-sm-12 offset-0">
							  <option value="06">Six</option>
							  <option value="07">Seven</option>
							  <option value="08">Eight</option>
							  <option value="09">Nine</option>
							  
							  
						</select>	
      <br><br>
      
            <br> 

            Add Image <br> <input type="file" name="image" ><br> <br>

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
    $s_id         =   $_POST['stu_id'];
    $pass         =   $_POST['pass'];
    $phone        =   $_POST['phone'];
    $address      =   $_POST['address'];
    $stu_group    =   $_POST['stu_group'];
    $gender       =   $_POST['gender'];
    $class        =   $_POST['class'];
    $type         =   "student";
    $img_loc      =   $_FILES['image']['name'];



    $sql="SELECT * FROM login";
    $check_id_query=mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_array($check_id_query)) {

      if ($row['user_id']==$s_id) {
          $u_id_exist=true;
      }
    }
    if ($u_id_exist==true) {
          echo "<script>alert('Sorry UserID already taken choose another one'); window.location='admission.php';</script>";
    }
    else
    {
        $sql1= "INSERT INTO student(stu_id, name, phone, address, stu_group,gender, image,class) VALUES('$s_id', '$name', '$phone', '$address', '$stu_group','$gender',  '$img_loc', '$class')";

        $sql11= "INSERT INTO login(user_id, pass, type) VALUES('$s_id', '$pass', '$type')";


        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql11)) {
          move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $_FILES['image']['name']);
          echo "<script>alert('Student Infromation Added Successfully'); window.location='admission.php';</script>";
        }
    }
  }
?>

  

<?php include '../header&footer/footer.php';?>

</html>



