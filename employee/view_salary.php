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
            
            
          </tr>
          <?php
            }
          ?>
          
        </tbody>
        </table><br>
      </form>  

</body>


  

<?php include '../header&footer/footer.php';?>

</html>



