<?php
  if (isset($_GET['loged_out'])) {
  	session_start();
    session_destroy();
    header("Location: index.php");
  }
?>