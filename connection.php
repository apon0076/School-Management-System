<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "school";


$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error) {
    die("Connection Fail".$conn->connect_error);
}


?>



