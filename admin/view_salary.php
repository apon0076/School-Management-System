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

  <title>Salary info</title>
  <style>
   

  </style>
</head>

<body>
  <br><br>

  


  <?php
      include '../connection.php';
      
      $sql= "SELECT * FROM salary_info ";
      $result = mysqli_query($conn, $sql);



  ?>
      <form action="" method="post">
        <table col-sm-8 offset-2 align="center" border=1 class="table table-striped">
        <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Designation</th>
              <th scope="col">Amount</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
        <input type="hidden" name="class" value="<?php echo $class; ?>">

        <?php 
            $sl=1;
           // echo "a".$sl;
            while($row = mysqli_fetch_array($result)) {

           ?>
        <tbody>
        <tr>
            <th scope="row"><?php echo $sl++; ?></th>
            <td> <?php echo $row['designation']; ?> </td>
            <td><?php echo $row['salary']; ?></td>

            <td>
              <a href="update.php?edit=<?php echo $row['salary_id']; ?>" type="button" class="btn btn-primary">Edit</a>
      <a href="view_salary.php?delete=<?php echo $row['salary_id']; ?>" type="button" class="btn btn-danger">Delete</a>
            </td>
            
          </tr>
          <?php
            }
          ?>
          
        </tbody>
        </table><br>
      </form>  




    <?php
      
      if (isset($_GET['delete'])) {
        $u_id=$_GET['delete'];
        $sql="DELETE FROM salary_info WHERE salary_id='$u_id'";

        
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Data Deleted....!!!'); window.location='view_salary.php';</script>";
        }

      }

      ?>

    </body>


  

<?php include '../header&footer/footer.php';?>

</html>



