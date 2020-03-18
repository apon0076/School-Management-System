<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    <style>
        ul{
          background-color: #663399;
        }

        li {
          float: left;
        }
        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #F4A460;
        }
    </style>
</head>
<body>


  

  <ul class="nav nav-tabs" style="width:100%">
    <ul class="nav nav-tabs" style="width:60%">
  <?php
  if (!isset($_SESSION['stu_loged']) && !isset($_SESSION['tec_loged']) && !isset($_SESSION['gemp_loged']) && !isset($_SESSION['sman_loged']) && !isset($_SESSION['aman_loged'])&& !isset($_SESSION['admin_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="mission.php">Mission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php">About</a>
    </li>
    
  <?php
  }

  if (isset($_SESSION['admin_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="admin_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="add_admin.php">Add Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="accounts_info.php">Accounts info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_info.php">Student info</a>
    </li>
   <?php
  }

  if (isset($_SESSION['stu_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="stu_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="view_attendance.php">Attendance info</a>
    </li>
   <?php
  }

  if (isset($_SESSION['gemp_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="g_employee_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="g_emp_profile.php">Profile</a>
    </li>
   <?php
  }

  if (isset($_SESSION['sman_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="s_manager_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="s_man_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admission.php">Student Admission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_info.php">Student Info</a>
    </li>
    
    
    
   <?php
  }

  if (isset($_SESSION['aman_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="a_manager_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="a_man_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_fee.php">Student's Fee info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="salary.php">Salary Section</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="accounts_info.php">Account info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="view_salary.php">Salary Chart</a>
    </li>
   <?php
  }

  if (isset($_SESSION['tec_loged'])) { ?>
    <li class="nav-item">
      <a class="nav-link" href="tec_dashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="t_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_info.php">Student info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stu_attendance.php">Take Attendance</a>
    </li>
   <?php
  }
  ?>
    </ul>
    

    <ul class="nav nav-tabs" style="width:40%">
<?php
  if (isset($_SESSION['stu_loged']) || isset($_SESSION['tec_loged']) || isset($_SESSION['gemp_loged']) || isset($_SESSION['sman_loged']) || isset($_SESSION['aman_loged'])|| isset($_SESSION['admin_loged'])) { ?>
    <li style="margin-left: 67%;" class="nav-item">
      <a class="nav-link" href="../logout.php?loged_out=<?php echo "true" ?>"> Logout</a>
    </li>
  <?php    
  }
  else
  { ?>
    <div style="margin-left: 60%;">
      
    <li  class="nav-item">
      <a class="nav-link" href="login.php"> Login</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="contactus.php">Contact Us</a>
    </li>
    </div>
  <?php
  }
?>
    </ul>

  </ul>

</body>
</html>
