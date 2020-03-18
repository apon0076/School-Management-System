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

  <title>Employee Attendance Info</title>
  <style>
   

  </style>
</head>

<body>
  <br><br>

  


  <?php
      include '../connection.php';
      
      $sql= "SELECT * FROM attendance where type_or_class = 'teacher' OR type_or_class = 's_manager' OR type_or_class = 'a_manager' OR type_or_class = 'g_employee'";
      $result = mysqli_query($conn, $sql);



  ?>
      <form action="" method="post">
        <table col-sm-8 offset-2 align="center" border=1 class="table table-striped">
        <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">ID</th>
              <th scope="col">Date</th>
              <th scope="col">Type</th>
              <th scope="col">Status</th>
            </tr>
          </thead>

        <?php 
            $sl=1;
           // echo "a".$sl;
            while($row = mysqli_fetch_array($result)) {

           ?>
        <tbody>
        <tr>
            <th scope="row"><?php echo $sl++; ?></th>
            <td> <?php echo $row['user_id']; ?> </td>
            <td> <?php echo $row['att_date']; ?> </td>
            <td><?php echo $row['type_or_class']; ?></td>

            <td>
              <?php echo $row['status']; ?>
            </td>
            
          </tr>
          <?php
            }
          ?>
          
        </tbody>
        </table><br>
      </form>  




    <?php
      

      ?>

    </body>


  

<?php include '../header&footer/footer.php';?>

</html>



